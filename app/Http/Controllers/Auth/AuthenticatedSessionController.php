<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * 로그인 화면
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * 로그인 처리 (수정된 로직)
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. 유효성 검사 수정 (email 규칙 제거 -> string으로 변경)
        // 'email' 필드명이지만 실제로는 아이디/이메일 둘 다 들어올 수 있음
        $request->validate([
            'email' => ['required', 'string'], 
            'password' => ['required', 'string'],
        ]);

        // 2. 입력값이 이메일인지 아이디인지 판별
        $loginType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 3. 사용자 찾기 (입력값을 기준으로 검색)
        $user = User::where($loginType, $request->email)->first();

        // 4. 로그인 시도 및 검증
        if ($user) {
            
            // [Case 1] 정상적인 라라벨 회원 (이미 비밀번호 변경한 사람)
            // Auth::attempt는 'email' 키 대신 실제 컬럼명($loginType)을 사용해야 함
            if (Auth::attempt([$loginType => $request->email, 'password' => $request->password], $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(route('home'));
            }

            // [Case 2] 옛날 회원 (구 비밀번호 사용)
            if (!empty($user->old_password)) {
                
                // (구) 암호화 로직 적용
                $legacyHash = base64_encode(hash('sha256', 'sFramework_' . $request->password, true));

                // 암호가 일치하면
                if ($legacyHash === $user->old_password) {
                    
                    // 새 비밀번호(Bcrypt)로 업데이트 & 옛날 비번 삭제
                    $user->password = Hash::make($request->password); 
                    $user->old_password = null; 
                    $user->save();

                    // 로그인 강제 실행
                    Auth::login($user, $request->boolean('remember'));
                    $request->session()->regenerate();

                    return redirect()->intended(route('home'));
                }
            }
        }

        // 5. 로그인 실패 시 에러 메시지
        return back()->withErrors([
            'email' => '아이디 또는 비밀번호가 일치하지 않습니다.',
        ])->onlyInput('email');
    }

    /**
     * 로그아웃
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
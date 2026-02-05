<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // 1. 관리자 로그인 화면 보여주기
    public function create()
    {
        return view('admin.auth.login'); // 아까 만든 그 뷰 파일
    }

    // 2. 로그인 처리
    public function store(Request $request)
    {
        // 1. 입력값 검증 (email -> login_id 로 변경)
        $request->validate([
            'login_id' => ['required', 'string'], // 이메일 형식 강제 제거
            'password' => ['required', 'string'],
        ]);

        // 2. 로그인 시도 정보 구성
        $credentials = [
            'password' => $request->password,
        ];

        // 3. 입력값이 이메일인지 아이디인지 판별
        $login_type = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 4. 인증 정보 배열에 추가 ('email' => 값 또는 'username' => 값)
        $credentials[$login_type] = $request->login_id;

        // 5. 'remember' 체크박스 값 가져오기
        $remember = $request->filled('remember');

        // 6. 로그인 시도
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // 로그인 성공 시 관리자 대시보드로 이동
            return redirect()->intended(route('admin.index'));
        }

        // 7. 실패 시 에러 메시지 반환
        return back()->withErrors([
            'login_id' => '아이디(이메일) 또는 비밀번호가 일치하지 않습니다.',
        ])->onlyInput('login_id');
    }

    // 3. 관리자 로그아웃
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 로그아웃 후 관리자 로그인 페이지로 이동
        return redirect()->route('admin.login');
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; // 이 파일이 없다면 Request로 대체 가능
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * 로그인 페이지 보여주기
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * 로그인 처리
     */
    public function store(Request $request)
    {
        // 간단한 유효성 검사
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 로그인 시도
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('main')); // 로그인 전 페이지 혹은 메인으로
        }

        // 로그인 실패 시
        return back()->withErrors([
            'email' => '이메일 또는 비밀번호가 일치하지 않습니다.',
        ])->onlyInput('email');
    }

    /**
     * 로그아웃 처리
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
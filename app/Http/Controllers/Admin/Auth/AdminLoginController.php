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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ★ 'remember' 체크박스 값 가져오기
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // ★ 로그인 성공 시 무조건 관리자 대시보드로 이동
            return redirect()->intended(route('admin.index'));
        }

        return back()->withErrors([
            'email' => '이메일 또는 비밀번호가 일치하지 않습니다.',
        ])->onlyInput('email');
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
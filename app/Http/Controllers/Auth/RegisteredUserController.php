<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * 회원가입 페이지 보여주기
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * 회원가입 처리 (DB 저장)
     */
    public function store(Request $request)
    {
        // 1. 유효성 검사
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'], // 전화번호 추가 (선택)
        ]);

        // 2. 유저 생성
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone, // DB에 컬럼이 있어야 함
        ]);

        // 3. 가입 후 자동 로그인 처리
        event(new Registered($user));
        Auth::login($user);

        // 4. 메인으로 이동
        return redirect(route('home')); // main 라우트 이름이 없다면 '/' 로 변경
    }
}
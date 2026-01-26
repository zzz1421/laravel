@extends('layouts.foex')

@section('title', '로그인')

@section('content')
<div class="py-32 bg-gray-50 flex items-center justify-center min-h-[60vh]">
    <div class="w-full max-w-md bg-white p-8 border border-gray-200 shadow-sm">
        
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">LOGIN</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">이메일</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full border-gray-300 border px-4 py-2 focus:border-amber-500 focus:outline-none transition">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">비밀번호</label>
                <input type="password" name="password" required
                       class="w-full border-gray-300 border px-4 py-2 focus:border-amber-500 focus:outline-none transition">
            </div>

            <button type="submit" class="w-full bg-gray-900 text-white font-bold py-3 hover:bg-black transition">
                로그인
            </button>

            <div class="mt-6 text-center text-sm text-gray-500 flex justify-center gap-4">
                <a href="{{ route('register') }}" class="hover:text-amber-600 hover:underline">회원가입</a>
                <span class="text-gray-300">|</span>
                <a href="#" class="hover:text-amber-600 hover:underline">비밀번호 찾기</a>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.foex')

@section('title', '회원가입')

@section('content')
<div class="py-32 bg-gray-50 flex items-center justify-center min-h-[60vh]">
    <div class="w-full max-w-md bg-white p-8 border border-gray-200 shadow-sm">
        
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-8">JOIN MEMBER</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">이름</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full border-gray-300 border px-4 py-2 focus:border-amber-500 focus:outline-none transition">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">이메일</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full border-gray-300 border px-4 py-2 focus:border-amber-500 focus:outline-none transition">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">비밀번호</label>
                <input type="password" name="password" required
                       class="w-full border-gray-300 border px-4 py-2 focus:border-amber-500 focus:outline-none transition">
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">비밀번호 확인</label>
                <input type="password" name="password_confirmation" required
                       class="w-full border-gray-300 border px-4 py-2 focus:border-amber-500 focus:outline-none transition">
            </div>

            <button type="submit" class="w-full bg-amber-500 text-white font-bold py-3 hover:bg-amber-600 transition">
                가입하기
            </button>
        </form>
    </div>
</div>
@endsection
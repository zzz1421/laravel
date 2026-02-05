<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 로그인 | FOEX Admin</title>
    
    {{-- Tailwind CSS & Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- XEIcon (아이콘) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/xpressengine/xeicon@2.3.3/xeicon.min.css">
    
    <style>
        /* 배경 패턴 (선택사항) */
        .bg-admin {
            background-color: #f3f4f6;
            background-image: 
                radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.1) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(37, 99, 235, 0.1) 0px, transparent 50%);
        }
    </style>
</head>
<body class="bg-admin min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        
        {{-- 로고 영역 --}}
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                FOEX <span class="text-blue-600">Admin</span>
            </h1>
            <p class="text-sm text-gray-500 mt-2">관리자 시스템 접속을 위해 로그인해주세요.</p>
        </div>

        {{-- 로그인 카드 --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="p-8">
                
                <form method="POST" action="{{ route('admin.login.store') }}">
                    @csrf

                    {{-- 1. 아이디 또는 이메일 입력 (수정됨) --}}
                    <div class="mb-6">
                        <label for="login_id" class="block text-sm font-medium text-gray-700 mb-2">아이디 또는 이메일</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="xi-user text-gray-400 text-lg"></i> {{-- 아이콘 변경 (메일 -> 유저) --}}
                            </div>
                            {{-- name="email" -> name="login_id", type="email" -> type="text" --}}
                            <input id="login_id" type="text" name="login_id" value="{{ old('login_id') }}" required autofocus 
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm text-gray-800 placeholder-gray-400"
                                placeholder="ID 또는 이메일을 입력하세요">
                        </div>
                        @error('login_id')
                            <p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 2. 비밀번호 입력 (기존 유지) --}}
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">비밀번호</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="xi-lock text-gray-400 text-lg"></i>
                            </div>
                            <input id="password" type="password" name="password" required 
                                class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition text-sm text-gray-800 placeholder-gray-400"
                                placeholder="비밀번호를 입력하세요">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1 pl-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 3. 기억하기 (기존 유지) --}}
                    <div class="flex items-center justify-between mb-8">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">로그인 유지</span>
                        </label>
                    </div>

                    {{-- 4. 로그인 버튼 (기존 유지) --}}
                    <button type="submit" class="w-full bg-gray-900 text-white py-3 rounded-lg font-bold hover:bg-gray-800 transition transform active:scale-95 shadow-lg shadow-gray-300/50 flex items-center justify-center">
                        <i class="xi-log-in mr-2"></i> 로그인
                    </button>

                </form>
            </div>
            
            {{-- 하단 푸터 --}}
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-center">
                <p class="text-xs text-gray-500">
                    &copy; {{ date('Y') }} FOEX Corp. All rights reserved.
                </p>
            </div>
        </div>

        {{-- 홈으로 돌아가기 --}}
        <div class="text-center mt-6">
            <a href="/" class="text-sm text-gray-500 hover:text-gray-800 transition flex items-center justify-center gap-1">
                <i class="xi-home"></i> 메인 홈페이지로 이동
            </a>
        </div>

    </div>

</body>
</html>
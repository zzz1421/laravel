<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOEX Admin - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
    {{-- Alpine.js (드롭다운 등 인터랙션용) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap');
        body { font-family: 'Noto Sans KR', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex">
        
        {{-- 1. 좌측 사이드바 --}}
        <aside class="w-64 bg-gray-900 text-white flex flex-col flex-shrink-0 transition-all duration-300">
            <div class="h-16 flex items-center justify-center border-b border-gray-800 bg-gray-900">
                <a href="{{ route('admin.index') }}" class="text-2xl font-bold text-amber-500 tracking-wider">FOEX ADMIN</a>
            </div>

            <nav class="flex-1 px-2 py-4 space-y-1">
                {{-- 대시보드 --}}
                <a href="{{ route('admin.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.index') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                    <i class="xi-layout-o mr-3 text-lg"></i> 대시보드
                </a>

                {{-- 구분선 --}}
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">게시판 관리</p>
                </div>

                <a href="{{ route('admin.notice.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 rounded-md hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.notice.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="xi-notice mr-3 text-lg"></i> 공지사항
                </a>
                <a href="{{ route('admin.press.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 rounded-md hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.press.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="xi-newspaper mr-3 text-lg"></i> 보도자료
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 rounded-md hover:bg-gray-800 hover:text-white transition">
                    <i class="xi-library-books-o mr-3 text-lg"></i> 자료실
                </a>

                {{-- 구분선 --}}
                <div class="pt-4 pb-2">
                    <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">콘텐츠 관리</p>
                </div>

                <a href="{{ route('admin.capability.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 rounded-md hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.capability.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="xi-trophy mr-3 text-lg"></i> 역량소개 (특허/인증)
                </a>
                <a href="{{ route('admin.video.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 rounded-md hover:bg-gray-800 hover:text-white transition {{ request()->routeIs('admin.video.*') ? 'bg-gray-800 text-white' : '' }}">
                    <i class="xi-play-circle-o mr-3 text-lg"></i> 홍보영상
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-400 rounded-md hover:bg-gray-800 hover:text-white transition">
                    <i class="xi-book-o mr-3 text-lg"></i> 브로슈어
                </a>
            </nav>

            <div class="p-4 border-t border-gray-800">
                <a href="/" target="_blank" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-amber-500 rounded-md hover:bg-amber-600 transition">
                    <i class="xi-home mr-2"></i> 홈페이지 바로가기
                </a>
            </div>
        </aside>

        {{-- 2. 우측 메인 콘텐츠 --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            {{-- 상단 헤더 --}}
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 z-10">
                <div class="flex items-center">
                    <h2 class="text-xl font-bold text-gray-800">@yield('header', 'Dashboard')</h2>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">관리자님 환영합니다.</span>
                    <button class="text-gray-500 hover:text-red-600 transition" title="로그아웃">
                        <i class="xi-log-out xi-2x"></i>
                    </button>
                </div>
            </header>

            {{-- 실제 콘텐츠 영역 --}}
            <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>

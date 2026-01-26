<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FOEX') - {{ __('company.slogan') }}</title>
    
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    {{-- XEIcon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@xpressengine/xeicon@2.3.3/xeicon.min.css">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Noto Sans KR', sans-serif; }
        [x-cloak] { display: none !important; }
        /* .nav-link 클래스는 HTML에서 직접 Tailwind 클래스를 쓰고 있으므로 제거해도 무방합니다. */
    </style>
</head>
<body class="flex flex-col min-h-screen bg-white">

    {{-- 헤더 (Fixed) --}}
    <header class="fixed w-full z-50 top-0 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100 h-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between h-full">
                
                {{-- 로고 --}}
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <span class="text-2xl font-bold text-blue-700 tracking-tighter">FOEX</span>
                        <span class="text-xs text-gray-500 font-normal mt-1">Total Solution</span>
                    </a>
                </div>

                {{-- 네비게이션 (Desktop) --}}
                <nav class="hidden md:flex items-center space-x-1 h-full">
                    
                    {{-- Company --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('company.intro') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('company.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.company') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('company.intro') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.intro') }}</a>
                            <a href="{{ route('company.greeting') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.greeting') }}</a>
                            <a href="{{ route('company.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.history') }}</a>
                            <a href="{{ route('company.organization') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.organization') }}</a>
                            <a href="{{ route('company.capability') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.capability') }}</a>
                            <a href="{{ route('company.location') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.location') }}</a>
                        </div>
                    </div>

                    {{-- Business --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('business.education') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('business.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.business') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('business.education') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.education') }}</a>
                            <a href="{{ route('business.consulting') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.consulting') }}</a>
                            <a href="{{ route('business.techservice') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.techservice') }}</a>
                            <a href="{{ route('business.engineering') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.engineering') }}</a>
                            <a href="{{ route('business.rnd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.rnd') }}</a>
                        </div>
                    </div>

                    {{-- Products --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('products.suite') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('products.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.solution') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('products.suite') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">FOEX Suite</a>
                            <a href="{{ route('products.node') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">FOEX Node</a>
                        </div>
                    </div>

                    {{-- PR Center --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('pr.schedule') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('pr.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.pr') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('pr.schedule') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.schedule') }}</a>
                            <a href="{{ route('pr.notice.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.notice') }}</a>
                            <a href="{{ route('pr.brochure') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.brochure') }}</a>
                            <a href="{{ route('pr.media') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.media') }}</a>
                            <a href="{{ route('pr.press') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.press') }}</a>
                            <a href="{{ route('pr.archive.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.archive') }}</a>
                            <a href="{{ route('pr.qna.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.qna') }}</a>
                        </div>
                    </div>

                    {{-- Service --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('service.edu.apply') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('service.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.service') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full right-0 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('service.edu.apply') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.edu_apply') }}</a>
                            <a href="{{ route('service.inquiry') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.inquiry') }}</a>
                        </div>
                    </div>

                </nav>

                {{-- 우측 상단 (언어, 로그인) --}}
                <div class="flex items-center space-x-6">
    
                    {{-- 1. 언어 설정 --}}
                    <div class="flex items-center space-x-2 text-sm font-medium">
                        <a href="{{ route('lang.switch', 'ko') }}" class="{{ app()->getLocale() == 'ko' ? 'text-blue-700 font-bold' : 'text-gray-400 hover:text-gray-600' }}">KR</a>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-blue-700 font-bold' : 'text-gray-400 hover:text-gray-600' }}">EN</a>
                    </div>

                    {{-- 2. 로그인/회원가입 (여기 추가됨!) --}}
                    <div class="flex items-center gap-4 text-sm font-medium border-l border-gray-200 pl-6">
                        @auth
                            {{-- 로그인 상태일 때 --}}
                            <span class="text-gray-600 hidden md:inline">
                                <span class="text-blue-700 font-bold">{{ Auth::user()->name }}</span>님
                            </span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-500 hover:text-blue-700 transition">로그아웃</button>
                            </form>
                        @else
                            {{-- 로그아웃(손님) 상태일 때 --}}
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-blue-700 transition">로그인</a>
                            <a href="{{ route('register') }}" class="text-gray-500 hover:text-blue-700 transition">회원가입</a>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </header>

    {{-- 메인 콘텐츠 (mt-20으로 헤더 높이만큼 띄움) --}}
    <main class="flex-grow mt-20">
        @yield('content')
    </main>

    {{-- 푸터 --}}
    <footer class="bg-gray-900 text-gray-400 py-10 mt-20 font-light">
        <div class="max-w-7xl mx-auto px-4">
            <p class="text-xs text-center md:text-left">© FOEx All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
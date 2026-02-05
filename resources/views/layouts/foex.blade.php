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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/xpressengine/xeicon@2.3.3/xeicon.min.css">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Noto Sans KR', sans-serif; }
        [x-cloak] { display: none !important; }
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
                    
                    {{-- 1. Company (인사말, 조직도 삭제됨) --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('company.intro') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('company.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.company') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('company.intro') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.intro') }}</a>
                            {{-- greeting, organization 삭제 --}}
                            <a href="{{ route('company.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.history') }}</a>
                            <a href="{{ route('company.capability') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.capability') }}</a>
                            <a href="{{ route('company.location') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.location') }}</a>
                        </div>
                    </div>

                    {{-- 2. Business (기술용역 통합, R&D 분리) --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('business.education') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('business.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.business') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-48 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('business.education') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.education') }}</a>
                            {{-- 컨설팅 + 기술용역 통합 --}}
                            <a href="{{ route('business.consulting') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">컨설팅 & 기술용역</a>
                            <a href="{{ route('business.engineering') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.engineering') }}</a>
                        </div>
                    </div>

                    {{-- 3. R&D (신규 독립 메뉴) --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('business.rnd') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('rnd.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            R&D <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            {{-- 세부 항목 임시 링크 --}}
                            <a href="{{ route('business.rnd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">AI 솔루션</a>
                            <a href="{{ route('business.rnd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">CBM 기술</a>
                            <a href="{{ route('business.rnd') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">연구 실적</a>
                        </div>
                    </div>

                    {{-- 4. Solutions --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('products.suite') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('products.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.solution') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('products.suite') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">FOEX Suite</a>
                            <a href="{{ route('products.node') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">FOEX Node</a>
                        </div>
                    </div>

                    {{-- 5. PR Center (일정->캘린더, 자료실 삭제, 홍보영상 통합) --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('pr.schedule') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('pr.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.pr') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full left-1/2 -translate-x-1/2 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('pr.schedule') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">캘린더</a>
                            <a href="{{ route('pr.notice.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.notice') }}</a>
                            <a href="{{ route('pr.brochure') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">홍보자료</a>
                            <a href="{{ route('pr.press') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.press') }}</a>
                            {{-- archive, media 삭제됨 --}}
                        </div>
                    </div>

                    {{-- 6. Service (Q&A 이관됨) --}}
                    <div class="relative h-full flex items-center px-4" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('service.edu.apply') }}" class="flex items-center gap-1 py-2 font-medium transition cursor-pointer {{ request()->routeIs('service.*') ? 'text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-600' }}">
                            {{ __('menu.service') }} <i class="xi-angle-down text-xs"></i>
                        </a>
                        <div x-show="open" x-cloak x-transition class="absolute top-full right-0 w-40 bg-white shadow-lg rounded-b-lg py-2 border-t-2 border-blue-600 flex flex-col">
                            <a href="{{ route('service.edu.apply') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.edu_apply') }}</a>
                            <a href="{{ route('service.inquiry') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.inquiry') }}</a>
                            {{-- Q&A 이관 --}}
                            <a href="{{ route('pr.qna.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-blue-600">{{ __('menu.qna') }}</a>
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

                    {{-- 2. 로그인/회원가입 --}}
                    <div class="flex items-center gap-4 text-sm font-medium border-l border-gray-200 pl-6">
                        @auth
                            <a href="{{ route('mypage') }}" class="mr-4 text-gray-700 hover:text-blue-600 font-bold">
                                <i class="xi-user-o"></i> {{ __('header.mypage') }}
                            </a>
                            
                            <span class="text-gray-600 hidden md:inline">
                                {!! __('header.greeting', ['name' => '<span class="text-blue-700 font-bold">' . Auth::user()->name . '</span>']) !!}
                            </span>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-500 hover:text-blue-700 transition ml-2">
                                    {{ __('header.logout') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-blue-700 transition">
                                {{ __('header.login') }}
                            </a>
                            <a href="{{ route('register') }}" class="text-gray-500 hover:text-blue-700 transition">
                                {{ __('header.register') }}
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- 메인 콘텐츠 --}}
    <main class="flex-grow mt-20">
        @yield('content')
    </main>

    {{-- 하단 푸터 (수정된 사이트맵 적용) --}}
    <footer class="bg-[#1a1c1e] text-gray-400 py-16 mt-20 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- [상단] 사이트맵 영역 (6열 그리드: R&D 추가됨) --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 mb-16">
                
                {{-- 1. Company --}}
                <div>
                    <h4 class="text-white font-bold text-base mb-6">{{ __('menu.company') }}</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('company.intro') }}" class="hover:text-blue-500 transition">{{ __('menu.intro') }}</a></li>
                        <li><a href="{{ route('company.history') }}" class="hover:text-blue-500 transition">{{ __('menu.history') }}</a></li>
                        <li><a href="{{ route('company.capability') }}" class="hover:text-blue-500 transition">{{ __('menu.capability') }}</a></li>
                        <li><a href="{{ route('company.location') }}" class="hover:text-blue-500 transition">{{ __('menu.location') }}</a></li>
                    </ul>
                </div>

                {{-- 2. Business --}}
                <div>
                    <h4 class="text-white font-bold text-base mb-6">{{ __('menu.business') }}</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('business.education') }}" class="hover:text-blue-500 transition">{{ __('menu.education') }}</a></li>
                        <li><a href="{{ route('business.consulting') }}" class="hover:text-blue-500 transition">컨설팅 & 기술용역</a></li>
                        <li><a href="{{ route('business.engineering') }}" class="hover:text-blue-500 transition">{{ __('menu.engineering') }}</a></li>
                    </ul>
                </div>

                {{-- 3. R&D (신규) --}}
                <div>
                    <h4 class="text-white font-bold text-base mb-6">R&D</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('business.rnd') }}" class="hover:text-blue-500 transition">AI 솔루션</a></li>
                        <li><a href="{{ route('business.rnd') }}" class="hover:text-blue-500 transition">CBM 기술</a></li>
                        <li><a href="{{ route('business.rnd') }}" class="hover:text-blue-500 transition">연구 실적</a></li>
                    </ul>
                </div>

                {{-- 4. Products --}}
                <div>
                    <h4 class="text-white font-bold text-base mb-6">{{ __('menu.solution') }}</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('products.suite') }}" class="hover:text-blue-500 transition">FOEX Suite</a></li>
                        <li><a href="{{ route('products.node') }}" class="hover:text-blue-500 transition">FOEX Node</a></li>
                    </ul>
                </div>

                {{-- 5. PR Center --}}
                <div>
                    <h4 class="text-white font-bold text-base mb-6">{{ __('menu.pr') }}</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('pr.schedule') }}" class="hover:text-blue-500 transition">캘린더</a></li>
                        <li><a href="{{ route('pr.notice.index') }}" class="hover:text-blue-500 transition">{{ __('menu.notice') }}</a></li>
                        <li><a href="{{ route('pr.brochure') }}" class="hover:text-blue-500 transition">홍보자료</a></li>
                        <li><a href="{{ route('pr.press') }}" class="hover:text-blue-500 transition">{{ __('menu.press') }}</a></li>
                    </ul>
                </div>

                {{-- 6. Service --}}
                <div>
                    <h4 class="text-white font-bold text-base mb-6">{{ __('menu.service') }}</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('service.edu.apply') }}" class="hover:text-blue-500 transition">{{ __('menu.edu_apply') }}</a></li>
                        <li><a href="{{ route('service.inquiry') }}" class="hover:text-blue-500 transition">{{ __('menu.inquiry') }}</a></li>
                        <li><a href="{{ route('pr.qna.index') }}" class="hover:text-blue-500 transition">{{ __('menu.qna') }}</a></li>
                        <li class="pt-2"><a href="{{ route('privacy') }}" class="text-blue-500 font-bold hover:underline">개인정보처리방침</a></li>
                    </ul>
                </div>
            </div>

            {{-- [하단] 기업 정보 영역 --}}
            <div class="pt-10 border-t border-gray-800 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-8">
                <div class="space-y-4">
                    {{-- 로고 --}}
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-black text-white tracking-tighter">FOEX</span>
                        <div class="h-4 w-px bg-gray-700 mx-2"></div>
                        <span class="text-xs text-gray-500 leading-tight uppercase tracking-widest">Digital Transformation<br>Partner</span>
                    </div>
                    
                    {{-- 회사 주소 정보 --}}
                    <div class="text-xs sm:text-sm leading-relaxed space-y-1">
                        <div class="flex flex-wrap gap-x-4">
                            <span>사업자등록번호: 123-45-67890</span>
                            <span>대표이사: 홍길동</span>
                        </div>
                        <p>주소: 서울특별시 강남구 테헤란로 123, 포엑스 빌딩 15층</p>
                        <div class="flex flex-wrap gap-x-4">
                            <span>TEL: 02-1234-5678</span>
                            <span>FAX: 02-1234-5679</span>
                            <span>E-MAIL: info@foex.co.kr</span>
                        </div>
                    </div>
                </div>

                {{-- 저작권 및 SNS --}}
                <div class="flex flex-col items-start lg:items-end gap-4">
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition text-white"><i class="xi-facebook"></i></a>
                        <a href="#" class="w-9 h-9 rounded bg-gray-800 flex items-center justify-center hover:bg-red-600 transition text-white"><i class="xi-youtube-play"></i></a>
                        <a href="#" class="w-9 h-9 rounded bg-gray-800 flex items-center justify-center hover:bg-green-600 transition text-white"><i class="xi-naver"></i></a>
                    </div>
                    <p class="text-xs text-gray-600">Copyright © {{ date('Y') }} FOEX. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
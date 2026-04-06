<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FOEX') - {{ __('company.slogan') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <style>
        /* 🚨 어떤 제한도 없이 무조건 브라우저 가로 너비(100vw)에 1:1 비례해서 폰트/간격/크기가 바뀝니다 🚨 */
        html { 
            font-size: calc(100vw / 192) !important; 
            scroll-behavior: smooth;
        }
        body { font-family: 'Noto Sans KR', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-white">

    {{-- 🚨 [수정 1] 헤더 (스크롤 감지 애니메이션 적용) 🚨 --}}
    <header x-data="{ isScrolled: false }" 
            @scroll.window="isScrolled = (window.pageYOffset > 50)"
            :class="isScrolled ? 'bg-white shadow-md' : 'bg-transparent'"
            class="fixed w-full z-[100] top-0 h-[8rem] flex items-center px-[4rem] transition-all duration-300">
        
        <div class="w-full flex justify-between items-center h-full">
            
            {{-- 1. [왼쪽] 로고 영역 --}}
            <div class="flex items-center w-[25rem]">
                {{-- 🚨 로고 컨테이너에 텍스트 색상 전환 애니메이션 추가 (흰색 -> 차콜색) 🚨 --}}
                <a href="{{ route('home') }}" 
                   :class="isScrolled ? 'text-[#303031]' : 'text-white'"
                   class="flex items-center gap-[1.2rem] hover:opacity-80 transition-colors duration-300">
                    <x-icons.nav-logo class="w-[3.6rem] h-[4rem] object-contain" />
                    <x-icons.nav-foex class="w-[8rem] h-[3.6rem] object-contain" />
                </a>
            </div>

            {{-- 2. [가운데] 네비게이션 --}}
            <nav class="flex items-center justify-center gap-[3.5rem] flex-1">
                @php
                    $menus = [
                        ['label' => __('menu.company'), 'route' => 'company.intro', 'hasSub' => true, 
                        'subs' => [['l' => __('menu.intro'), 'r' => 'company.intro'], ['l' => __('menu.history'), 'r' => 'company.history'], ['l' => __('menu.location'), 'r' => 'company.location']]],
                        ['label' => __('menu.business'), 'route' => 'business.education', 'hasSub' => true,
                        'subs' => [['l' => __('menu.edu_biz'), 'r' => 'business.education'], ['l' => __('menu.consulting'), 'r' => 'business.consulting'], ['l' => __('menu.engineering'), 'r' => 'business.engineering']]],
                        ['label' => __('menu.rnd'), 'route' => 'business.rnd', 'hasSub' => true,
                        'subs' => [['l' => __('menu.ai_sol'), 'r' => 'business.rnd'], ['l' => __('menu.cbm_tech'), 'r' => 'business.rnd'], ['l' => __('menu.rnd_results'), 'r' => 'business.rnd']]],
                        ['label' => __('menu.solution'), 'route' => 'products.suite', 'hasSub' => true,
                        'subs' => [['l' => __('menu.suite'), 'r' => 'products.suite'], ['l' => __('menu.node'), 'r' => 'products.node']]],
                        ['label' => __('menu.pr'), 'route' => 'pr.schedule', 'hasSub' => true,
                        'subs' => [['l' => __('menu.history'), 'r' => 'pr.schedule'], ['l' => __('menu.notice'), 'r' => 'pr.notice.index'], ['l' => __('menu.brochure'), 'r' => 'pr.brochure'], ['l' => __('menu.press'), 'r' => 'pr.press']]],
                        ['label' => __('menu.edu_apply'), 'route' => 'service.edu.apply', 'hasSub' => true,
                        'subs' => [['l' => __('menu.edu_list'), 'r' => 'service.edu.apply']]],
                        ['label' => __('menu.support'), 'route' => 'service.inquiry', 'hasSub' => true,
                        'subs' => [['l' => __('menu.online_inquiry'), 'r' => 'service.inquiry'], ['l' => __('menu.qna'), 'r' => 'pr.qna.index']]],
                    ];
                @endphp

                @foreach($menus as $menu)
                <div class="relative flex items-center h-full" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    
                    {{-- 🚨 메인 메뉴 텍스트: 스크롤 시 흰색 -> 짙은 회색으로 변경 🚨 --}}
                    <a href="{{ route($menu['route']) }}" 
                       :class="isScrolled ? 'text-gray-900' : 'text-white'"
                       class="flex items-center gap-[0.6rem] text-[1.6rem] font-bold hover:text-[#f9b417] transition-colors whitespace-nowrap">
                        <span>{{ $menu['label'] }}</span>
                        @if($menu['hasSub'])
                            <x-icons.nav-downarrow class="w-[1.4rem] h-[1.4rem] transition-transform duration-200" ::class="open ? 'rotate-180' : ''" />
                        @endif
                    </a>

                    @if($menu['hasSub'])
                    <div x-show="open" x-cloak 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute top-[1rem] pt-[4rem] left-1/2 -translate-x-1/2 w-[14rem]">
                        
                        <div class="bg-[#303031] shadow-2xl py-[1rem] border-t-[0.3rem] border-[#f9b417]">
                            <ul class="flex flex-col">
                                @foreach($menu['subs'] as $sub)
                                <li>
                                    <a href="{{ route($sub['r']) }}" class="block px-[1.5rem] py-[0.8rem] text-[1.4rem] text-gray-300 hover:text-white hover:bg-white/5 transition-colors whitespace-nowrap">
                                        {{ $sub['l'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </nav>

            {{-- 3. [오른쪽] 유틸리티 영역 --}}
            <div class="flex items-center justify-end gap-[2rem] w-[25rem]">
                <div class="flex items-center gap-[1rem] text-[1.4rem] font-bold">
                    
                    {{-- [KR 버튼] --}}
                    {{-- 현재 언어가 'ko'면 무조건 노란색, 아니면 스크롤 상태에 따라 흰색/검은색 --}}
                    <a href="{{ route('lang.switch', 'ko') }}" 
                    :class="{
                        'text-[#f9b417]': '{{ app()->getLocale() }}' === 'ko',
                        'text-white': '{{ app()->getLocale() }}' !== 'ko' && !isScrolled,
                        'text-gray-900': '{{ app()->getLocale() }}' !== 'ko' && isScrolled
                    }"
                    class="hover:text-[#f9b417] transition-colors duration-300">
                    KR
                    </a>
                    
                    {{-- 구분선 --}}
                    <span class="w-[0.1rem] h-[1.4rem] transition-colors duration-300" 
                        :class="isScrolled ? 'bg-gray-300' : 'bg-gray-500'"></span>
                    
                    {{-- [EN 버튼] --}}
                    {{-- 현재 언어가 'en'이면 무조건 노란색, 아니면 스크롤 상태에 따라 흰색/검은색 --}}
                    <a href="{{ route('lang.switch', 'en') }}" 
                    :class="{
                        'text-[#f9b417]': '{{ app()->getLocale() }}' === 'en',
                        'text-white': '{{ app()->getLocale() }}' !== 'en' && !isScrolled,
                        'text-gray-900': '{{ app()->getLocale() }}' !== 'en' && isScrolled
                    }"
                    class="hover:text-[#f9b417] transition-colors duration-300">
                    EN
                    </a>
                </div>
                
                {{-- 로그인 영역 (기존 스타일 유지) --}}
                <div class="border-l pl-[2rem] flex items-center transition-colors duration-300" 
                    :class="isScrolled ? 'border-gray-300' : 'border-gray-600'">
                    <a href="{{ route('login') }}" 
                    :class="isScrolled ? 'text-gray-900' : 'text-white'"
                    class="text-[1.4rem] font-bold hover:text-[#f9b417] whitespace-nowrap transition-colors duration-300">
                    {{ __('menu.login') }}
                    </a>
                </div>
            </div>

        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>
    {{-- 하단 푸터 (시안 반영 7열 구조 & 스케일링 적용) --}}
    <footer class="bg-[#1a1c1e] text-gray-400 py-[8rem] border-t border-gray-800">
        <div class="max-w-[140rem] mx-auto px-[4rem]">
            
            {{-- [상단] 사이트맵 영역 (7열 그리드) --}}
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-[4rem] mb-[8rem]">
                
                {{-- 1. 회사 소개 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.company') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('company.intro') }}" class="hover:text-white">{{ __('menu.intro') }}</a></li>
                        <li><a href="{{ route('company.history') }}" class="hover:text-white">{{ __('menu.history') }}</a></li>
                        <li><a href="{{ route('company.capability') }}" class="hover:text-white">{{ __('menu.capability') }}</a></li>
                        <li><a href="{{ route('company.location') }}" class="hover:text-white">{{ __('menu.location') }}</a></li>
                    </ul>
                </div>

                {{-- 2. 사업 분야 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.business') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('business.education') }}" class="hover:text-white transition-colors">{{ __('menu.edu_biz') }}</a></li>
                        <li><a href="{{ route('business.consulting') }}" class="hover:text-white transition-colors">{{ __('menu.consulting') }}</a></li>
                        <li><a href="{{ route('business.engineering') }}" class="hover:text-white transition-colors">{{ __('menu.engineering') }}</a></li>
                    </ul>
                </div>

                {{-- 3. 연구개발 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.rnd') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('business.rnd') }}" class="hover:text-white transition-colors">{{ __('menu.ai_sol') }}</a></li>
                        <li><a href="{{ route('business.rnd') }}" class="hover:text-white transition-colors">{{ __('menu.cbm_tech') }}</a></li>
                        <li><a href="{{ route('business.rnd') }}" class="hover:text-white transition-colors">{{ __('menu.rnd_results') }}</a></li>
                    </ul>
                </div>

                {{-- 4. 솔루션 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.solution') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('products.suite') }}" class="hover:text-white transition-colors">{{ __('menu.suite') }}</a></li>
                        <li><a href="{{ route('products.node') }}" class="hover:text-white transition-colors">{{ __('menu.node') }}</a></li>
                    </ul>
                </div>

                {{-- 5. 홍보센터 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.pr') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('pr.notice.index') }}" class="hover:text-white transition-colors">{{ __('menu.notice') }}</a></li>
                        <li><a href="{{ route('pr.brochure') }}" class="hover:text-white transition-colors">{{ __('menu.brochure') }}</a></li>
                        <li><a href="{{ route('pr.press') }}" class="hover:text-white transition-colors">{{ __('menu.press') }}</a></li>
                    </ul>
                </div>

                {{-- 6. 교육 신청 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.edu_apply') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('service.edu.apply') }}" class="hover:text-white transition-colors">{{ __('menu.edu_list') }}</a></li>
                    </ul>
                </div>

                {{-- 7. 고객 지원 --}}
                <div>
                    <h4 class="text-white font-bold text-[1.6rem] mb-[3rem]">{{ __('menu.support') }}</h4>
                    <ul class="space-y-[1.5rem] text-[1.4rem]">
                        <li><a href="{{ route('pr.qna.index') }}" class="hover:text-white transition-colors">{{ __('menu.qna') }}</a></li>
                        <li><a href="{{ route('service.inquiry') }}" class="hover:text-white transition-colors">{{ __('menu.online_inquiry') }}</a></li>
                        <li class="pt-[1rem]">
                            <a href="{{ route('privacy') }}" class="text-[#f9b417] font-bold hover:text-white transition-colors">{{ __('menu.privacy_policy') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- [하단] 기업 정보 및 SNS 영역 --}}
            <div class="pt-[4rem] border-t border-[#2a2c30] flex flex-col lg:flex-row justify-between items-start lg:items-end gap-[4rem]">
                
                {{-- 좌측 기업 정보 --}}
                <div class="space-y-[2rem]">
    {{-- 로고 및 슬로건 --}}
    <div class="flex items-center gap-[1.5rem]">
        <span class="text-[2.4rem] font-black text-white tracking-tighter">FOEx</span>
        <div class="h-[2rem] w-[0.1rem] bg-gray-600"></div>
        <span class="text-[1.2rem] text-gray-500 leading-tight uppercase tracking-widest">{!! __('footer.dt_partner') !!}</span>
    </div>
    
    {{-- 상세 정보 영역 --}}
    <div class="text-[1.4rem] leading-[1.8] text-gray-400 space-y-[1.5rem]">
        
        {{-- 1. 공통 정보 (사업자번호, 대표자, 이메일) --}}
        <div class="flex flex-wrap gap-x-[2rem] border-b border-gray-700/50 pb-[1.5rem]">
            <span>{{ __('footer.biz_reg_no') }}: 150-86-02326</span>
            <span>{{ __('footer.ceo') }}: {{ __('footer.ceo_name') }}</span>
            <span>{{ __('footer.email') }}: ghkang@foex.kr</span>
        </div>

        {{-- 2. 본사 (Head Office) 정보 --}}
        <div class="space-y-[0.2rem]">
            <p>
                <span class="font-bold text-gray-300 mr-[1rem]">{{ __('footer.head_office') }}</span> 
                {!! __('footer.address_head') !!}
            </p>
            <div class="flex flex-wrap gap-x-[2rem]">
                <span>{{ __('footer.tel') }}: 052-277-8922</span>
                <span>{{ __('footer.fax') }}: 055-293-0255</span>
            </div>
        </div>

        {{-- 3. 연구소 (R&D Center) 정보 --}}
        <div class="space-y-[0.2rem]">
            <p>
                <span class="font-bold text-gray-300 mr-[1rem]">{{ __('footer.rnd_center') }}</span> 
                {!! __('footer.address_rnd') !!}
            </p>
            <div class="flex flex-wrap gap-x-[2rem]">
                <span>{{ __('footer.tel') }}: 055-293-0252</span>
                <span>{{ __('footer.fax') }}: 055-293-0255</span>
            </div>
        </div>
        
    </div>
</div>

                {{-- 우측 저작권 및 SNS --}}
                <div class="flex flex-col items-start lg:items-end gap-[2rem]">
                    <div class="flex gap-[1.2rem]">
                        <a href="#" class="w-[4rem] h-[4rem] rounded-[0.4rem] bg-[#22252a] flex items-center justify-center hover:bg-blue-600 transition-colors text-white text-[1.8rem]"><i class="xi-facebook"></i></a>
                        <a href="#" class="w-[4rem] h-[4rem] rounded-[0.4rem] bg-[#22252a] flex items-center justify-center hover:bg-red-600 transition-colors text-white text-[1.8rem]"><i class="xi-youtube-play"></i></a>
                        <a href="#" class="w-[4rem] h-[4rem] rounded-[0.4rem] bg-[#22252a] flex items-center justify-center hover:bg-green-600 transition-colors text-white text-[1.8rem]"><i class="xi-naver"></i></a>
                    </div>
                    <p class="text-[1.3rem] text-gray-500">{{ __('footer.copyright', ['year' => date('Y')]) }}</p>
                </div>
                
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // 스크롤 애니메이션 초기화
        AOS.init({
            duration: 1000, // 애니메이션이 1초 동안 부드럽게 실행됨
            once: false,    // 스크롤을 올렸다 내릴 때마다 반복할지 여부 (true면 한 번만)
        });
    </script>
    @yield('scripts')
</body>
</html>
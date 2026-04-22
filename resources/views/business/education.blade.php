@extends('layouts.foex')

@section('title', __('menu.education'))

@section('content')

    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <style>
        /* FOEx 스타일 Swiper 페이징 (노란색) */
        .swiper-pagination-bullet-active { background-color: #f9b417 !important; }
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <div x-data="{ tab: 'copc' }" class="bg-white font-sans text-gray-800">

        {{-- [1] 공통 히어로 컴포넌트 (인트로 전용 대형 사이즈) --}}
        <x-page-hero 
            category="{{ __('menu.business') }}" 
            title="{{ __('business.edu_title') }}" 
            desc="{{ __('business.edu_desc') }}" 
            bg-image="images/business/hero_edu.jpg" 
        />

        {{-- [2] 탭 메뉴 (Sticky, 포엑스 옐로우 포인트) --}}
        <div id="tab-menu" class="bg-white border-b border-gray-200 sticky shadow-sm" style="top: 8rem; z-index: 90; scroll-margin-top: 8rem;">
            <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
                <div class="flex overflow-x-auto no-scrollbar gap-[3rem] lg:gap-[5rem]">
                    @foreach([
                        'copc' => __('business.edu_tab_copc'),
                        'tech' => __('business.edu_tab_tech'),
                        'motor' => __('business.edu_tab_motor'),
                        'hydrogen' => __('business.edu_tab_hydrogen'),
                        'ess' => __('business.edu_tab_ess'),
                        'sil' => __('business.edu_tab_sil')
                    ] as $key => $label)
                        
                        {{-- 🚨 변경점: 패딩(py-[3rem]) 증가, 폰트 크기(text-[1.8rem] md:text-[2rem]) 증가, 밑줄 두께(border-b-[0.4rem]) 증가 --}}
                        <button @click="tab = '{{ $key }}'; document.getElementById('tab-menu').scrollIntoView({ behavior: 'smooth' });" 
                                :class="tab === '{{ $key }}' ? 'text-[#f9b417] border-[#f9b417]' : 'text-gray-500 border-transparent hover:text-gray-900'" 
                                class="flex-shrink-0 px-[1.5rem] py-[3rem] text-[1.8rem] md:text-[2rem] font-bold border-b-[0.4rem] transition duration-300 whitespace-nowrap outline-none">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ==========================================
             TAB 1: COPC (FOEx Yellow Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'copc'" x-cloak 
             x-transition:enter="transition ease-out duration-500" 
             x-transition:enter-start="opacity-0 translate-y-[2rem]" 
             x-transition:enter-end="opacity-100 translate-y-0">
            
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 타이틀 및 내용 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[3rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-[#f9b417] mr-[1.5rem] rounded-full"></span>
                                {{ __('business.copc_title') }}
                            </h3>
                            
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-600 leading-[1.8] break-keep">
                                <p>{{ __('business.copc_p1') }}</p>
                                <p>{{ __('business.copc_p2') }}</p>
                                
                                {{-- 하이라이트 박스 디자인 업그레이드 --}}
                                <div class="mt-[4rem] bg-yellow-50/50 border border-yellow-200 p-[3rem] rounded-[1.5rem] flex items-start group hover:bg-yellow-50 transition duration-300">
                                    <i class="xi-bulb text-[#f9b417] text-[2.8rem] mr-[1.5rem] shrink-0 mt-[0.2rem] group-hover:animate-bounce"></i>
                                    <p class="text-[1.6rem] font-bold text-gray-800 leading-[1.6]">
                                        {{ __('business.copc_box') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- [오른쪽] 옐로우 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#f9b417] to-[#d97706] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,180,23,0.3)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-yellow-300/30 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                
                                {{-- 🚨 실제 준비하신 이미지 파일명으로 변경해 주세요 (예: copc_training.jpg) --}}
                                <img src="{{ asset('images/business/copc_training.jpg') }}" 
                                    onerror="this.src='https://loremflickr.com/800/600/engineer,training'" 
                                    alt="IECEx CoPC Education" 
                                    class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    IECEx CoPC
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    국제 방폭 개인 자격 인증<br>전문 교육 과정
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- 2. 교육 과정(Unit Ex) 테이블 통합 카드 --}}
                    <div class="mb-[8rem] bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)]">
                        
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-book text-[#f9b417] mr-[1.5rem]"></i> {{ __('business.unit_title') }}
                        </h3>
                        
                        <div class="overflow-x-auto rounded-[1.5rem] border border-gray-200">
                            <table class="w-full text-left border-collapse min-w-[80rem]">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-700 text-[1.5rem] uppercase tracking-wider border-b border-gray-200">
                                        <th class="p-[2rem] font-bold w-[25rem] text-center border-r border-gray-200">{{ __('business.unit_th_code') }}</th>
                                        <th class="p-[2rem] font-bold text-center">{{ __('business.unit_th_desc') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-[1.6rem]">
                                    @foreach(__('business.copc_units') as $unit)
                                    <tr class="hover:bg-yellow-50/50 transition duration-200">
                                        <td class="p-[2.5rem] text-center font-bold text-[#f9b417] bg-gray-50/30 border-r border-gray-100">
                                            Unit Ex {{ $unit[0] }}
                                        </td>
                                        <td class="p-[2.5rem]">
                                            <span class="block font-bold text-gray-800 break-keep">{{ $unit[1] }}</span>
                                            @if(!empty($unit[2]))
                                                <span class="block text-[1.4rem] text-gray-500 mt-[0.8rem] break-keep">{{ $unit[2] }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- 3. RTP 다크 배너 (라운드형 카드로 디자인 변경) --}}
                    <div class="bg-[#1a1c1e] text-white rounded-[2rem] p-[5rem] lg:p-[8rem] shadow-[0_2rem_5rem_rgba(0,0,0,0.15)] flex flex-col lg:flex-row gap-[6rem] items-center relative overflow-hidden">
                        
                        {{-- 다크 배너 배경 장식 --}}
                        <div class="absolute right-0 top-0 w-[50%] h-full bg-gradient-to-l from-[#f9b417]/10 to-transparent pointer-events-none"></div>
                        <i class="xi-medal absolute right-[-5rem] bottom-[-5rem] text-[30rem] text-white/5 pointer-events-none transform -rotate-12"></i>
                        
                        <div class="lg:w-1/3 relative z-10 text-center lg:text-left">
                            <span class="inline-block text-[#f9b417] font-bold tracking-widest text-[1.4rem] uppercase mb-[1.5rem] bg-[#f9b417]/10 px-[1.5rem] py-[0.5rem] rounded-full">
                                Recognised Training Provider
                            </span>
                            <h2 class="text-[3.5rem] font-bold mb-[3rem] leading-[1.3] tracking-tight">{!! __('business.rtp_title') !!}</h2>
                            <p class="text-[1.6rem] text-gray-400 mb-[4rem] break-keep">{{ __('business.rtp_desc') }}</p>
                            
                            <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 hover:bg-white font-bold py-[2rem] px-[5rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                                {{ __('business.edu_btn_apply') }} <i class="xi-arrow-right ml-[1rem]"></i>
                            </a>
                        </div>
                        
                        <div class="lg:w-2/3 bg-white/5 p-[4rem] rounded-[2rem] border border-white/10 relative z-10 backdrop-blur-sm">
                            <div class="space-y-[3rem]">
                                <div class="flex items-start group">
                                    <i class="xi-check-circle text-[#f9b417] mr-[2rem] mt-[0.2rem] text-[2.4rem] group-hover:scale-110 transition-transform"></i> 
                                    <p class="text-[1.6rem] leading-[1.8] break-keep text-gray-200 group-hover:text-white transition-colors">{{ __('business.rtp_check1') }}</p>
                                </div>
                                <div class="flex items-start group">
                                    <i class="xi-check-circle text-[#f9b417] mr-[2rem] mt-[0.2rem] text-[2.4rem] group-hover:scale-110 transition-transform"></i> 
                                    <p class="text-[1.6rem] leading-[1.8] break-keep text-gray-200 group-hover:text-white transition-colors">{{ __('business.rtp_check2') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 2: Tech (FOEx Yellow Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'tech'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 타이틀 및 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-[#f9b417] mr-[1.5rem] rounded-full"></span>
                                {{ __('business.tech_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.tech_list_1') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.tech_list_2') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.tech_list_3') }}
                                </li>
                            </ul>
                            
                        </div>

                        {{-- [오른쪽] 옐로우 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#f9b417] to-[#d97706] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,180,23,0.3)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-yellow-300/30 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                {{-- 🚨 실제 이미지 경로로 수정해 주세요 --}}
                                <img src="{{ asset('images/business/tech_training.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/meeting,training,office'" alt="Technical Training" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    TECHNICAL TRAINING
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    현장 맞춤형<br>산업 기술 실무 교육
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                    {{-- 2. 하단 Swiper 대형 카드 --}}
                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-network-file text-[#f9b417] mr-[1.5rem]"></i> 기술 교육 프로그램
                        </h3>

                        {{-- Tech Swiper --}}
                        <div class="swiper techSwiper pb-[6rem]">
                            <div class="swiper-wrapper">
                                @foreach([
                                    ['icon' => 'xi-woman', 'subicon' => 'xi-paper', 'title' => __('business.tech_s1')],
                                    ['icon' => 'xi-users', 'subicon' => 'xi-wrench', 'title' => __('business.tech_s2')],
                                    ['icon' => 'xi-spinner-1 animate-spin-slow', 'subicon' => '', 'title' => __('business.tech_s3')],
                                    ['icon' => 'xi-spinner-1 animate-spin-slow', 'subicon' => '', 'title' => __('business.tech_s4')]
                                ] as $slide)
                                <div class="swiper-slide">
                                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.08)] hover:border-[#f9b417]/50 transition duration-300 group h-[35rem] flex flex-col">
                                        <div class="h-[20rem] bg-gray-50 flex items-center justify-center group-hover:bg-yellow-50/30 transition duration-300">
                                            <i class="{{ $slide['icon'] }} text-[8rem] text-[#f9b417] group-hover:scale-110 transition-transform duration-300"></i>
                                            @if($slide['subicon']) <i class="{{ $slide['subicon'] }} text-[4rem] text-yellow-300/50 -ml-[2rem] mt-[4rem]"></i> @endif
                                        </div>
                                        <div class="p-[3rem] text-center flex-grow flex items-center justify-center">
                                            <h4 class="text-[1.8rem] font-bold text-gray-800 break-keep leading-[1.4] group-hover:text-[#f9b417] transition-colors">{{ $slide['title'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    {{-- 3. 하단 문의/신청 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 hover:bg-[#e0a214] font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.edu_btn_detail') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 3: Motor (FOEx Yellow Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'motor'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 타이틀 및 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-[#f9b417] mr-[1.5rem] rounded-full"></span>
                                {{ __('business.motor_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.motor_list_1') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.motor_list_2') }}
                                </li>
                            </ul>
                            
                        </div>

                        {{-- [오른쪽] 옐로우 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#f9b417] to-[#d97706] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,180,23,0.3)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-yellow-300/30 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                {{-- 🚨 실제 이미지 경로로 수정해 주세요 --}}
                                <img src="{{ asset('images/business/motor_training.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/electric-motor,engine'" alt="Motor Technical Training" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    MOTOR TECHNOLOGY
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    방폭 전동기 및 제어<br>전문 기술 교육
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                    {{-- 2. 하단 Swiper 대형 카드 --}}
                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-cog text-[#f9b417] mr-[1.5rem] animate-spin-slow"></i> 교육 커리큘럼
                        </h3>

                        {{-- Motor Swiper --}}
                        <div class="swiper motorSwiper pb-[6rem]">
                            <div class="swiper-wrapper">
                                @foreach([
                                    ['icon' => 'xi-woman', 'title' => __('business.motor_g4')],
                                    ['icon' => 'xi-users', 'title' => __('business.motor_g5')],
                                    ['icon' => 'xi-spinner-1 animate-spin-slow', 'title' => __('business.motor_g1')]
                                ] as $slide)
                                <div class="swiper-slide">
                                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.08)] hover:border-[#f9b417]/50 transition duration-300 group h-[35rem] flex flex-col">
                                        <div class="h-[20rem] bg-gray-50 flex items-center justify-center group-hover:bg-yellow-50/30 transition duration-300">
                                            <i class="{{ $slide['icon'] }} text-[8rem] text-[#f9b417] group-hover:scale-110 transition-transform duration-300"></i>
                                        </div>
                                        <div class="p-[3rem] text-center flex-grow flex items-center justify-center">
                                            <h4 class="text-[1.8rem] font-bold text-gray-800 break-keep leading-[1.4] group-hover:text-[#f9b417] transition-colors">{{ $slide['title'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    {{-- 3. 하단 문의/신청 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 hover:bg-[#e0a214] font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.edu_btn_detail') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 4: Hydrogen (FOEx Yellow Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'hydrogen'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 타이틀 및 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-[#f9b417] mr-[1.5rem] rounded-full"></span>
                                {{ __('business.hydro_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.hydro_list_1') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.hydro_list_2') }}
                                </li>
                            </ul>
                            
                        </div>

                        {{-- [오른쪽] 옐로우 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#f9b417] to-[#d97706] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,180,23,0.3)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-yellow-300/30 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                {{-- 🚨 실제 이미지 경로로 수정해 주세요 --}}
                                <img src="{{ asset('images/business/hydrogen_training.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/hydrogen,energy'" alt="Hydrogen Safety Training" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    HYDROGEN SAFETY
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    차세대 친환경 에너지<br>수소 방폭 기술 교육
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                    {{-- 2. 하단 Swiper 대형 카드 --}}
                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-opacity text-[#f9b417] mr-[1.5rem]"></i> 교육 커리큘럼
                        </h3>

                        {{-- Hydrogen Swiper --}}
                        <div class="swiper hydrogenSwiper pb-[6rem]">
                            <div class="swiper-wrapper">
                                @foreach([
                                    ['icon' => 'xi-battery-full', 'title' => __('business.hydro_g2')],
                                    ['icon' => 'xi-ship', 'title' => __('business.hydro_g3')],
                                    ['icon' => 'xi-opacity', 'title' => __('business.hydro_g1')]
                                ] as $slide)
                                <div class="swiper-slide">
                                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.08)] hover:border-[#f9b417]/50 transition duration-300 group h-[35rem] flex flex-col">
                                        <div class="h-[20rem] bg-gray-50 flex items-center justify-center group-hover:bg-yellow-50/30 transition duration-300">
                                            <i class="{{ $slide['icon'] }} text-[8rem] text-[#f9b417] group-hover:scale-110 transition-transform duration-300"></i>
                                        </div>
                                        <div class="p-[3rem] text-center flex-grow flex items-center justify-center">
                                            <h4 class="text-[1.8rem] font-bold text-gray-800 break-keep leading-[1.4] group-hover:text-[#f9b417] transition-colors">{{ $slide['title'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    {{-- 3. 하단 문의/신청 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 hover:bg-[#e0a214] font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.edu_btn_detail') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 5: ESS (FOEx Yellow Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'ess'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 타이틀 및 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-[#f9b417] mr-[1.5rem] rounded-full"></span>
                                {{ __('business.ess_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.ess_list_1') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.ess_list_2') }}
                                </li>
                            </ul>
                            
                        </div>

                        {{-- [오른쪽] 옐로우 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#f9b417] to-[#d97706] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,180,23,0.3)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-yellow-300/30 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                {{-- 🚨 실제 이미지 경로로 수정해 주세요 --}}
                                <img src="{{ asset('images/business/ess_training.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/battery,factory'" alt="ESS Safety Training" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    ESS SAFETY
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    안전한 ESS 운영을 위한<br>화재 예방 및 기술 교육
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                    {{-- 2. 하단 Swiper 대형 카드 --}}
                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-battery-charging text-[#f9b417] mr-[1.5rem]"></i> 교육 커리큘럼
                        </h3>

                        {{-- ESS Swiper --}}
                        <div class="swiper essSwiper pb-[6rem]">
                            <div class="swiper-wrapper">
                                @foreach([
                                    ['icon' => 'xi-battery-charging', 'title' => __('business.ess_s1')],
                                    ['icon' => 'xi-fire', 'title' => __('business.ess_s2')],
                                    ['icon' => 'xi-chip', 'title' => __('business.ess_s3')]
                                ] as $slide)
                                <div class="swiper-slide">
                                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.08)] hover:border-[#f9b417]/50 transition duration-300 group h-[35rem] flex flex-col">
                                        <div class="h-[20rem] bg-gray-50 flex items-center justify-center group-hover:bg-yellow-50/30 transition duration-300">
                                            <i class="{{ $slide['icon'] }} text-[8rem] text-[#f9b417] group-hover:scale-110 transition-transform duration-300"></i>
                                        </div>
                                        <div class="p-[3rem] text-center flex-grow flex items-center justify-center">
                                            {{-- 원본 코드에 있던 {!! !!} 를 유지하여 줄바꿈 태그(<br>)가 정상 작동하도록 처리했습니다 --}}
                                            <h4 class="text-[1.8rem] font-bold text-gray-800 break-keep leading-[1.4] group-hover:text-[#f9b417] transition-colors">{!! $slide['title'] !!}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    {{-- 3. 하단 문의/신청 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 hover:bg-[#e0a214] font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.edu_btn_detail') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 6: SIL (FOEx Yellow Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'sil'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 타이틀 및 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-[#f9b417] mr-[1.5rem] rounded-full"></span>
                                {{ __('business.sil_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.sil_list_1') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.sil_list_2') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-[0.6rem] h-[0.6rem] bg-[#f9b417] rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                    {{ __('business.sil_list_3') }}
                                </li>
                            </ul>
                            
                        </div>

                        {{-- [오른쪽] 옐로우 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-[#f9b417] to-[#d97706] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,180,23,0.3)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-yellow-300/30 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                {{-- 🚨 실제 이미지 경로로 수정해 주세요 --}}
                                <img src="{{ asset('images/business/sil_training.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/workers,safety'" alt="SIL Technical Training" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    FUNCTIONAL SAFETY
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    IEC 61508 / 61511 기준<br>SIL 기능 안전 전문가 교육
                                </h4>
                            </div>
                        </div>
                    </div>
                    
                    {{-- 2. 하단 Swiper 대형 카드 --}}
                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-shield-checked-o text-[#f9b417] mr-[1.5rem]"></i> 교육 커리큘럼
                        </h3>

                        {{-- SIL Swiper --}}
                        <div class="swiper silSwiper pb-[6rem]">
                            <div class="swiper-wrapper">
                                @foreach([
                                    ['icon' => 'xi-helmet', 'title' => __('business.sil_s1')],
                                    ['icon' => 'xi-group', 'title' => __('business.sil_s2')],
                                    ['icon' => 'xi-man', 'title' => __('business.sil_s3')]
                                ] as $slide)
                                <div class="swiper-slide">
                                    <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.08)] hover:border-[#f9b417]/50 transition duration-300 group h-[35rem] flex flex-col">
                                        <div class="h-[20rem] bg-gray-50 flex items-center justify-center group-hover:bg-yellow-50/30 transition duration-300">
                                            <i class="{{ $slide['icon'] }} text-[8rem] text-[#f9b417] group-hover:scale-110 transition-transform duration-300"></i>
                                        </div>
                                        <div class="p-[3rem] text-center flex-grow flex items-center justify-center">
                                            <h4 class="text-[1.8rem] font-bold text-gray-800 break-keep leading-[1.4] group-hover:text-[#f9b417] transition-colors">{{ $slide['title'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    {{-- 3. 하단 문의/신청 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 hover:bg-[#e0a214] font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.edu_btn_detail') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

    </div>

    {{-- Swiper Script --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiperOptions = {
                slidesPerView: 1,
                spaceBetween: 20,
                
                // 🚨 해결 1: 카드 개수가 적을 때는 무한 반복(loop) 끄기
                loop: false, 
                
                // 🚨 추가: 보여줄 카드 수가 전체 카드 수보다 많거나 같으면 드래그 비활성화
                watchOverflow: true, 

                observer: true,       
                observeParents: true, 
                
                // 🚨 해결 2: 숨겨진 탭에서 에러가 나지 않도록 자동 재생 제거 (가독성 향상)
                // (교육 페이지는 글을 읽어야 하므로 자동 재생이 없는 것이 UX에 더 좋습니다.)
                // autoplay: { delay: 3500, disableOnInteraction: false }, 
                
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    1024: { slidesPerView: 3, spaceBetween: 30 },
                },
            };

            new Swiper(".techSwiper", { ...swiperOptions, pagination: { el: ".techSwiper .swiper-pagination", clickable: true } });
            new Swiper(".motorSwiper", { ...swiperOptions, pagination: { el: ".motorSwiper .swiper-pagination", clickable: true } });
            new Swiper(".hydrogenSwiper", { ...swiperOptions, pagination: { el: ".hydrogenSwiper .swiper-pagination", clickable: true } });
            new Swiper(".essSwiper", { ...swiperOptions, pagination: { el: ".essSwiper .swiper-pagination", clickable: true } });
            new Swiper(".silSwiper", { ...swiperOptions, pagination: { el: ".silSwiper .swiper-pagination", clickable: true } });
        });
    </script>

@endsection
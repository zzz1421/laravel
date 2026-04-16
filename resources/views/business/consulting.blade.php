@extends('layouts.foex')

@section('title', __('menu.business') . ' - ' . __('business.cons_tech_title'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(2rem); } to { opacity: 1; transform: translateY(0); } }
        
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .process-box { 
            @apply relative w-[14rem] h-[6.5rem] flex items-center justify-center bg-white border border-gray-200 text-gray-700 font-bold text-[1.5rem] shadow-sm rounded-[1.2rem] transition-all duration-300 z-10; 
        }
        .process-arrow-wrapper {
            @apply relative z-10 w-[3.5rem] h-[3.5rem] rounded-full bg-white border border-gray-100 shadow-sm flex items-center justify-center;
        }
        /* 화살표 흐름 애니메이션 */
        @keyframes slideRight {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(6px); }
        }
        .animate-slide-right {
            animation: slideRight 1.5s ease-in-out infinite;
        }
        
        .quality-table-header { @apply bg-gray-100 text-gray-700 text-[1.6rem] uppercase tracking-wider font-bold py-[2rem] text-center border-b border-gray-200; }
        .quality-table-row { @apply border-b border-gray-100 hover:bg-emerald-50 transition; }
        .quality-table-col-left { @apply text-center font-bold text-emerald-600 bg-gray-50/50 py-[2rem] w-1/3 text-[1.6rem]; }
        .quality-table-col-right { @apply py-[2rem] px-[4rem] text-gray-800 font-medium text-[1.6rem]; }

        .tech-table th { @apply bg-gray-100 text-gray-800 font-bold py-[2rem] px-[2rem] border-b-2 border-gray-300 whitespace-nowrap text-[1.6rem]; }
        .tech-table td { @apply py-[1.8rem] px-[2rem] border-b border-gray-200 text-gray-600 text-[1.6rem] text-center; }
        .tech-table tr:hover { @apply bg-amber-50 transition-colors; }
        .tech-table td:first-child { @apply text-left font-bold text-gray-800 bg-gray-50/50; }
    </style>

    <div x-data="{ tab: 'product' }" class="bg-white font-sans text-gray-800">

        {{-- [1] 페이지 헤더 --}}
        <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] overflow-hidden bg-[#1a1c1e]">
            
            {{-- 1. 이미지 투명도 조정: opacity-40 -> opacity-60 (숫자가 클수록 원본 이미지가 선명해짐) --}}
            <img src="{{ asset('images/business/hero-consulting.jpg') }}" 
                alt="Consulting & Tech Service" 
                class="absolute inset-0 w-full h-full object-cover opacity-60"
                onerror="this.src='https://loremflickr.com/1920/1080/business,engineers'">
            
            {{-- 2. 그라데이션 필터 농도 조정: 50/80 -> 20/60 수준으로 연하게 빼기 --}}
            <div class="absolute inset-0 bg-gradient-to-r from-[#1a1c1e]/60 via-[#1a1c1e]/10 to-transparent pointer-events-none z-0"></div>

            <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
                <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">
                    {{ __('business.cons_tech_title') }}
                </h1>
                {{-- 배경이 밝아진 만큼 서브 텍스트도 더 밝은 회색(gray-200)으로 올려서 가독성 확보 --}}
                <p class="text-[1.8rem] md:text-[2.2rem] text-gray-200 font-medium break-keep">
                    {{ __('business.cons_tech_desc') }}
                </p>
            </div>
        </section>

        {{-- [2] 탭 메뉴 --}}
        <div id="tab-menu" class="bg-white border-b border-gray-200 sticky shadow-sm" style="top: 8rem; z-index: 90; scroll-margin-top: 8rem;">
            <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
                <div class="flex overflow-x-auto no-scrollbar gap-[3rem] lg:gap-[5rem]">
                    <button @click="tab = 'product'; document.getElementById('tab-menu').scrollIntoView({ behavior: 'smooth' });" :class="tab === 'product' ? 'text-[#f9b417] border-[#f9b417]' : 'text-gray-500 border-transparent hover:text-gray-900'" class="flex-shrink-0 px-[1.5rem] py-[3rem] text-[1.8rem] md:text-[2rem] font-bold border-b-[0.4rem] transition duration-300 whitespace-nowrap outline-none">{{ __('business.cons_tab_product') }}</button>
                    <button @click="tab = 'quality'; document.getElementById('tab-menu').scrollIntoView({ behavior: 'smooth' });" :class="tab === 'quality' ? 'text-[#f9b417] border-[#f9b417]' : 'text-gray-500 border-transparent hover:text-gray-900'" class="flex-shrink-0 px-[1.5rem] py-[3rem] text-[1.8rem] md:text-[2rem] font-bold border-b-[0.4rem] transition duration-300 whitespace-nowrap outline-none">{{ __('business.cons_tab_quality') }}</button>
                    <button @click="tab = 'risk'; document.getElementById('tab-menu').scrollIntoView({ behavior: 'smooth' });" :class="tab === 'risk' ? 'text-[#f9b417] border-[#f9b417]' : 'text-gray-500 border-transparent hover:text-gray-900'" class="flex-shrink-0 px-[1.5rem] py-[3rem] text-[1.8rem] md:text-[2rem] font-bold border-b-[0.4rem] transition duration-300 whitespace-nowrap outline-none">{{ __('business.ts_tab_risk') }}</button>
                    <button @click="tab = 'standard'; document.getElementById('tab-menu').scrollIntoView({ behavior: 'smooth' });" :class="tab === 'standard' ? 'text-[#f9b417] border-[#f9b417]' : 'text-gray-500 border-transparent hover:text-gray-900'" class="flex-shrink-0 px-[1.5rem] py-[3rem] text-[1.8rem] md:text-[2rem] font-bold border-b-[0.4rem] transition duration-300 whitespace-nowrap outline-none">{{ __('business.ts_tab_standard') }}</button>
                </div>
            </div>
        </div>

        {{-- ==========================================
             TAB 1: 제품 인증 컨설팅 
             ========================================== --}}
        <div x-show="tab === 'product'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 1. 상단 쇼케이스 영역 (내용 + 인증서) --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[4rem]">
                        
                        {{-- [왼쪽] 타이틀 및 컨설팅 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            {{-- 다른 탭들처럼 타이틀이 카드 안으로 들어왔습니다 --}}
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[1rem] flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-blue-600 mr-[1.5rem] rounded-full"></span>
                                {{ __('business.cons_tab_product') }}
                            </h3>
                            <p class="text-gray-500 text-[1.6rem] ml-[2rem] mb-[4rem] pb-[2rem] border-b border-gray-100 break-keep">
                                {{ __('business.cons_prod_subtitle') }}
                            </p>
                            
                            {{-- 9개의 리스트를 2단 그리드로 깔끔하게 정렬 --}}
                            <ul class="grid sm:grid-cols-2 gap-x-[4rem] gap-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                @foreach([
                                    __('business.prod_list_1'), __('business.prod_list_2'), __('business.prod_list_3'),
                                    __('business.prod_list_4'), __('business.prod_list_5'), __('business.prod_list_6'),
                                    __('business.prod_list_7'), __('business.prod_list_8'), __('business.prod_list_9')
                                ] as $list)
                                    <li class="flex items-start">
                                        <span class="w-[0.6rem] h-[0.6rem] bg-blue-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span>
                                        {{ $list }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        {{-- [오른쪽] 인증서 쇼케이스 강조 영역 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-blue-600 to-[#1e3a8a] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(37,99,235,0.2)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-blue-400/20 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 인증서 이미지 --}}
                            <div class="relative z-10 w-[55%] sm:w-[45%] lg:w-[60%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/40 blur-xl translate-y-[2rem] -z-10 rounded-[1rem]"></div>
                                <img src="{{ asset('images/business/iecex_xrt.jpg') }}" alt="IECEx Certificate" class="w-full h-auto rounded-[0.5rem] border-[0.6rem] border-white shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 인증서 하단 텍스트 --}}
                            <div class="relative z-10 mt-[5rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    SUCCESSFUL CERTIFICATION
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">
                                    성공적인 글로벌 방폭 인증 취득
                                </h4>
                            </div>
                        </div>
                    </div>

                    {{-- 2. 하단 프로세스 & 안내사항 통합 카드 --}}
                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        
                        <h3 class="text-[2.4rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-sync text-blue-600 mr-[1.5rem]"></i> 인증 진행 프로세스
                        </h3>

                        <div class="overflow-x-auto pb-[4rem] pt-[2rem] no-scrollbar">
                            <div class="relative min-w-[95rem] max-w-[110rem] mx-auto px-[2rem]">

                                {{-- 진행 선 --}}
                                <div class="absolute left-[6rem] right-[6rem] top-[3.5rem] h-[0.2rem] bg-gray-200 -translate-y-1/2 z-0"></div>

                                <div class="flex justify-between relative z-10">
                                    {{-- STEP 01 --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-white border-[0.3rem] border-gray-200 flex items-center justify-center text-gray-400 font-bold text-[2rem] mb-[2rem] group-hover:border-blue-500 group-hover:text-blue-500 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg">01</div>
                                        <h4 class="text-[1.6rem] font-bold text-gray-500 text-center break-keep group-hover:text-blue-600 transition-colors">{{ __('business.proc_develop') }}</h4>
                                    </div>
                                    {{-- STEP 02 --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-white border-[0.3rem] border-gray-200 flex items-center justify-center text-gray-400 font-bold text-[2rem] mb-[2rem] group-hover:border-blue-500 group-hover:text-blue-500 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg">02</div>
                                        <h4 class="text-[1.6rem] font-bold text-gray-500 text-center break-keep group-hover:text-blue-600 transition-colors">{{ __('business.proc_app') }}</h4>
                                    </div>
                                    {{-- STEP 03 --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-white border-[0.3rem] border-gray-200 flex items-center justify-center text-gray-400 font-bold text-[2rem] mb-[2rem] group-hover:border-blue-500 group-hover:text-blue-500 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg">03</div>
                                        <h4 class="text-[1.6rem] font-bold text-gray-500 text-center break-keep group-hover:text-blue-600 transition-colors">{{ __('business.proc_docs') }}</h4>
                                    </div>
                                    {{-- STEP 04 --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-white border-[0.3rem] border-gray-200 flex items-center justify-center text-gray-400 font-bold text-[2rem] mb-[2rem] group-hover:border-blue-500 group-hover:text-blue-500 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg">04</div>
                                        <h4 class="text-[1.6rem] font-bold text-gray-500 text-center break-keep group-hover:text-blue-600 transition-colors">{{ __('business.proc_prod') }}</h4>
                                    </div>
                                    {{-- STEP 05 --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-white border-[0.3rem] border-gray-200 flex items-center justify-center text-gray-400 font-bold text-[2rem] mb-[2rem] group-hover:border-blue-500 group-hover:text-blue-500 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg">05</div>
                                        <h4 class="text-[1.6rem] font-bold text-gray-500 text-center break-keep group-hover:text-blue-600 transition-colors">{{ __('business.proc_qs') }}</h4>
                                    </div>
                                    {{-- STEP 06 --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-white border-[0.3rem] border-gray-200 flex items-center justify-center text-gray-400 font-bold text-[2rem] mb-[2rem] group-hover:border-blue-500 group-hover:text-blue-500 transition-all duration-300 group-hover:-translate-y-2 group-hover:shadow-lg">06</div>
                                        <h4 class="text-[1.6rem] font-bold text-gray-500 text-center break-keep group-hover:text-blue-600 transition-colors">{{ __('business.proc_test') }}</h4>
                                    </div>
                                    {{-- FINAL STEP --}}
                                    <div class="flex flex-col items-center w-[12rem] group cursor-default">
                                        <div class="w-[7rem] h-[7rem] rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-[3rem] mb-[2rem] shadow-[0_0.5rem_1.5rem_rgba(37,99,235,0.4)] transition-all duration-300 group-hover:-translate-y-2 group-hover:scale-110">
                                            <i class="xi-check"></i>
                                        </div>
                                        <h4 class="text-[1.8rem] font-black text-blue-600 text-center break-keep">{{ __('business.proc_cert') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 안내 사항 (Note) --}}
                        <div class="mt-[2rem] bg-blue-50/50 border border-blue-100 rounded-[1.5rem] p-[3rem] flex flex-col md:flex-row gap-[2rem] justify-center items-start md:items-center">
                            <p class="flex items-center text-[1.5rem] text-gray-600 break-keep">
                                <i class="xi-info-o text-blue-500 text-[2.4rem] mr-[1rem] shrink-0"></i> 
                                {{ __('business.prod_note_1') }}
                            </p>
                            <span class="hidden md:block text-blue-200 mx-[2rem]">|</span>
                            <p class="flex items-center text-[1.5rem] text-gray-600 break-keep">
                                <i class="xi-info-o text-blue-500 text-[2.4rem] mr-[1rem] shrink-0"></i> 
                                {{ __('business.prod_note_2') }}
                            </p>
                        </div>

                    </div>

                    {{-- 3. 하단 문의하기 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_cons_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 2: 품질 시스템 컨설팅 (Emerald Theme Showcase)
             ========================================== --}}
        <div x-show="tab === 'quality'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[4rem]">
                        
                        {{-- [왼쪽] 품질 시스템 컨설팅 내용 및 테이블 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-emerald-600 mr-[1.5rem] rounded-full"></span>
                                {{ __('business.cons_tab_quality') }}
                            </h3>
                            
                            {{-- 컨설팅 리스트 영역 --}}
                            <div class="mb-[4rem]">
                                <div class="flex items-start group mb-[2rem]">
                                    <div class="w-[3.2rem] h-[3.2rem] rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mr-[1.5rem] shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                                        <i class="xi-check text-[1.8rem]"></i>
                                    </div>
                                    <div class="pt-[0.4rem]">
                                        <span class="text-[1.8rem] font-bold text-gray-800 leading-[1.5] break-keep group-hover:text-emerald-700 transition-colors">
                                            {{ __('business.qual_list_1') }}
                                        </span>
                                        {{-- 서브 리스트 --}}
                                        <div class="mt-[2rem] pl-[1.5rem] border-l-[0.2rem] border-emerald-100 space-y-[1.5rem]">
                                            <p class="text-[1.6rem] text-gray-600 flex items-center break-keep"><span class="w-[0.6rem] h-[0.6rem] bg-emerald-400 rounded-full mr-[1.5rem] shrink-0"></span>{{ __('business.qual_list_2') }}</p>
                                            <p class="text-[1.6rem] text-gray-600 flex items-center break-keep"><span class="w-[0.6rem] h-[0.6rem] bg-emerald-400 rounded-full mr-[1.5rem] shrink-0"></span>{{ __('business.qual_list_3') }}</p>
                                            <p class="text-[1.6rem] text-gray-600 flex items-center break-keep"><span class="w-[0.6rem] h-[0.6rem] bg-emerald-400 rounded-full mr-[1.5rem] shrink-0"></span>{{ __('business.qual_list_4') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- IECEx Service Facility 테이블 --}}
                            <div class="overflow-hidden bg-white rounded-[1.5rem] border border-gray-200 shadow-sm mt-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="bg-gray-50 text-gray-700 text-[1.6rem] uppercase tracking-wider font-bold py-[2rem] text-center border-b border-gray-200">
                                                {{ __('business.qual_fac_title') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-[1.6rem]">
                                        <tr class="border-b border-gray-100 hover:bg-emerald-50 transition duration-200">
                                            <td class="text-center font-bold text-emerald-600 bg-gray-50/50 py-[1.8rem] w-1/3 border-r border-gray-100">IECEx 03-2</td>
                                            <td class="py-[1.8rem] px-[3rem] text-gray-700 font-medium break-keep">{{ __('business.qual_fac_1') }}</td>
                                        </tr>
                                        <tr class="border-b border-gray-100 hover:bg-emerald-50 transition duration-200">
                                            <td class="text-center font-bold text-emerald-600 bg-gray-50/50 py-[1.8rem] w-1/3 border-r border-gray-100">IECEx 03-3</td>
                                            <td class="py-[1.8rem] px-[3rem] text-gray-700 font-medium break-keep">{{ __('business.qual_fac_2') }}</td>
                                        </tr>
                                        <tr class="border-b border-gray-100 hover:bg-emerald-50 transition duration-200">
                                            <td class="text-center font-bold text-emerald-600 bg-gray-50/50 py-[1.8rem] w-1/3 border-r border-gray-100">IECEx 03-4</td>
                                            <td class="py-[1.8rem] px-[3rem] text-gray-700 font-medium break-keep">{{ __('business.qual_fac_3') }}</td>
                                        </tr>
                                        <tr class="hover:bg-emerald-50 transition duration-200">
                                            <td class="text-center font-bold text-emerald-600 bg-gray-50/50 py-[1.8rem] w-1/3 border-r border-gray-100">IECEx 03-5</td>
                                            <td class="py-[1.8rem] px-[3rem] text-gray-700 font-medium break-keep">{{ __('business.qual_fac_4') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        {{-- [오른쪽] 에메랄드 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-emerald-500 to-[#064e3b] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(16,185,129,0.2)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-emerald-300/20 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 대표 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/30 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/quality_system.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/engineers,industrial,team'" alt="Quality System" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    QMS & SERVICE FACILITY
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    글로벌 스탠다드<br>품질 경영 시스템 구축
                                </h4>
                            </div>
                        </div>

                    </div>

                    {{-- 하단 문의하기 버튼 --}}
                    <div class="mt-[8rem] text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_qual_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 3: 위험성 평가 
             ========================================== --}}
        <div x-show="tab === 'risk'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    {{-- 상단 쇼케이스 영역 --}}
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        
                        {{-- [왼쪽] 내용 및 5가지 분석 기법 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span>
                                {{ __('business.ts_risk_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep mb-[5rem]">
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.ts_risk_list_1') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.ts_risk_list_2') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.ts_risk_list_3') }}</li>
                            </ul>

                            {{-- 5가지 분석 기법을 카드형 그리드로 컴팩트하게 배치 --}}
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-[1.5rem] mt-auto">
                                <div class="bg-amber-50/50 border border-amber-100 rounded-[1.5rem] p-[2rem] text-center hover:bg-amber-100 hover:border-amber-300 transition duration-300 group flex flex-col justify-center h-[11rem]">
                                    <span class="font-bold text-gray-800 text-[1.8rem] group-hover:text-amber-600 transition">{{ __('business.risk_method_1_title') }}</span>
                                    <span class="text-[1.3rem] text-gray-500 mt-[0.5rem] leading-[1.3] break-keep">{{ __('business.risk_method_1_desc') }}</span>
                                </div>
                                <div class="bg-amber-50/50 border border-amber-100 rounded-[1.5rem] p-[2rem] text-center hover:bg-amber-100 hover:border-amber-300 transition duration-300 group flex flex-col justify-center h-[11rem]">
                                    <span class="font-bold text-gray-800 text-[1.8rem] group-hover:text-amber-600 transition">{{ __('business.risk_method_2_title') }}</span>
                                    <span class="text-[1.3rem] text-gray-500 mt-[0.5rem] leading-[1.3] break-keep">{{ __('business.risk_method_2_desc') }}</span>
                                </div>
                                <div class="bg-amber-50/50 border border-amber-100 rounded-[1.5rem] p-[2rem] text-center hover:bg-amber-100 hover:border-amber-300 transition duration-300 group flex flex-col justify-center h-[11rem]">
                                    <span class="font-bold text-gray-800 text-[1.8rem] group-hover:text-amber-600 transition">{{ __('business.risk_method_3_title') }}</span>
                                    <span class="text-[1.3rem] text-gray-500 mt-[0.5rem] leading-[1.3] break-keep">{{ __('business.risk_method_3_desc') }}</span>
                                </div>
                                <div class="bg-amber-50/50 border border-amber-100 rounded-[1.5rem] p-[2rem] text-center hover:bg-amber-100 hover:border-amber-300 transition duration-300 group flex flex-col justify-center h-[11rem]">
                                    <span class="font-bold text-gray-800 text-[1.8rem] group-hover:text-amber-600 transition">{{ __('business.risk_method_4_title') }}</span>
                                    <span class="text-[1.3rem] text-gray-500 mt-[0.5rem] leading-[1.3] break-keep">{{ __('business.risk_method_4_desc') }}</span>
                                </div>
                                <div class="bg-amber-50/50 border border-amber-100 rounded-[1.5rem] p-[2rem] text-center hover:bg-amber-100 hover:border-amber-300 transition duration-300 group flex flex-col justify-center h-[11rem] sm:col-span-2">
                                    <span class="font-bold text-gray-800 text-[1.8rem] group-hover:text-amber-600 transition leading-tight break-keep">{{ __('business.risk_method_5_title') }}</span>
                                    <span class="text-[1.3rem] text-gray-500 mt-[0.5rem] leading-[1.3] break-keep">{{ __('business.risk_method_5_desc') }}</span>
                                </div>
                            </div>

                        </div>

                        {{-- [오른쪽] 앰버 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-[#9a3412] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-amber-300/20 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 다이어그램 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/30 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/risk_diagram.png') }}" onerror="this.src='https://placehold.co/600x400?text=Risk+Assessment+Diagram'" alt="Risk Assessment Diagram" class="w-full h-auto rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    RISK ASSESSMENT
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    체계적이고 정밀한<br>안전 위험성 평가
                                </h4>
                            </div>
                        </div>

                    </div>

                    {{-- 하단 풀사이즈 영역: 비교 테이블 --}}
                    <div class="mb-[8rem] bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)]">
                        <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center flex items-center justify-center tracking-tight">
                            <i class="xi-chart-bar text-amber-500 mr-[1.5rem]"></i> {{ __('business.ts_compare_title') }}
                        </h3>
                        
                        <div class="overflow-x-auto rounded-[1.5rem] border border-gray-200">
                            <table class="w-full text-left border-collapse min-w-[90rem]">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-700 text-[1.5rem] uppercase tracking-wider text-center border-b border-gray-200">
                                        <th class="p-[2rem] font-bold text-left">{{ __('business.ts_th_method') }}</th>
                                        <th class="p-[2rem] font-bold">{{ __('business.ts_th_cost') }}</th>
                                        <th class="p-[2rem] font-bold">{{ __('business.ts_th_uncert') }}</th>
                                        <th class="p-[2rem] font-bold">{{ __('business.ts_th_complex') }}</th>
                                        <th class="p-[2rem] font-bold">{{ __('business.ts_th_quant') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-center text-[1.6rem]">
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m1') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m2') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem] text-amber-600 font-bold">{{ __('business.val_high') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m3') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m4') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m5') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_any') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m6') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_low') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m7') }}</td><td class="p-[1.8rem] text-amber-600 font-bold">{{ __('business.val_high') }}</td><td class="p-[1.8rem] text-amber-600 font-bold">{{ __('business.val_high') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem] text-blue-600 font-bold">{{ __('business.val_pos') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m8') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem] text-blue-600 font-bold">{{ __('business.val_pos') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m9') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem] text-amber-600 font-bold">{{ __('business.val_high') }}</td><td class="p-[1.8rem] text-amber-600 font-bold">{{ __('business.val_high') }}</td><td class="p-[1.8rem]">{{ __('business.val_imp') }}</td></tr>
                                    <tr class="hover:bg-amber-50 transition"><td class="p-[1.8rem] text-left font-bold text-gray-800 bg-gray-50/30">{{ __('business.risk_tbl_m10') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem]">{{ __('business.val_med') }}</td><td class="p-[1.8rem] text-blue-600 font-bold">{{ __('business.val_pos') }}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    {{-- 하단 문의하기 버튼 --}}
                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_ts_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 4: 안전 기준 개발 
             ========================================== --}}
        <div x-show="tab === 'standard'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch">
                        
                        {{-- [왼쪽] 내용 및 리스트 (7칸 차지) --}}
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-orange-500 mr-[1.5rem] rounded-full"></span>
                                {{ __('business.ts_std_title') }}
                            </h3>
                            
                            <ul class="space-y-[2.5rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                @foreach([
                                    __('business.ts_std_list_1'), 
                                    __('business.ts_std_list_2'), 
                                    __('business.ts_std_list_3'), 
                                    __('business.ts_std_list_4')
                                ] as $list)
                                    <li class="flex items-start">
                                        <span class="w-[0.6rem] h-[0.6rem] bg-orange-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                        {{ $list }}
                                    </li>
                                @endforeach
                            </ul>
                            
                        </div>

                        {{-- [오른쪽] 오렌지 쇼케이스 (5칸 차지) --}}
                        <div class="lg:col-span-5 bg-gradient-to-br from-orange-500 to-[#9a3412] rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(249,115,22,0.2)] group h-full min-h-[50rem]">
                            
                            {{-- 배경 장식 (빛 번짐 효과) --}}
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute bottom-[-5rem] left-[-5rem] w-[20rem] h-[20rem] bg-orange-300/20 rounded-full blur-2xl pointer-events-none"></div>

                            {{-- 이미지 (호버 시 살짝 떠오르는 효과) --}}
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/30 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/safety_standard.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/industrial,pipes,plant'" alt="Safety Standard Development" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>

                            {{-- 쇼케이스 텍스트 --}}
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">
                                    SAFETY STANDARD
                                </span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                    맞춤형 산업 안전 기준<br>개발 및 가이드라인
                               </h4>
                            </div>
                        </div>

                    </div>

                    {{-- 하단 문의하기 버튼 --}}
                    <div class="mt-[8rem] text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_std_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>

                </div>
            </section>
        </div>

    </div>

@endsection
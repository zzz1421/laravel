@extends('layouts.foex')

@section('title', 'FOEX Suite')

@section('content')

    {{-- [1] 페이지 헤더 (소프트웨어/디지털 하이테크 스타일 - Full Screen) --}}
    {{-- 🚨 변경점: min-h-[90vh] 와 flex items-center 를 추가하여 화면에 가득 차게 만들었습니다. --}}
    <section class="relative w-full h-screen min-h-[80rem] flex items-center justify-center px-[4rem] md:px-[18rem] bg-[#0f172a] overflow-hidden">
        {{-- 디지털 네트워크/소프트웨어 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/products/suite_hero.jpg') }}" alt="FOEX Suite Software" class="absolute inset-0 w-full h-full object-cover opacity-30" onerror="this.src='https://loremflickr.com/1920/1080/software,interface'">
        
        <div class="absolute inset-0 bg-gradient-to-b from-[#0f172a]/60 via-[#0f172a]/80 to-[#0f172a] pointer-events-none z-0"></div>
        
        {{-- 장식용 빛 번짐 (Cyan & Blue) --}}
        <div class="absolute top-[-10rem] right-[-10rem] w-[40rem] h-[40rem] rounded-full bg-blue-600/20 blur-[10rem] z-0 pointer-events-none"></div>
        <div class="absolute bottom-[-10rem] left-[-10rem] w-[30rem] h-[30rem] rounded-full bg-cyan-500/20 blur-[8rem] z-0 pointer-events-none"></div>

        <div class="relative z-10 w-full max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[2rem] py-[0.6rem] bg-cyan-500/20 border border-cyan-400/30 text-cyan-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[3rem] rounded-full backdrop-blur-md">
                {{ __('products.suite_tag') }}
            </span>
            <h1 class="text-[4rem] md:text-[6.5rem] font-black text-white mb-[3rem] tracking-tight leading-[1.2]">
                {!! __('products.suite_title') !!}
            </h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep max-w-[90rem] mx-auto mb-[6rem]">
                {!! __('products.suite_desc') !!}
            </p>
            
            {{-- 히어로 버튼 영역 --}}
            <div class="flex flex-col sm:flex-row gap-[2rem] justify-center">
                <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-[2rem] px-[5rem] rounded-[1rem] shadow-[0_1rem_2rem_rgba(6,182,212,0.3)] transition duration-300 text-[1.8rem]">
                    {{ __('products.suite_btn_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                </a>
                <a href="#" class="inline-flex items-center justify-center bg-white/10 hover:bg-white/20 text-white border border-white/30 font-bold py-[2rem] px-[5rem] rounded-[1rem] backdrop-blur-sm transition duration-300 text-[1.8rem]">
                    <i class="xi-download mr-[1rem]"></i> {{ __('products.suite_btn_brochure') }}
                </a>
            </div>
        </div>
    </section>

    {{-- [2] 메인 콘텐츠 영역 --}}
    <div class="bg-white">
        <section class="py-[10rem] px-[4rem] md:px-[18rem]">
            <div class="max-w-[140rem] mx-auto">
                
                {{-- 1. 소프트웨어 쇼케이스 (12단 그리드) --}}
                <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[10rem]">
                    
                    {{-- [왼쪽] 설명 (7칸) --}}
                    <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                        <h3 class="text-[2.6rem] md:text-[3.2rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                            <span class="w-[0.6rem] h-[3rem] bg-cyan-500 mr-[1.5rem] rounded-full"></span> All-in-One Ex Solution
                        </h3>
                        
                        <div class="space-y-[2.5rem] text-[1.8rem] text-gray-700 leading-[1.8] break-keep mb-[5rem]">
                            <p>FOEX Suite는 방폭 기기의 설계, 선정, 설치, 검사 및 유지보수 이력까지 전 주기를 하나의 플랫폼에서 통합 관리할 수 있는 **스마트 산업 안전 소프트웨어**입니다.</p>
                            <p>복잡한 수기 문서 작업과 도면 관리를 디지털화하여 업무 효율을 극대화하고, 국제 방폭 표준(IECEx)에 부합하는 안전성을 보장합니다.</p>
                        </div>
                    </div>

                    {{-- [오른쪽] 소프트웨어 목업 쇼케이스 (5칸) --}}
                    <div class="lg:col-span-5 bg-gradient-to-br from-cyan-600 to-blue-800 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(6,182,212,0.3)] group h-full min-h-[50rem]">
                        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                        <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

                        {{-- 브라우저 목업 컨테이너 --}}
                        <div class="relative z-10 w-[95%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                            <div class="absolute inset-0 bg-black/40 blur-2xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                            
                            {{-- 가상의 브라우저 UI --}}
                            <div class="bg-gray-800 rounded-[1.5rem] overflow-hidden shadow-2xl border border-gray-600 relative z-10 flex flex-col">
                                <div class="bg-gray-900 px-[2rem] py-[1.2rem] flex items-center gap-[0.8rem] border-b border-gray-700">
                                    <div class="w-[1.2rem] h-[1.2rem] rounded-full bg-red-500"></div>
                                    <div class="w-[1.2rem] h-[1.2rem] rounded-full bg-yellow-500"></div>
                                    <div class="w-[1.2rem] h-[1.2rem] rounded-full bg-green-500"></div>
                                </div>
                                <div class="aspect-video bg-gray-100 flex items-center justify-center overflow-hidden">
                                    <img src="{{ asset('images/products/suite_dashboard.jpg') }}" onerror="this.src='https://placehold.co/800x450?text=FOEX+Suite+Dashboard'" alt="{{ __('products.suite_img_alt') }}" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>

                        <div class="relative z-10 mt-[6rem] text-center">
                            <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">SMART DASHBOARD</span>
                            <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                직관적인 UI/UX
                            </h4>
                        </div>
                    </div>
                </div>

                {{-- 2. 제품 핵심 기능 (3대 특징 카드) --}}
                <div class="text-center mb-[6rem]">
                    <h2 class="text-[3rem] md:text-[4rem] font-bold text-gray-900 tracking-tight">{{ __('products.feat_title') }}</h2>
                    <p class="text-[1.8rem] text-gray-500 mt-[1.5rem]">{{ __('products.feat_desc') }}</p>
                </div>

                <div class="grid md:grid-cols-3 gap-[3rem] mb-[10rem]">
                    {{-- Feature 1 --}}
                    <div class="p-[5rem] rounded-[2.5rem] bg-gray-50 hover:bg-white hover:shadow-[0_2rem_5rem_rgba(0,0,0,0.06)] hover:border-cyan-200 transition-all duration-300 border border-gray-100 group flex flex-col items-center text-center">
                        <div class="w-[9rem] h-[9rem] bg-blue-100 rounded-[2.5rem] flex items-center justify-center text-blue-600 text-[4rem] mb-[3rem] group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <i class="xi-calculator"></i>
                        </div>
                        <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1.5rem] break-keep">{{ __('products.feat_1_title') }}</h3>
                        <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                            {{ __('products.feat_1_desc') }}
                        </p>
                    </div>

                    {{-- Feature 2 --}}
                    <div class="p-[5rem] rounded-[2.5rem] bg-gray-50 hover:bg-white hover:shadow-[0_2rem_5rem_rgba(0,0,0,0.06)] hover:border-cyan-200 transition-all duration-300 border border-gray-100 group flex flex-col items-center text-center">
                        <div class="w-[9rem] h-[9rem] bg-teal-100 rounded-[2.5rem] flex items-center justify-center text-teal-600 text-[4rem] mb-[3rem] group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <i class="xi-document"></i>
                        </div>
                        <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1.5rem] break-keep">{{ __('products.feat_2_title') }}</h3>
                        <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                            {{ __('products.feat_2_desc') }}
                        </p>
                    </div>

                    {{-- Feature 3 --}}
                    <div class="p-[5rem] rounded-[2.5rem] bg-gray-50 hover:bg-white hover:shadow-[0_2rem_5rem_rgba(0,0,0,0.06)] hover:border-cyan-200 transition-all duration-300 border border-gray-100 group flex flex-col items-center text-center">
                        <div class="w-[9rem] h-[9rem] bg-indigo-100 rounded-[2.5rem] flex items-center justify-center text-indigo-600 text-[4rem] mb-[3rem] group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <i class="xi-refresh"></i>
                        </div>
                        <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1.5rem] break-keep">{{ __('products.feat_3_title') }}</h3>
                        <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                            {{ __('products.feat_3_desc') }}
                        </p>
                    </div>
                </div>

                {{-- 3. 솔루션 도입 효과 (Stats) --}}
                <div class="bg-gradient-to-r from-blue-900 to-cyan-900 rounded-[2.5rem] py-[6rem] px-[4rem] text-white shadow-[0_2rem_4rem_rgba(8,145,178,0.2)] relative overflow-hidden">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-30"></div>
                    <div class="relative z-10 grid grid-cols-2 md:grid-cols-4 gap-[4rem] text-center divide-x divide-white/20">
                        <div>
                            <div class="text-[5rem] font-black text-cyan-400 mb-[1rem] tracking-tighter">50<span class="text-[3rem]">%</span></div>
                            <div class="text-[1.6rem] text-blue-100 font-medium">{{ __('products.stat_time') }}</div>
                        </div>
                        <div>
                            <div class="text-[5rem] font-black text-cyan-400 mb-[1rem] tracking-tighter">0<span class="text-[3rem]">%</span></div>
                            <div class="text-[1.6rem] text-blue-100 font-medium">{{ __('products.stat_error') }}</div>
                        </div>
                        <div>
                            <div class="text-[5rem] font-black text-cyan-400 mb-[1rem] tracking-tighter">IEC</div>
                            <div class="text-[1.6rem] text-blue-100 font-medium">{{ __('products.stat_std') }}</div>
                        </div>
                        <div>
                            <div class="text-[5rem] font-black text-cyan-400 mb-[1rem] tracking-tighter">24/7</div>
                            <div class="text-[1.6rem] text-blue-100 font-medium">{{ __('products.stat_mon') }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
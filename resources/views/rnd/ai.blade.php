@extends('layouts.foex')

@section('title', __('menu.ai_sol'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    {{-- [1] 페이지 헤더 (AI 하이테크 스타일) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#0f172a] overflow-hidden">
        {{-- AI 느낌이 강한 배경 이미지 --}}
        <img src="{{ asset('images/rnd/ai_hero.jpg') }}" alt="FOEx AI Research" class="absolute inset-0 w-full h-full object-cover opacity-60" onerror="this.src='https://loremflickr.com/1920/1080/artificial-intelligence,network,data'">
        
        {{-- 2. 메인 그라데이션 (좌측 60% -> 중간 10% -> 우측 투명) --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1c1e]/60 via-[#1a1c1e]/10 to-transparent pointer-events-none z-0"></div>

        {{-- 3. 하단 페이드아웃 그림자 (높이 h-[8rem]으로 최소화) --}}
        <div class="absolute bottom-0 left-0 w-full h-[8rem] bg-gradient-to-t from-[#1a1c1e]/80 to-transparent z-0"></div>

        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">AI 솔루션 연구</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep max-w-[90rem] mx-auto">
                데이터 속에 숨겨진 인사이트를 찾아내어 산업 현장의 지능형 안전 시스템을 구축합니다.
            </p>
        </div>
    </section>

    {{-- [2] 메인 콘텐츠 영역 --}}
    <div class="bg-white">
        <section class="py-[10rem] px-[4rem] md:px-[18rem]">
            <div class="max-w-[140rem] mx-auto">
                
                {{-- 1. AI R&D 쇼케이스 (12단 그리드) --}}
                <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[10rem]">
                    
                    {{-- [왼쪽] 연구 배경 및 핵심 가치 (7칸) --}}
                    <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                        <h3 class="text-[2.6rem] md:text-[3.2rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                            <span class="w-[0.6rem] h-[3rem] bg-indigo-600 mr-[1.5rem] rounded-full"></span> Smart Safety with AI
                        </h3>
                        
                        <div class="space-y-[2.5rem] text-[1.8rem] text-gray-700 leading-[1.8] break-keep mb-[5rem]">
                            <p>포엑스는 산업 현장에서 발생하는 방대한 빅데이터를 기반으로 **딥러닝 및 머신러닝 알고리즘**을 독자적으로 연구합니다.</p>
                            <p>단순한 모니터링을 넘어, AI가 스스로 판단하고 예지하는 기술을 통해 사고를 미연에 방지하고 설비 운영의 효율성을 극대화하는 솔루션을 제공합니다.</p>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-[2.5rem]">
                            <div class="flex items-start">
                                <i class="xi-check-min text-indigo-600 text-[2.4rem] mr-[1rem] mt-[0.3rem]"></i>
                                <span class="text-[1.6rem] font-bold text-gray-800">실시간 데이터 전처리 및 분석</span>
                            </div>
                            <div class="flex items-start">
                                <i class="xi-check-min text-indigo-600 text-[2.4rem] mr-[1rem] mt-[0.3rem]"></i>
                                <span class="text-[1.6rem] font-bold text-gray-800">맞춤형 딥러닝 모델 설계</span>
                            </div>
                            <div class="flex items-start">
                                <i class="xi-check-min text-indigo-600 text-[2.4rem] mr-[1rem] mt-[0.3rem]"></i>
                                <span class="text-[1.6rem] font-bold text-gray-800">엣지 컴퓨팅 기반 AI 추론</span>
                            </div>
                            <div class="flex items-start">
                                <i class="xi-check-min text-indigo-600 text-[2.4rem] mr-[1rem] mt-[0.3rem]"></i>
                                <span class="text-[1.6rem] font-bold text-gray-800">지능형 대시보드 시각화</span>
                            </div>
                        </div>
                    </div>

                    {{-- [오른쪽] AI 테마 쇼케이스 (5칸) --}}
                    <div class="lg:col-span-5 bg-gradient-to-br from-indigo-700 to-violet-800 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(79,70,229,0.3)] group h-full min-h-[50rem]">
                        {{-- 배경 파티클 효과 무드 --}}
                        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
                        <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div class="relative z-10 w-[90%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                            <div class="absolute inset-0 bg-black/40 blur-2xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                            <img src="{{ asset('images/rnd/ai_core_tech.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/neural-network,technology'" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                        </div>

                        <div class="relative z-10 mt-[6rem] text-center">
                            <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">CORE TECHNOLOGY</span>
                            <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                독자적인 AI 엔진<br>FOEx Deep-Brain
                            </h4>
                        </div>
                    </div>
                </div>

                {{-- 2. 3대 핵심 AI 연구 분야 (그리드 카드) --}}
                <div class="grid md:grid-cols-3 gap-[3rem] mb-[10rem]">
                    {{-- 카드 1 --}}
                    <div class="bg-gray-50 border border-gray-100 rounded-[2.5rem] p-[5rem] hover:bg-white hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 group">
                        <div class="w-[8rem] h-[8rem] bg-white rounded-[2rem] shadow-sm flex items-center justify-center mb-[4rem] group-hover:bg-indigo-600 transition-colors">
                            <i class="xi-pulse text-[4rem] text-indigo-600 group-hover:text-white"></i>
                        </div>
                        <h4 class="text-[2.2rem] font-bold text-gray-900 mb-[2rem]">AI 예지보전</h4>
                        <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                            전동기, 펌프 등 회전기계의 전류 및 진동 데이터를 분석하여 고장이 발생하기 수주일 전 미리 징후를 알려줍니다.
                        </p>
                    </div>

                    {{-- 카드 2 --}}
                    <div class="bg-gray-50 border border-gray-100 rounded-[2.5rem] p-[5rem] hover:bg-white hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 group">
                        <div class="w-[8rem] h-[8rem] bg-white rounded-[2rem] shadow-sm flex items-center justify-center mb-[4rem] group-hover:bg-indigo-600 transition-colors">
                            <i class="xi-eye-o text-[4rem] text-indigo-600 group-hover:text-white"></i>
                        </div>
                        <h4 class="text-[2.2rem] font-bold text-gray-900 mb-[2rem]">지능형 영상 분석</h4>
                        <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                            CCTV 영상을 실시간으로 분석하여 작업자의 안전보호구 착용 여부, 쓰러짐 사고, 화재 징후 등을 AI가 즉각 감지합니다.
                        </p>
                    </div>

                    {{-- 카드 3 --}}
                    <div class="bg-gray-50 border border-gray-100 rounded-[2.5rem] p-[5rem] hover:bg-white hover:shadow-2xl hover:border-indigo-200 transition-all duration-300 group">
                        <div class="w-[8rem] h-[8rem] bg-white rounded-[2rem] shadow-sm flex items-center justify-center mb-[4rem] group-hover:bg-indigo-600 transition-colors">
                            <i class="xi-cloud-upload text-[4rem] text-indigo-600 group-hover:text-white"></i>
                        </div>
                        <h4 class="text-[2.2rem] font-bold text-gray-900 mb-[2rem]">빅데이터 플랫폼</h4>
                        <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                            현장의 다양한 센서 데이터를 클라우드로 수집하여 가공되지 않은 Raw Data를 분석 가능한 금광으로 변화시킵니다.
                        </p>
                    </div>
                </div>

                {{-- 3. 하단 문의하기 버튼 (인디고 스타일) --}}
                <div class="bg-[#f8fafc] rounded-[2rem] p-[6rem] text-center border border-gray-100 shadow-inner">
                    <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[1.5rem]">기술 협력 및 솔루션 도입 문의</h3>
                    <p class="text-[1.8rem] text-gray-500 mb-[4rem]">FOEx의 첨단 AI 기술로 귀사의 현장을 가장 똑똑하고 안전하게 변화시켜 드립니다.</p>
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                        상담 신청하기 <i class="xi-arrow-right ml-[1rem]"></i>
                    </a>
                </div>

            </div>
        </section>
    </div>

@endsection
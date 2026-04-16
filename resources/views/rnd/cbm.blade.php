@extends('layouts.foex')

@section('title', __('menu.cbm_tech'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    {{-- [1] 페이지 헤더 (R&D 다크 하이테크 스타일) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#0f172a] overflow-hidden">
        {{-- 설비 진단/센서 느낌의 배경 이미지 --}}
        {{-- 1. 이미지 선명도 대폭 올림 (opacity-40 -> opacity-80) --}}
        {{-- 💡 CBM은 설비 질감이 중요하므로 이미지를 더 선명하게 보여줍니다. --}}
        <img src="{{ asset('images/rnd/cbm_hero.jpg') }}" alt="FOEx CBM Technology" class="absolute inset-0 w-full h-full object-cover opacity-80" onerror="this.src='https://loremflickr.com/1920/1080/engine,sensor,technology'">
        
        {{-- 2. 그라데이션 농도 최소화 (글자가 있는 왼쪽만 아주 살짝, 우측은 완전 투명) --}}
        {{-- 💡 사진을 거의 가리지 않으면서 글자 가독성만 확보합니다. --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#0f172a]/60 via-[#0f172a]/10 to-transparent pointer-events-none z-0"></div>
        
        {{-- 3. 하단 페이드아웃 효과 최소화 (h-[20rem] -> h-[8rem]) --}}
        {{-- 💡 하단 설비가 가려지지 않도록 그림자 높이를 아주 낮춥니다. --}}
        <div class="absolute bottom-0 left-0 w-full h-[8rem] bg-gradient-to-t from-[#0f172a]/80 to-transparent z-0"></div>
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">CBM 예지보전 기술</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep max-w-[90rem] mx-auto">
                산업 핵심 설비의 상태를 실시간으로 정밀 진단하여 최적의 유지보수 시점을 예측합니다.
            </p>
        </div>
    </section>

    {{-- [2] 메인 콘텐츠 영역 --}}
    <div class="bg-white">
        <section class="py-[10rem] px-[4rem] md:px-[18rem]">
            <div class="max-w-[140rem] mx-auto">
                
                {{-- 1. CBM 쇼케이스 (12단 그리드) --}}
                <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[10rem]">
                    
                    {{-- [왼쪽] 기술 설명 (7칸) --}}
                    <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                        <h3 class="text-[2.6rem] md:text-[3.2rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                            <span class="w-[0.6rem] h-[3rem] bg-indigo-600 mr-[1.5rem] rounded-full"></span> 차세대 상태 기반 유지보수
                        </h3>
                        
                        <div class="space-y-[2.5rem] text-[1.8rem] text-gray-700 leading-[1.8] break-keep mb-[5rem]">
                            <p>기존의 주기적인 점검(TBM)이나 고장 후 수리(BM) 방식을 넘어, 설비의 **실제 상태(Condition)** 데이터를 모니터링하여 고장을 사전에 예방하는 가장 진보된 유지보수 기법입니다.</p>
                            <p>포엑스는 전류, 진동, 온도 등 복합적인 센서 데이터를 융합 분석하여 핵심 설비의 수명을 연장하고 다운타임(Downtime)을 획기적으로 줄입니다.</p>
                        </div>

                        <ul class="space-y-[2rem] text-[1.6rem] text-gray-600 leading-[1.8] border-t border-gray-100 pt-[4rem]">
                            <li class="flex items-start">
                                <span class="w-[0.6rem] h-[0.6rem] bg-indigo-500 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                <strong class="text-gray-800 mr-[1rem]">다운타임 최소화:</strong> 예기치 않은 설비 가동 중단 방지
                            </li>
                            <li class="flex items-start">
                                <span class="w-[0.6rem] h-[0.6rem] bg-indigo-500 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                <strong class="text-gray-800 mr-[1rem]">유지보수 비용 절감:</strong> 불필요한 부품 교체 및 오버홀(Overhaul) 감소
                            </li>
                            <li class="flex items-start">
                                <span class="w-[0.6rem] h-[0.6rem] bg-indigo-500 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> 
                                <strong class="text-gray-800 mr-[1rem]">안전성 향상:</strong> 화재 및 폭발 등 대형 산업 재해 사전 차단
                            </li>
                        </ul>
                    </div>

                    {{-- [오른쪽] 인디고 테마 쇼케이스 (5칸) --}}
                    <div class="lg:col-span-5 bg-gradient-to-br from-indigo-600 to-indigo-900 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(79,70,229,0.3)] group h-full min-h-[50rem]">
                        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                        <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/10 rounded-full blur-3xl pointer-events-none"></div>

                        <div class="relative z-10 w-[90%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                            <div class="absolute inset-0 bg-black/40 blur-2xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                            <img src="{{ asset('images/rnd/cbm_showcase.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/electric-motor,sensor'" alt="CBM System" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                        </div>

                        <div class="relative z-10 mt-[6rem] text-center">
                            <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">SMART DIAGNOSIS</span>
                            <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep leading-[1.4]">
                                설비 고장을 짚어내는<br>스마트 진단 솔루션
                            </h4>
                        </div>
                    </div>
                </div>

                {{-- 2. CBM 핵심 기술 요소 (그리드 카드) --}}
                <div class="mb-[10rem]">
                    <h3 class="text-[2.8rem] font-bold text-gray-900 mb-[4rem] text-center tracking-tight">FOEx CBM 핵심 진단 기술</h3>
                    <div class="grid md:grid-cols-3 gap-[3rem]">
                        
                        {{-- 카드 1: MCSA --}}
                        <div class="bg-white border border-gray-200 rounded-[2.5rem] overflow-hidden hover:shadow-[0_2rem_4rem_rgba(79,70,229,0.1)] hover:border-indigo-300 transition-all duration-300 group flex flex-col">
                            <div class="h-[22rem] overflow-hidden relative">
                                <div class="absolute inset-0 bg-indigo-900/20 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="https://loremflickr.com/600/400/waveform,data" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-[4rem] flex-grow">
                                <div class="w-[5rem] h-[5rem] bg-indigo-50 rounded-full flex items-center justify-center mb-[2rem]">
                                    <i class="xi-pulse text-[2.4rem] text-indigo-600"></i>
                                </div>
                                <h4 class="text-[2.2rem] font-bold text-gray-900 mb-[1.5rem]">전류 신호 분석 (MCSA)</h4>
                                <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                                    모터에 흐르는 미세한 전류 신호의 주파수 스펙트럼을 분석하여 회전자 봉 파손, 편심, 베어링 결함 등 기계적/전기적 이상을 센서 부착 없이 진단합니다.
                                </p>
                            </div>
                        </div>

                        {{-- 카드 2: Vibration --}}
                        <div class="bg-white border border-gray-200 rounded-[2.5rem] overflow-hidden hover:shadow-[0_2rem_4rem_rgba(79,70,229,0.1)] hover:border-indigo-300 transition-all duration-300 group flex flex-col">
                            <div class="h-[22rem] overflow-hidden relative">
                                <div class="absolute inset-0 bg-indigo-900/20 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="https://loremflickr.com/600/400/vibration,sensor" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-[4rem] flex-grow">
                                <div class="w-[5rem] h-[5rem] bg-indigo-50 rounded-full flex items-center justify-center mb-[2rem]">
                                    <i class="xi-chart-line text-[2.4rem] text-indigo-600"></i>
                                </div>
                                <h4 class="text-[2.2rem] font-bold text-gray-900 mb-[1.5rem]">진동 및 온도 분석</h4>
                                <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                                    고정밀 IoT 진동/온도 센서를 설비에 부착하여 미세한 떨림과 발열 현상을 실시간으로 추적하고, 결함의 원인과 진행 상태를 정확하게 파악합니다.
                                </p>
                            </div>
                        </div>

                        {{-- 카드 3: Edge AI --}}
                        <div class="bg-white border border-gray-200 rounded-[2.5rem] overflow-hidden hover:shadow-[0_2rem_4rem_rgba(79,70,229,0.1)] hover:border-indigo-300 transition-all duration-300 group flex flex-col">
                            <div class="h-[22rem] overflow-hidden relative">
                                <div class="absolute inset-0 bg-indigo-900/20 group-hover:bg-transparent transition-colors z-10"></div>
                                <img src="https://loremflickr.com/600/400/chip,server" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div class="p-[4rem] flex-grow">
                                <div class="w-[5rem] h-[5rem] bg-indigo-50 rounded-full flex items-center justify-center mb-[2rem]">
                                    <i class="xi-network-file text-[2.4rem] text-indigo-600"></i>
                                </div>
                                <h4 class="text-[2.2rem] font-bold text-gray-900 mb-[1.5rem]">엣지 AI 컴퓨팅</h4>
                                <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">
                                    수집된 방대한 데이터를 서버로 보내기 전, 현장에 설치된 엣지 디바이스(Edge Device)에서 AI가 즉각적으로 연산하여 지연 없는 실시간 경보를 제공합니다.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- 3. 시스템 구성도 (가로형 플로우) --}}
                <div class="bg-gray-50 border border-gray-200 rounded-[2rem] p-[4rem] md:p-[6rem] shadow-inner mb-[8rem]">
                    <h3 class="text-[2.6rem] font-bold text-gray-900 mb-[4rem] text-center tracking-tight">CBM 솔루션 아키텍처</h3>
                    
                    <div class="grid lg:grid-cols-4 gap-[2rem] relative">
                        {{-- 연결선 (데스크톱 전용) --}}
                        <div class="hidden lg:block absolute top-[6rem] left-[10%] right-[10%] h-[0.2rem] bg-indigo-200 border-dashed border-t-[0.2rem] z-0"></div>

                        <div class="bg-white rounded-[1.5rem] p-[3rem] text-center shadow-md relative z-10 border border-gray-100 hover:-translate-y-2 transition-transform duration-300">
                            <div class="w-[8rem] h-[8rem] bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-[2rem] shadow-lg">
                                <i class="xi-memory text-[3.5rem]"></i>
                            </div>
                            <h5 class="text-[1.8rem] font-bold text-gray-900 mb-[1rem]">데이터 수집</h5>
                            <p class="text-[1.4rem] text-gray-500 break-keep">IoT 센서를 통한 전류/진동 Data 취득</p>
                        </div>

                        <div class="bg-white rounded-[1.5rem] p-[3rem] text-center shadow-md relative z-10 border border-gray-100 hover:-translate-y-2 transition-transform duration-300">
                            <div class="w-[8rem] h-[8rem] bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-[2rem] shadow-lg">
                                <i class="xi-filter text-[3.5rem]"></i>
                            </div>
                            <h5 class="text-[1.8rem] font-bold text-gray-900 mb-[1rem]">전처리 및 엣지 연산</h5>
                            <p class="text-[1.4rem] text-gray-500 break-keep">노이즈 제거 및 특성 인자(Feature) 추출</p>
                        </div>

                        <div class="bg-white rounded-[1.5rem] p-[3rem] text-center shadow-md relative z-10 border border-gray-100 hover:-translate-y-2 transition-transform duration-300">
                            <div class="w-[8rem] h-[8rem] bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-[2rem] shadow-lg">
                                <i class="xi-brain text-[3.5rem]"></i>
                            </div>
                            <h5 class="text-[1.8rem] font-bold text-gray-900 mb-[1rem]">AI 진단 모델</h5>
                            <p class="text-[1.4rem] text-gray-500 break-keep">결함 패턴 매칭 및 남은 수명(RUL) 예측</p>
                        </div>

                        <div class="bg-white rounded-[1.5rem] p-[3rem] text-center shadow-md relative z-10 border border-gray-100 hover:-translate-y-2 transition-transform duration-300">
                            <div class="w-[8rem] h-[8rem] bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-[2rem] shadow-lg">
                                <i class="xi-dashboard text-[3.5rem]"></i>
                            </div>
                            <h5 class="text-[1.8rem] font-bold text-gray-900 mb-[1rem]">모니터링 대시보드</h5>
                            <p class="text-[1.4rem] text-gray-500 break-keep">실시간 상태 알림 및 유지보수 가이드 제공</p>
                        </div>
                    </div>
                </div>

                {{-- 4. 하단 문의하기 버튼 --}}
                <div class="text-center">
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                        CBM 도입 문의하기 <i class="xi-arrow-right ml-[1rem]"></i>
                    </a>
                </div>

            </div>
        </section>
    </div>

@endsection
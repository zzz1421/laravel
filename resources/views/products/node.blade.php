@extends('layouts.foex')

@section('title', 'FOEX Node')

@section('content')

    {{-- [1] 페이지 헤더 (하드웨어/IoT 하이테크 스타일) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#0f172a] overflow-hidden">
        {{-- 노드/센서/하드웨어 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/products/node_hero.jpg') }}" alt="FOEX Node Hardware" class="absolute inset-0 w-full h-full object-cover opacity-30" onerror="this.src='https://loremflickr.com/1920/1080/hardware,sensor'">
        
        <div class="absolute inset-0 bg-gradient-to-b from-[#0f172a]/70 via-[#0f172a]/90 to-[#0f172a] pointer-events-none z-0"></div>
        
        {{-- 장식용 빛 번짐 (Teal & Emerald) --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80rem] h-[80rem] rounded-full bg-teal-500/10 blur-[10rem] z-0 pointer-events-none"></div>

        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[2rem] py-[0.6rem] bg-teal-500/20 border border-teal-400/30 text-teal-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full backdrop-blur-md">
                {{ __('products.node_tag') }}
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight leading-[1.2]">
                {!! __('products.node_title') !!}
            </h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep max-w-[90rem] mx-auto mb-[6rem]">
                {!! __('products.node_desc') !!}
            </p>
            
            {{-- IoT 통신 애니메이션 그래픽 --}}
            <div class="relative max-w-[80rem] mx-auto">
                <div class="relative bg-gradient-to-b from-gray-700 to-gray-800 rounded-[2rem] p-[0.3rem] shadow-[0_2rem_5rem_rgba(20,184,166,0.2)] border border-gray-600">
                    <div class="bg-gray-900 rounded-[1.7rem] py-[4rem] flex flex-col items-center justify-center relative overflow-hidden group">
                        <div class="absolute inset-0 bg-[linear-gradient(rgba(20,184,166,0.05)_1px,transparent_1px),linear-gradient(90deg,rgba(20,184,166,0.05)_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
                        
                        <div class="relative z-10 flex gap-[3rem] items-center">
                            {{-- Sensor --}}
                            <div class="flex flex-col items-center animate-bounce duration-[2000ms]">
                                <i class="xi-sensor text-[4rem] text-gray-500 mb-[1rem]"></i>
                                <span class="text-[1.4rem] font-bold text-gray-500 tracking-wider">SENSOR</span>
                            </div>
                            
                            {{-- Line 1 --}}
                            <div class="h-[0.2rem] w-[8rem] bg-teal-500/30 relative overflow-hidden">
                                <div class="absolute inset-0 bg-teal-400 w-1/2 animate-[shimmer_2s_infinite]"></div>
                            </div>
                            
                            {{-- Node --}}
                            <div class="w-[12rem] h-[12rem] bg-teal-500/10 rounded-full flex items-center justify-center border-[0.2rem] border-teal-500/50 shadow-[0_0_4rem_rgba(20,184,166,0.3)] bg-clip-padding backdrop-filter backdrop-blur-md">
                                <i class="xi-chip text-[6rem] text-teal-400"></i>
                            </div>
                            
                            {{-- Line 2 --}}
                            <div class="h-[0.2rem] w-[8rem] bg-teal-500/30 relative overflow-hidden">
                                <div class="absolute inset-0 bg-teal-400 w-1/2 animate-[shimmer_2s_infinite] delay-75"></div>
                            </div>
                            
                            {{-- Cloud --}}
                            <div class="flex flex-col items-center animate-bounce duration-[2000ms] delay-150">
                                <i class="xi-cloud-server text-[4rem] text-gray-500 mb-[1rem]"></i>
                                <span class="text-[1.4rem] font-bold text-gray-500 tracking-wider">CLOUD</span>
                            </div>
                        </div>
                        <p class="mt-[4rem] text-teal-500 font-mono text-[1.4rem] animate-pulse tracking-widest">● DATA TRANSMITTING...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- [2] 메인 콘텐츠 영역 --}}
    <div class="bg-white">
        <section class="py-[10rem] px-[4rem] md:px-[18rem]">
            <div class="max-w-[140rem] mx-auto">
                
                {{-- 1. 기능 설명 쇼케이스 (12단 그리드) --}}
                <div class="grid lg:grid-cols-12 gap-[6rem] items-center mb-[10rem]">
                    
                    {{-- [왼쪽] 제품 특징 텍스트 (6칸) --}}
                    <div class="lg:col-span-6">
                        <h2 class="text-[3rem] md:text-[4rem] font-bold text-gray-900 mb-[6rem] tracking-tight leading-[1.3] break-keep">
                            {!! __('products.node_feat_title') !!}
                        </h2>
                        
                        <div class="space-y-[4rem]">
                            <div class="flex gap-[2.5rem]">
                                <div class="w-[6rem] h-[6rem] rounded-[1.5rem] bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 flex-shrink-0 shadow-sm">
                                    <i class="xi-wifi text-[2.8rem]"></i>
                                </div>
                                <div>
                                    <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem]">{{ __('products.node_feat_1_title') }}</h3>
                                    <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">{{ __('products.node_feat_1_desc') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-[2.5rem]">
                                <div class="w-[6rem] h-[6rem] rounded-[1.5rem] bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 flex-shrink-0 shadow-sm">
                                    <i class="xi-shield-checked text-[2.8rem]"></i>
                                </div>
                                <div>
                                    <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem]">{{ __('products.node_feat_2_title') }}</h3>
                                    <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">{{ __('products.node_feat_2_desc') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-[2.5rem]">
                                <div class="w-[6rem] h-[6rem] rounded-[1.5rem] bg-teal-50 border border-teal-100 flex items-center justify-center text-teal-600 flex-shrink-0 shadow-sm">
                                    <i class="xi-chart-line text-[2.8rem]"></i>
                                </div>
                                <div>
                                    <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem]">{{ __('products.node_feat_3_title') }}</h3>
                                    <p class="text-[1.6rem] text-gray-600 leading-[1.7] break-keep">{{ __('products.node_feat_3_desc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- [오른쪽] 제품 이미지/상태 표시 UI (6칸) --}}
                    <div class="lg:col-span-6 bg-gray-50 border border-gray-200 rounded-[3rem] h-[60rem] flex items-center justify-center relative overflow-hidden shadow-inner group">
                        {{-- 🚨 실제 노드 하드웨어 제품 사진으로 교체해 주세요 --}}
                        <img src="{{ asset('images/products/node_device.png') }}" onerror="this.src='https://placehold.co/600x600?text=FOEX+Node+Hardware'" alt="FOEX Node Device" class="w-auto h-[70%] object-contain drop-shadow-2xl group-hover:scale-105 transition-transform duration-500">
                        
                        {{-- 가상의 연결 상태 UI 요소 --}}
                        <div class="absolute bottom-[4rem] right-[4rem] bg-white p-[2rem] rounded-[1.5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.1)] border border-gray-100 w-[25rem] backdrop-blur-sm bg-white/90">
                            <div class="flex items-center gap-[1rem] mb-[1.5rem]">
                                <span class="w-[1rem] h-[1rem] rounded-full bg-green-500 animate-pulse"></span>
                                <span class="text-[1.4rem] font-bold text-gray-800 uppercase tracking-wider">Status: Normal</span>
                            </div>
                            <div class="flex justify-between text-[1.2rem] text-gray-500 mb-[0.5rem] font-bold">
                                <span>Signal Strength</span>
                                <span class="text-teal-600">Excellent</span>
                            </div>
                            <div class="h-[0.6rem] bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-teal-400 to-green-500 w-[90%]"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    {{-- [3] 스펙시트 (Specification) 영역 --}}
    <div class="bg-gray-50 py-[10rem] border-t border-gray-200">
        <div class="max-w-[100rem] mx-auto px-[4rem]">
            <h2 class="text-[3rem] font-bold text-center mb-[5rem] tracking-tight">{{ __('products.spec_title') }}</h2>
            
            <div class="bg-white rounded-[2rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] border border-gray-200 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <tbody class="text-[1.6rem] divide-y divide-gray-100">
                        <tr class="hover:bg-teal-50/30 transition-colors">
                            <th class="p-[3rem] bg-gray-50/50 text-gray-600 font-bold w-1/3 border-r border-gray-100">{{ __('products.spec_cpu') }}</th>
                            <td class="p-[3rem] text-gray-800 font-medium">{{ __('products.spec_cpu_val') }}</td>
                        </tr>
                        <tr class="hover:bg-teal-50/30 transition-colors">
                            <th class="p-[3rem] bg-gray-50/50 text-gray-600 font-bold w-1/3 border-r border-gray-100">{{ __('products.spec_conn') }}</th>
                            <td class="p-[3rem] text-gray-800 font-medium">{{ __('products.spec_conn_val') }}</td>
                        </tr>
                        <tr class="hover:bg-teal-50/30 transition-colors">
                            <th class="p-[3rem] bg-gray-50/50 text-gray-600 font-bold w-1/3 border-r border-gray-100">{{ __('products.spec_power') }}</th>
                            <td class="p-[3rem] text-gray-800 font-medium">{{ __('products.spec_power_val') }}</td>
                        </tr>
                        <tr class="hover:bg-teal-50/30 transition-colors">
                            <th class="p-[3rem] bg-gray-50/50 text-gray-600 font-bold w-1/3 border-r border-gray-100">{{ __('products.spec_prot') }}</th>
                            <td class="p-[3rem] text-gray-800 font-medium">{{ __('products.spec_prot_val') }}</td>
                        </tr>
                        <tr class="hover:bg-teal-50/30 transition-colors">
                            <th class="p-[3rem] bg-gray-50/50 text-gray-600 font-bold w-1/3 border-r border-gray-100">{{ __('products.spec_cert') }}</th>
                            <td class="p-[3rem] text-gray-800 font-medium">{{ __('products.spec_cert_val') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-[8rem] text-center">
                <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-teal-600 hover:bg-teal-700 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-[0_1rem_2rem_rgba(20,184,166,0.3)] transition duration-300 text-[1.8rem]">
                    {{ __('products.node_btn_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
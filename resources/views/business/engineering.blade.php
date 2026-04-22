@extends('layouts.foex')

@section('title', __('menu.engineering'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    {{-- [1] 페이지 헤더 (다크 히어로 스타일 공통 적용) --}}
    <x-page-hero 
        category="{{ __('menu.business') }}" 
        title="{{ __('business.eng_title') }}" 
        desc="{{ __('business.eng_desc') }}" 
        bg-image="images/business/engineering_hero.jpg" 
    />

    <div x-data="{ tab: 'design' }">

        {{-- [2] 프리미엄 탭 네비게이션 --}}
        <div class="bg-white border-b border-gray-200 sticky top-[8rem] z-30 shadow-sm">
            <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
                <div class="flex overflow-x-auto no-scrollbar gap-[1rem] py-[1rem]">
                    @foreach([
                        'design' => __('business.eng_tab_design'),
                        'inspection' => __('business.eng_tab_inspection'),
                        'diagnosis' => __('business.eng_tab_diagnosis'),
                        'selection' => __('business.eng_tab_selection'),
                        'construction' => __('business.eng_tab_construction'),
                        'facility' => __('business.eng_tab_facility')
                    ] as $key => $label)
                        <button @click="tab = '{{ $key }}'" 
                                :class="tab === '{{ $key }}' ? 'border-amber-500 text-amber-600 bg-amber-50/50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-900'" 
                                class="flex-shrink-0 px-[3rem] py-[2rem] text-[1.6rem] font-bold border-b-[0.3rem] transition duration-300 outline-none whitespace-nowrap">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ==========================================
             TAB 1: 방폭 설계 (Design)
             ========================================== --}}
        <div x-show="tab === 'design'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span> {{ __('business.eng_tab_design') }}
                            </h3>
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep mb-[4rem]">
                                <p>{{ __('business.eng_design_p1') }}</p>
                                <p class="font-bold text-amber-600 bg-amber-50 inline-block px-[1.5rem] py-[0.5rem] rounded-[0.8rem]">{{ __('business.eng_design_p2') }}</p>
                                <p>{{ __('business.eng_design_p3') }}</p>
                                <p>{{ __('business.eng_design_p4') }}</p>
                                <p>{!! __('business.eng_design_p5') !!}</p>
                            </div>
                            <ul class="grid sm:grid-cols-2 gap-x-[4rem] gap-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep border-t border-gray-100 pt-[4rem]">
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_design_list_1') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_design_list_2') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_design_list_3') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_design_list_4') }}</li>
                            </ul>
                        </div>
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-amber-700 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            <div class="absolute top-[-5rem] right-[-5rem] w-[25rem] h-[25rem] bg-white/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/eng_design.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/blueprint,engineer'" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">ENGINEERING DESIGN</span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">최적의 방폭 안전 설계</h4>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-[3rem] mb-[8rem]">
                        <div class="bg-white border border-gray-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.05)] hover:border-amber-300 transition duration-300 group">
                            <div class="h-[25rem] overflow-hidden"><img src="{{ asset('images/business/eng_design_1.jpg') }}" onerror="this.src='https://loremflickr.com/600/400/workers,construction'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div>
                            <div class="p-[3rem] text-center font-bold text-gray-800 text-[1.8rem]">Hazardous area equipment<br>register</div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.05)] hover:border-amber-300 transition duration-300 group">
                            <div class="h-[25rem] overflow-hidden"><img src="{{ asset('images/business/eng_design_2.jpg') }}" onerror="this.src='https://loremflickr.com/600/400/technology,network'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div>
                            <div class="p-[3rem] text-center font-bold text-gray-800 text-[1.8rem]">Certificate</div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.05)] hover:border-amber-300 transition duration-300 group">
                            <div class="h-[25rem] overflow-hidden"><img src="{{ asset('images/business/eng_design_3.png') }}" onerror="this.src='https://loremflickr.com/600/400/blueprint,drawing'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div>
                            <div class="p-[3rem] text-center font-bold text-gray-800 text-[1.8rem]">HAC Drawing</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 2: 검사 (Inspection)
             ========================================== --}}
        <div x-show="tab === 'inspection'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span> {{ __('business.eng_tab_inspection') }}
                            </h3>
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep mb-[4rem]">
                                <p>{!! __('business.eng_insp_p1') !!}</p>
                                <p>{!! __('business.eng_insp_p2') !!}</p>
                            </div>
                            <ul class="grid sm:grid-cols-2 gap-x-[4rem] gap-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep border-t border-gray-100 pt-[4rem]">
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_insp_list_1') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_insp_list_2') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_insp_list_3') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_insp_list_4') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_insp_list_5') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_insp_list_6') }}</li>
                            </ul>
                        </div>
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-amber-700 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/eng_inspection.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/inspector,helmet'" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">SITE INSPECTION</span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">철저한 현장 방폭 검사</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        <div class="grid md:grid-cols-2 gap-[8rem]">
                            <div>
                                <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[4rem] flex items-center"><i class="xi-search text-amber-500 mr-[1rem]"></i> {{ __('business.eng_insp_subtitle1') }}</h3>
                                <div class="grid grid-cols-2 gap-[1.5rem]">
                                    <div class="rounded-[1rem] overflow-hidden border border-gray-200 group"><img src="{{ asset('images/business/insp_corrosion.jpg') }}" onerror="this.src='https://placehold.co/400x300?text=Corrosion'" class="w-full h-[18rem] object-cover group-hover:scale-110 transition duration-300"><div class="bg-gray-50 text-center py-[1rem] text-[1.4rem] font-bold">Corrosion</div></div>
                                    <div class="rounded-[1rem] overflow-hidden border border-gray-200 group"><img src="{{ asset('images/business/insp_gland.jpg') }}" onerror="this.src='https://placehold.co/400x300?text=Broken+Gland'" class="w-full h-[18rem] object-cover group-hover:scale-110 transition duration-300"><div class="bg-gray-50 text-center py-[1rem] text-[1.4rem] font-bold">Broken Gland</div></div>
                                    <div class="rounded-[1rem] overflow-hidden border border-gray-200 group"><img src="{{ asset('images/business/insp_bolt.jpg') }}" onerror="this.src='https://placehold.co/400x300?text=Open+Bolt'" class="w-full h-[18rem] object-cover group-hover:scale-110 transition duration-300"><div class="bg-gray-50 text-center py-[1rem] text-[1.4rem] font-bold">Open Bolt</div></div>
                                    <div class="rounded-[1rem] overflow-hidden border border-gray-200 group"><img src="{{ asset('images/business/insp_seal.jpg') }}" onerror="this.src='https://placehold.co/400x300?text=Damaged+Seal'" class="w-full h-[18rem] object-cover group-hover:scale-110 transition duration-300"><div class="bg-gray-50 text-center py-[1rem] text-[1.4rem] font-bold">Damaged Seal</div></div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[4rem] flex items-center"><i class="xi-document text-amber-500 mr-[1rem]"></i> {{ __('business.eng_insp_subtitle2') }}</h3>
                                <div class="border border-gray-200 rounded-[1.5rem] bg-gray-50 p-[2rem] flex items-center justify-center h-[43.5rem] shadow-inner">
                                    <img src="{{ asset('images/business/iecex_report_form.png') }}" onerror="this.src='https://placehold.co/500x600?text=IECEx+Inspection+Report+Form'" class="max-h-full w-auto rounded-[0.5rem] shadow-md border border-white">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 3: 진단 (Diagnosis)
             ========================================== --}}
        <div x-show="tab === 'diagnosis'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span> {{ __('business.eng_tab_diagnosis') }}
                            </h3>
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep">
                                <p>{!! __('business.eng_diag_p1') !!}</p>
                                <p>{!! __('business.eng_diag_p2') !!}</p>
                            </div>
                        </div>
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-amber-700 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/eng_diagnosis.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/digital,interface'" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">EX DIAGNOSIS</span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">고도화된 방폭 시스템 진단</h4>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-[3rem] mb-[8rem]">
                        <div class="bg-white border border-gray-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.05)] hover:border-amber-300 transition duration-300 group">
                            <div class="h-[25rem] overflow-hidden"><img src="{{ asset('images/business/eng_diag_1.jpg') }}" onerror="this.src='https://loremflickr.com/600/400/digital,data'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div>
                            <div class="p-[4rem] text-center font-bold text-gray-800 text-[1.8rem] leading-[1.5] break-keep">{{ __('business.eng_diag_card1') }}</div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.05)] hover:border-amber-300 transition duration-300 group">
                            <div class="h-[25rem] overflow-hidden"><img src="{{ asset('images/business/eng_diag_2.jpg') }}" onerror="this.src='https://loremflickr.com/600/400/support,consulting'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div>
                            <div class="p-[4rem] text-center font-bold text-gray-800 text-[1.8rem] leading-[1.5] break-keep">{{ __('business.eng_diag_card2') }}</div>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-[2rem] overflow-hidden shadow-sm hover:shadow-[0_1rem_3rem_rgba(0,0,0,0.05)] hover:border-amber-300 transition duration-300 group">
                            <div class="h-[25rem] overflow-hidden"><img src="{{ asset('images/business/eng_diag_3.jpg') }}" onerror="this.src='https://loremflickr.com/600/400/factory,robot'" class="w-full h-full object-cover group-hover:scale-110 transition duration-500"></div>
                            <div class="p-[4rem] text-center font-bold text-gray-800 text-[1.8rem] leading-[1.5] break-keep">{{ __('business.eng_diag_card3') }}</div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 4: 자재선정 (Selection)
             ========================================== --}}
        <div x-show="tab === 'selection'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span> {{ __('business.eng_tab_selection') }}
                            </h3>
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep mb-[4rem]">
                                <p>{{ __('business.eng_sel_p1') }}</p>
                                <p>{{ __('business.eng_sel_p2') }}</p>
                                <p class="font-bold text-amber-600">{{ __('business.eng_sel_p3') }}</p>
                            </div>
                            <ul class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep border-t border-gray-100 pt-[4rem]">
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_sel_list_1') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_sel_list_2') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_sel_list_3') }}</li>
                            </ul>
                        </div>
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-amber-700 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/eng_selection.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/blueprint,hands'" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">MATERIAL SELECTION</span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">안전과 효율을 위한 자재 선정</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] mb-[8rem]">
                        <div class="grid lg:grid-cols-12 gap-[6rem] items-center">
                            <div class="lg:col-span-4 flex flex-col items-center w-full max-w-[30rem] mx-auto">
                                <div class="w-full py-[1.8rem] bg-gray-800 text-white text-center font-bold text-[1.6rem] shadow-md rounded-[1rem]">{{ __('business.eng_proc_1') }}</div>
                                <i class="xi-arrow-down text-gray-300 text-[2.4rem] py-[1rem]"></i>
                                <div class="w-full py-[1.8rem] bg-amber-400 text-gray-900 text-center font-bold text-[1.6rem] shadow-md rounded-[1rem]">{{ __('business.eng_proc_2') }}</div>
                                <i class="xi-arrow-down text-gray-300 text-[2.4rem] py-[1rem]"></i>
                                <div class="w-full py-[1.8rem] bg-gray-800 text-white text-center font-bold text-[1.6rem] shadow-md rounded-[1rem]">{{ __('business.eng_proc_3') }}</div>
                                <i class="xi-arrow-down text-gray-300 text-[2.4rem] py-[1rem]"></i>
                                <div class="w-full py-[1.8rem] bg-amber-400 text-gray-900 text-center font-bold text-[1.6rem] shadow-md rounded-[1rem]">{{ __('business.eng_proc_4') }}</div>
                                <i class="xi-arrow-down text-gray-300 text-[2.4rem] py-[1rem]"></i>
                                <div class="w-full py-[1.8rem] bg-gray-800 text-white text-center font-bold text-[1.6rem] shadow-md rounded-[1rem]">{{ __('business.eng_proc_5') }}</div>
                                <i class="xi-arrow-down text-gray-300 text-[2.4rem] py-[1rem]"></i>
                                <div class="w-full py-[1.8rem] bg-amber-400 text-gray-900 text-center font-bold text-[1.6rem] shadow-md rounded-[1rem]">{{ __('business.eng_proc_6') }}</div>
                            </div>
                            <div class="lg:col-span-8 border border-gray-200 p-[2rem] rounded-[1.5rem] bg-gray-50 flex flex-col items-center justify-center h-full min-h-[50rem]">
                                <img src="{{ asset('images/business/hac_drawing_example.jpg') }}" onerror="this.src='https://placehold.co/800x500?text=Zone+Classification+Drawing'" alt="HAC Drawing" class="w-full h-auto rounded-[1rem] shadow-sm border border-white">
                                <p class="text-center text-gray-500 text-[1.4rem] mt-[2rem] font-bold">IEC 60079-10-1 Hazardous Area Classification Example</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 5: 시공 (Construction)
             ========================================== --}}
        <div x-show="tab === 'construction'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span> {{ __('business.eng_tab_construction') }}
                            </h3>
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep mb-[4rem]">
                                <p>{{ __('business.eng_const_p1') }}</p>
                                <p>{{ __('business.eng_const_p2') }}</p>
                            </div>
                            <ul class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep border-t border-gray-100 pt-[4rem]">
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_const_list_1') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_const_list_2') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_const_list_3') }}</li>
                            </ul>
                        </div>
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-amber-700 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            <div class="relative z-10 w-[85%] sm:w-[70%] lg:w-[85%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/20 blur-xl translate-y-[2rem] -z-10 rounded-[2rem]"></div>
                                <img src="{{ asset('images/business/eng_construction.jpg') }}" onerror="this.src='https://loremflickr.com/800/600/industrial,worker'" class="w-full h-auto aspect-[4/3] object-cover rounded-[1.5rem] border-[0.6rem] border-white/80 shadow-2xl relative z-10 bg-white">
                            </div>
                            <div class="relative z-10 mt-[6rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">CONSTRUCTION</span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">글로벌 기준에 부합하는 시공</h4>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        {{-- ==========================================
             TAB 6: 서비스기업 (Facility)
             ========================================== --}}
        <div x-show="tab === 'facility'" x-cloak x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-[2rem]" x-transition:enter-end="opacity-100 translate-y-0">
            <section class="py-[10rem] px-[4rem] md:px-[18rem]">
                <div class="max-w-[140rem] mx-auto">
                    
                    <div class="grid lg:grid-cols-12 gap-[4rem] items-stretch mb-[8rem]">
                        <div class="lg:col-span-7 bg-white border border-gray-200 rounded-[2rem] p-[4rem] md:p-[5rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.03)] flex flex-col justify-center">
                            <h3 class="text-[2.6rem] md:text-[3rem] font-bold text-gray-900 mb-[4rem] pb-[2rem] border-b border-gray-100 flex items-center tracking-tight">
                                <span class="w-[0.6rem] h-[3rem] bg-amber-500 mr-[1.5rem] rounded-full"></span> {{ __('business.eng_tab_facility') }}
                            </h3>
                            <div class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep mb-[4rem]">
                                <p>{{ __('business.eng_fac_p1') }}</p>
                                <p>{!! __('business.eng_fac_p2') !!}</p>
                                <p class="font-bold text-amber-600">{{ __('business.eng_fac_p3') }}</p>
                            </div>
                            <h4 class="text-[2rem] font-bold text-gray-900 mt-[2rem] mb-[2rem] flex items-center"><i class="xi-shield-checked-o text-amber-500 mr-[1rem]"></i> IECEx Service Facility Scheme</h4>
                            <ul class="space-y-[2rem] text-[1.6rem] text-gray-700 leading-[1.8] break-keep border-t border-gray-100 pt-[3rem]">
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_fac_list_1') }}</li>
                                <li class="flex items-start"><span class="w-[0.6rem] h-[0.6rem] bg-amber-400 rounded-full mt-[1.2rem] mr-[1.5rem] shrink-0"></span> {{ __('business.eng_fac_list_2') }}</li>
                            </ul>
                        </div>
                        <div class="lg:col-span-5 bg-gradient-to-br from-amber-500 to-amber-700 rounded-[2rem] p-[5rem] relative overflow-hidden flex flex-col items-center justify-center shadow-[0_2rem_5rem_rgba(245,158,11,0.2)] group h-full min-h-[50rem]">
                            <div class="relative z-10 w-[60%] sm:w-[50%] lg:w-[65%] transform group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-500">
                                <div class="absolute inset-0 bg-black/30 blur-xl translate-y-[2rem] -z-10 rounded-[1rem]"></div>
                                <img src="{{ asset('images/business/iecex_coc_certificate.png') }}" onerror="this.src='https://placehold.co/500x700?text=IECEx+CoC+Certificate'" class="w-full h-auto rounded-[0.5rem] border-[0.6rem] border-white shadow-2xl relative z-10 bg-white">
                            </div>
                            <div class="relative z-10 mt-[5rem] text-center">
                                <span class="inline-block px-[2rem] py-[0.8rem] bg-white/20 border border-white/30 rounded-full text-white text-[1.4rem] font-bold tracking-widest backdrop-blur-sm mb-[1.5rem]">CERTIFIED FACILITY</span>
                                <h4 class="text-white text-[2.4rem] font-bold tracking-tight break-keep">공식 인증 방폭 서비스 기업</h4>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white font-bold py-[2rem] px-[6rem] rounded-[1rem] shadow-lg transition duration-300 text-[1.8rem]">
                            {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-[1rem]"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>

    </div>

@endsection
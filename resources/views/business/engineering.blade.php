@extends('layouts.foex')

@section('title', __('menu.engineering'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .proc-bar-black { @apply w-full py-3 bg-gray-800 text-white text-center font-bold text-sm shadow-sm rounded-sm; }
        .proc-bar-yellow { @apply w-full py-3 bg-amber-400 text-gray-900 text-center font-bold text-sm shadow-sm rounded-sm; }
        .proc-arrow { @apply text-gray-400 text-xl py-1; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('business.eng_title') }}</h1>
            <p class="text-gray-600">{{ __('business.eng_desc') }}</p>
        </div>
    </div>

    <div x-data="{ tab: 'design' }">

        <div class="bg-white border-b border-gray-200 sticky top-20 z-30 shadow-sm">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex overflow-x-auto no-scrollbar gap-1 py-1">
                    <button @click="tab = 'design'" :class="tab === 'design' ? 'border-gray-900 text-gray-900 bg-gray-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.eng_tab_design') }}</button>
                    <button @click="tab = 'inspection'" :class="tab === 'inspection' ? 'border-gray-900 text-gray-900 bg-gray-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.eng_tab_inspection') }}</button>
                    <button @click="tab = 'diagnosis'" :class="tab === 'diagnosis' ? 'border-gray-900 text-gray-900 bg-gray-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.eng_tab_diagnosis') }}</button>
                    <button @click="tab = 'selection'" :class="tab === 'selection' ? 'border-gray-900 text-gray-900 bg-gray-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.eng_tab_selection') }}</button>
                    <button @click="tab = 'construction'" :class="tab === 'construction' ? 'border-gray-900 text-gray-900 bg-gray-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.eng_tab_construction') }}</button>
                    <button @click="tab = 'facility'" :class="tab === 'facility' ? 'border-gray-900 text-gray-900 bg-gray-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.eng_tab_facility') }}</button>
                </div>
            </div>
        </div>

        <div x-show="tab === 'design'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-12 shadow-sm text-center mb-20 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gray-900"></div>
                    <div class="space-y-4 text-gray-700 leading-relaxed break-keep">
                        <p>{{ __('business.eng_design_p1') }}</p>
                        <p class="font-bold text-gray-900">{{ __('business.eng_design_p2') }}</p>
                        <p>{{ __('business.eng_design_p3') }}</p>
                        <p>{{ __('business.eng_design_p4') }}</p>
                        <p>{!! __('business.eng_design_p5') !!}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                    <div class="rounded-xl overflow-hidden shadow-lg h-[350px]">
                        <img src="https://source.unsplash.com/800x600/?construction,engineer,building" alt="Design" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <span class="w-2 h-2 bg-amber-500 mr-3"></span> {{ __('business.eng_tab_design') }}
                        </h2>
                        <ul class="space-y-4 text-gray-700 font-medium">
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_design_list_1') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_design_list_2') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_design_list_3') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_design_list_4') }}</li>
                        </ul>
                        <div class="mt-8">
                            <a href="{{ route('service.inquiry') }}" class="inline-flex items-center text-amber-600 font-bold hover:text-amber-700 transition">
                                {{ __('business.btn_eng_inquiry') }} <i class="xi-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="h-48 overflow-hidden"><img src="https://source.unsplash.com/600x400/?workers,construction" class="w-full h-full object-cover"></div>
                        <div class="p-6 text-center font-bold text-gray-800">Hazardous area equipment<br>register</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="h-48 overflow-hidden"><img src="https://source.unsplash.com/600x400/?technology,network" class="w-full h-full object-cover"></div>
                        <div class="p-6 text-center font-bold text-gray-800">Certificate</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <div class="h-48 overflow-hidden"><img src="https://source.unsplash.com/600x400/?blueprint,drawing" class="w-full h-full object-cover"></div>
                        <div class="p-6 text-center font-bold text-gray-800">HAC Drawing</div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'inspection'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-12 shadow-sm text-center mb-20">
                    <p class="text-gray-700 leading-relaxed mb-4">{!! __('business.eng_insp_p1') !!}</p>
                    <p class="text-gray-600">{!! __('business.eng_insp_p2') !!}</p>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                    <div class="rounded-xl overflow-hidden shadow-lg h-[400px]">
                        <img src="https://source.unsplash.com/800x600/?inspector,helmet" alt="Inspection" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-2 h-8 bg-amber-500 mr-3"></span> {{ __('business.eng_tab_inspection') }}</h2>
                        <ul class="space-y-4 text-gray-700">
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_insp_list_1') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_insp_list_2') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_insp_list_3') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_insp_list_4') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_insp_list_5') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_insp_list_6') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-6 border-l-4 border-amber-500 pl-3">{{ __('business.eng_insp_subtitle1') }}</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <img src="https://via.placeholder.com/200x200?text=Corrosion" class="w-full h-32 object-cover rounded shadow-sm">
                            <img src="https://via.placeholder.com/200x200?text=Broken+Gland" class="w-full h-32 object-cover rounded shadow-sm">
                            <img src="https://via.placeholder.com/200x200?text=Open+Bolt" class="w-full h-32 object-cover rounded shadow-sm">
                            <img src="https://via.placeholder.com/200x200?text=Damaged+Seal" class="w-full h-32 object-cover rounded shadow-sm">
                        </div>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-6 border-l-4 border-amber-500 pl-3">{{ __('business.eng_insp_subtitle2') }}</h3>
                        <div class="border border-gray-300 p-2 rounded bg-white shadow-sm">
                            <img src="https://via.placeholder.com/500x600?text=IECEx+Inspection+Report+Form" alt="Report" class="w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'diagnosis'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-12 shadow-sm text-center mb-20">
                    <p class="text-gray-700 leading-relaxed mb-4">{!! __('business.eng_diag_p1') !!}</p>
                    <p class="text-gray-600">{!! __('business.eng_diag_p2') !!}</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm text-center">
                        <img src="https://source.unsplash.com/600x400/?digital,interface" class="w-full h-48 object-cover">
                        <div class="p-6 font-bold text-gray-800">{{ __('business.eng_diag_card1') }}</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm text-center">
                        <img src="https://source.unsplash.com/600x400/?support,consulting" class="w-full h-48 object-cover">
                        <div class="p-6 font-bold text-gray-800">{{ __('business.eng_diag_card2') }}</div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm text-center">
                        <img src="https://source.unsplash.com/600x400/?factory,robot" class="w-full h-48 object-cover">
                        <div class="p-6 font-bold text-gray-800">{{ __('business.eng_diag_card3') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'selection'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-12 shadow-sm text-center mb-20 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gray-900"></div>
                    <div class="space-y-4 text-gray-700 leading-relaxed break-keep">
                        <p>{{ __('business.eng_sel_p1') }}</p>
                        <p>{{ __('business.eng_sel_p2') }}</p>
                        <p class="font-bold text-gray-900">{{ __('business.eng_sel_p3') }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                    <div class="rounded-xl overflow-hidden shadow-lg h-[350px]">
                        <img src="https://source.unsplash.com/800x600/?blueprint,hands,working" alt="Selection" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <span class="w-2 h-2 bg-amber-500 mr-3"></span> {{ __('business.eng_tab_selection') }}
                        </h2>
                        <ul class="space-y-4 text-gray-700 font-medium">
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_sel_list_1') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_sel_list_2') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_sel_list_3') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="grid md:grid-cols-12 gap-12 items-center">
                    <div class="md:col-span-4 flex flex-col items-center w-full max-w-xs mx-auto">
                        <div class="proc-bar-black">{{ __('business.eng_proc_1') }}</div><i class="xi-arrow-down proc-arrow"></i>
                        <div class="proc-bar-yellow">{{ __('business.eng_proc_2') }}</div><i class="xi-arrow-down proc-arrow"></i>
                        <div class="proc-bar-black">{{ __('business.eng_proc_3') }}</div><i class="xi-arrow-down proc-arrow"></i>
                        <div class="proc-bar-yellow">{{ __('business.eng_proc_4') }}</div><i class="xi-arrow-down proc-arrow"></i>
                        <div class="proc-bar-black">{{ __('business.eng_proc_5') }}</div><i class="xi-arrow-down proc-arrow"></i>
                        <div class="proc-bar-yellow">{{ __('business.eng_proc_6') }}</div>
                    </div>
                    <div class="md:col-span-8 border border-gray-200 p-4 rounded-lg shadow-sm bg-white">
                        <img src="https://via.placeholder.com/800x500?text=Zone+Classification+Drawing" alt="HAC Drawing" class="w-full h-auto">
                        <p class="text-center text-gray-500 text-sm mt-4">IEC 60079-10-1 Hazardous Area Classification Example</p>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'construction'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-12 shadow-sm text-center mb-20">
                    <p class="text-gray-700 leading-relaxed mb-2">{{ __('business.eng_const_p1') }}</p>
                    <p class="text-gray-700">{{ __('business.eng_const_p2') }}</p>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="rounded-xl overflow-hidden shadow-lg h-[350px]">
                        <img src="https://source.unsplash.com/800x600/?industrial,worker,install" alt="Construction" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-2 h-2 bg-amber-500 mr-3"></span> {{ __('business.eng_tab_construction') }}</h2>
                        <ul class="space-y-4 text-gray-700 font-medium">
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_const_list_1') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_const_list_2') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_const_list_3') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'facility'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-6xl mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-2xl p-8 md:p-12 shadow-sm mb-20 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gray-900"></div>
                    <div class="space-y-6 text-gray-700 leading-relaxed text-justify break-keep">
                        <p>{{ __('business.eng_fac_p1') }}</p>
                        <p>{!! __('business.eng_fac_p2') !!}</p>
                        <p>{{ __('business.eng_fac_p3') }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="border border-gray-200 p-2 rounded shadow-sm">
                        <img src="https://via.placeholder.com/500x700?text=IECEx+CoC+Certificate" alt="IECEx Certificate" class="w-full h-auto">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-2 h-2 bg-amber-500 mr-3"></span> IECEx Service Facility Scheme</h2>
                        <ul class="space-y-4 text-gray-700 font-medium">
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_fac_list_1') }}</li>
                            <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.eng_fac_list_2') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
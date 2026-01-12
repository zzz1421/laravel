@extends('layouts.foex')

@section('title', __('menu.education'))

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .swiper-pagination-bullet-active { background-color: #f59e0b !important; }
        [x-cloak] { display: none !important; }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('business.edu_title') }}</h1>
            <p class="text-gray-600">{{ __('business.edu_desc') }}</p>
        </div>
    </div>

    <div x-data="{ tab: 'copc' }">

        <div class="bg-white border-b border-gray-200 sticky top-20 z-30 shadow-sm">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex overflow-x-auto no-scrollbar gap-2 py-1">
                    <button @click="tab = 'copc'" :class="tab === 'copc' ? 'text-blue-700 border-blue-700 bg-blue-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.edu_tab_copc') }}</button>
                    <button @click="tab = 'tech'" :class="tab === 'tech' ? 'text-amber-600 border-amber-600 bg-amber-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.edu_tab_tech') }}</button>
                    <button @click="tab = 'motor'" :class="tab === 'motor' ? 'text-amber-600 border-amber-600 bg-amber-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.edu_tab_motor') }}</button>
                    <button @click="tab = 'hydrogen'" :class="tab === 'hydrogen' ? 'text-sky-600 border-sky-600 bg-sky-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.edu_tab_hydrogen') }}</button>
                    <button @click="tab = 'ess'" :class="tab === 'ess' ? 'text-orange-600 border-orange-600 bg-orange-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.edu_tab_ess') }}</button>
                    <button @click="tab = 'sil'" :class="tab === 'sil' ? 'text-emerald-600 border-emerald-600 bg-emerald-50' : 'text-gray-500 border-transparent hover:bg-gray-50 hover:text-gray-700'" class="flex-shrink-0 px-6 py-4 text-sm font-bold border-b-2 transition duration-200 outline-none whitespace-nowrap">{{ __('business.edu_tab_sil') }}</button>
                </div>
            </div>
        </div>

        <div x-show="tab === 'copc'" x-cloak class="animate-fade-in">
            <div class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                    <div class="rounded-xl overflow-hidden shadow-lg h-[400px]">
                        <img src="https://source.unsplash.com/800x600/?robot,industrial" alt="IECEx Education" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                            <span class="w-2 h-8 bg-blue-600 mr-3"></span> {{ __('business.copc_title') }}
                        </h2>
                        <div class="space-y-4 text-gray-600 leading-relaxed text-justify">
                            <p>{{ __('business.copc_p1') }}</p>
                            <p>{{ __('business.copc_p2') }}</p>
                            <p class="bg-gray-50 p-4 rounded border-l-4 border-gray-400 text-sm">
                                <strong>{{ __('business.copc_box') }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-slate-900 text-white py-20">
                <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-12 items-start">
                    <div class="md:w-1/3">
                        <span class="text-blue-400 font-bold tracking-widest text-sm uppercase mb-2 block">Recognised Training Provider</span>
                        <h2 class="text-3xl font-bold mb-6 leading-tight">{!! __('business.rtp_title') !!}</h2>
                        <p class="text-gray-400 mb-8">{{ __('business.rtp_desc') }}</p>
                        <a href="{{ route('service.edu.apply') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded transition">{{ __('business.edu_btn_apply') }}</a>
                    </div>
                    <div class="md:w-2/3 bg-white/5 p-8 rounded-xl border border-white/10 text-sm leading-7 space-y-4">
                        <p><i class="xi-check-circle text-blue-500 mr-2"></i> {{ __('business.rtp_check1') }}</p>
                        <p><i class="xi-check-circle text-blue-500 mr-2"></i> {{ __('business.rtp_check2') }}</p>
                    </div>
                </div>
            </div>

            <div class="py-24 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">{{ __('business.unit_title') }}</h2>
                    <div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-200">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 text-sm uppercase tracking-wider">
                                    <th class="p-5 font-bold border-b border-gray-200 w-32 text-center">{{ __('business.unit_th_code') }}</th>
                                    <th class="p-5 font-bold border-b border-gray-200">{{ __('business.unit_th_desc') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach(__('business.copc_units') as $unit)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="p-5 text-center font-bold text-blue-600 bg-gray-50/50">Unit Ex {{ $unit[0] }}</td>
                                    <td class="p-5">
                                        <span class="block font-bold text-gray-800">{{ $unit[1] }}</span>
                                        @if(!empty($unit[2]))
                                            <span class="block text-sm text-gray-500 mt-1">{{ $unit[2] }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'tech'" x-cloak class="animate-fade-in">
            <div class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16">
                        <div class="border border-gray-300 rounded-lg p-6 text-center hover:border-amber-500 hover:shadow-md transition bg-white flex items-center justify-center h-24 cursor-default"><span class="font-bold text-gray-700">{{ __('business.tech_g1') }}</span></div>
                        <div class="border border-gray-300 rounded-lg p-6 text-center hover:border-amber-500 hover:shadow-md transition bg-white flex flex-col items-center justify-center h-24 cursor-default"><span class="font-bold text-gray-700">{{ __('business.tech_g2') }}</span><span class="text-xs text-gray-500 mt-1">(Ex d, Ex e, Ex i, Ex p)</span></div>
                        <div class="border border-gray-300 rounded-lg p-6 text-center hover:border-amber-500 hover:shadow-md transition bg-white flex items-center justify-center h-24 cursor-default"><span class="font-bold text-gray-700">{{ __('business.tech_g3') }}</span></div>
                        <div class="border border-gray-300 rounded-lg p-6 text-center hover:border-amber-500 hover:shadow-md transition bg-white flex items-center justify-center h-24 cursor-default"><span class="font-bold text-gray-700">{{ __('business.tech_g4') }}</span></div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-24">
                        <div class="rounded-xl overflow-hidden shadow-lg h-[350px]">
                            <img src="https://source.unsplash.com/800x600/?meeting,training,office" alt="Tech" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-2 h-8 bg-amber-500 mr-3"></span> {{ __('business.tech_title') }}</h2>
                            <ul class="space-y-6 text-gray-700 leading-relaxed">
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.tech_list_1') }}</li>
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.tech_list_2') }}</li>
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.tech_list_3') }}</li>
                            </ul>
                            <div class="mt-8"><a href="{{ route('service.edu.apply') }}" class="inline-flex items-center text-amber-600 font-bold hover:text-amber-700 transition">{{ __('business.edu_btn_detail') }} <i class="xi-arrow-right ml-2"></i></a></div>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-16">
                        <div class="swiper techSwiper pb-12">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm h-64 flex items-center justify-center p-4"><div class="text-center"><i class="xi-cog text-6xl text-gray-300 mb-4"></i><p class="font-bold text-gray-700">{{ __('business.tech_s1') }}</p></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm h-64 flex items-center justify-center p-4"><div class="text-center"><i class="xi-safety text-6xl text-amber-500 mb-4"></i><p class="font-bold text-gray-700">{{ __('business.tech_s2') }}</p></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm h-64 flex items-center justify-center p-4"><div class="text-center"><i class="xi-circuit text-6xl text-blue-500 mb-4"></i><p class="font-bold text-gray-700">{{ __('business.tech_s3') }}</p></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm h-64 flex items-center justify-center p-4"><div class="text-center"><i class="xi-document text-6xl text-green-500 mb-4"></i><p class="font-bold text-gray-700">{{ __('business.tech_s4') }}</p></div></div></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'motor'" x-cloak class="animate-fade-in">
            <div class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div class="rounded-xl overflow-hidden shadow-lg h-[400px]">
                            <img src="https://source.unsplash.com/800x600/?electric-motor,engine" alt="Motor" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-3 h-3 bg-amber-500 mr-3 rounded-sm"></span> {{ __('business.motor_title') }}</h2>
                            <ul class="space-y-6 text-gray-700 leading-relaxed text-justify">
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.motor_list_1') }}</li>
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.motor_list_2') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-20">
                        <div class="bg-white border border-gray-300 rounded-lg p-4 text-center hover:border-amber-500 hover:shadow-md transition flex flex-col items-center justify-center h-32 cursor-default group"><span class="font-bold text-gray-800 mb-1 group-hover:text-amber-600 transition">{{ __('business.motor_g1') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-4 text-center hover:border-amber-500 hover:shadow-md transition flex flex-col items-center justify-center h-32 cursor-default group"><span class="font-bold text-gray-800 mb-1 group-hover:text-amber-600 transition">{{ __('business.motor_g2') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-4 text-center hover:border-amber-500 hover:shadow-md transition flex flex-col items-center justify-center h-32 cursor-default group"><span class="font-bold text-gray-800 mb-1 group-hover:text-amber-600 transition">{{ __('business.motor_g3') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-4 text-center hover:border-amber-500 hover:shadow-md transition flex flex-col items-center justify-center h-32 cursor-default group"><span class="font-bold text-gray-800 group-hover:text-amber-600 transition">{{ __('business.motor_g4') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-4 text-center hover:border-amber-500 hover:shadow-md transition flex flex-col items-center justify-center h-32 cursor-default group"><span class="font-bold text-gray-800 group-hover:text-amber-600 transition">{{ __('business.motor_g5') }}</span></div>
                    </div>
                    <div class="border-t border-gray-100 pt-16">
                        <div class="swiper motorSwiper pb-12">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-amber-50 flex items-center justify-center group-hover:bg-amber-100 transition"><i class="xi-woman text-8xl text-amber-500"></i><i class="xi-paper text-4xl text-gray-400 -ml-4 mt-8"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.motor_g4') }}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-blue-50 flex items-center justify-center group-hover:bg-blue-100 transition"><i class="xi-users text-8xl text-blue-500"></i><i class="xi-wrench text-4xl text-gray-400 -ml-2 mb-8"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.motor_g5') }}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-red-50 flex items-center justify-center group-hover:bg-red-100 transition"><i class="xi-spinner-1 text-8xl text-red-500 animate-spin-slow"></i></div><div class="p-6 text-center flex-grow flex flex-col items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.motor_g1') }}</h4></div></div></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'hydrogen'" x-cloak class="animate-fade-in">
            <div class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div class="rounded-xl overflow-hidden shadow-lg h-[400px] border border-sky-100">
                            <img src="https://source.unsplash.com/800x600/?hydrogen,energy,blue" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-3 h-3 bg-sky-500 mr-3 rounded-sm"></span> {{ __('business.hydro_title') }}</h2>
                            <ul class="space-y-6 text-gray-700 leading-relaxed text-justify">
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-sky-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.hydro_list_1') }}</li>
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-sky-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.hydro_list_2') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-20">
                        <div class="bg-white border border-gray-300 rounded-lg p-6 text-center hover:border-sky-500 hover:shadow-md transition flex items-center justify-center h-24 cursor-default group"><span class="font-bold text-gray-700 group-hover:text-sky-600 transition">{{ __('business.hydro_g1') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-6 text-center hover:border-sky-500 hover:shadow-md transition flex items-center justify-center h-24 cursor-default group"><span class="font-bold text-gray-700 group-hover:text-sky-600 transition">{{ __('business.hydro_g2') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-6 text-center hover:border-sky-500 hover:shadow-md transition flex items-center justify-center h-24 cursor-default group"><span class="font-bold text-gray-700 group-hover:text-sky-600 transition">{{ __('business.hydro_g3') }}</span></div>
                    </div>
                    <div class="border-t border-gray-100 pt-16">
                        <div class="swiper hydrogenSwiper pb-12">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-sky-50 flex items-center justify-center group-hover:bg-sky-100 transition relative overflow-hidden"><i class="xi-factory text-8xl text-sky-400 opacity-50 absolute left-4 bottom-0"></i><i class="xi-battery-full text-6xl text-blue-500 relative z-10"></i><i class="xi-flash text-4xl text-yellow-400 absolute top-10 right-10 animate-pulse"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.hydro_g2') }}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-cyan-50 flex items-center justify-center group-hover:bg-cyan-100 transition relative overflow-hidden"><i class="xi-ship text-9xl text-cyan-500 relative z-10"></i><div class="absolute bottom-0 w-full h-4 bg-blue-300/30"></div></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.hydro_g3') }}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-indigo-50 flex items-center justify-center group-hover:bg-indigo-100 transition relative overflow-hidden"><i class="xi-opacity text-8xl text-indigo-400"></i><span class="absolute text-4xl font-extrabold text-indigo-600">H<sub class="text-2xl">2</sub></span></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.hydro_g1') }}</h4></div></div></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'ess'" x-cloak class="animate-fade-in">
            <div class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div class="rounded-xl overflow-hidden shadow-lg h-[400px] border border-orange-100">
                            <img src="https://source.unsplash.com/800x600/?battery,factory,robot" alt="ESS" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center"><span class="w-3 h-3 bg-orange-500 mr-3 rounded-sm"></span> {{ __('business.ess_title') }}</h2>
                            <ul class="space-y-6 text-gray-700 leading-relaxed text-justify">
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-orange-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.ess_list_1') }}</li>
                                <li class="flex items-start"><span class="w-1.5 h-1.5 bg-orange-400 rounded-full mt-2.5 mr-3 shrink-0"></span> {{ __('business.ess_list_2') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6 mb-20">
                        <div class="bg-white border border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 hover:shadow-md transition flex items-center justify-center h-24 cursor-default group"><span class="font-bold text-gray-700 group-hover:text-orange-600 transition">{{ __('business.ess_g1') }}</span></div>
                        <div class="bg-white border border-gray-300 rounded-lg p-6 text-center hover:border-orange-500 hover:shadow-md transition flex items-center justify-center h-24 cursor-default group"><span class="font-bold text-gray-700 group-hover:text-orange-600 transition">{{ __('business.ess_g2') }}</span></div>
                    </div>
                    <div class="border-t border-gray-100 pt-16">
                        <div class="swiper essSwiper pb-12">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-gray-50 flex items-center justify-center group-hover:bg-gray-100 transition"><i class="xi-battery-full text-7xl text-gray-700 mr-2"></i><i class="xi-battery-charging text-7xl text-amber-500"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800 leading-tight">{!! __('business.ess_s1') !!}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-black flex items-center justify-center group-hover:opacity-90 transition relative overflow-hidden"><div class="absolute inset-0 bg-gradient-to-tr from-orange-600 to-yellow-300 opacity-30"></div><i class="xi-fire text-8xl text-orange-500 relative z-10 animate-pulse"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800 leading-tight">{!! __('business.ess_s2') !!}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-yellow-400 flex items-center justify-center group-hover:bg-yellow-300 transition relative overflow-hidden"><i class="xi-chip text-8xl text-white opacity-80"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800 leading-tight">{{ __('business.ess_s3') }}</h4></div></div></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab === 'sil'" x-cloak class="animate-fade-in">
            <div class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div class="rounded-xl overflow-hidden shadow-lg h-[400px] border border-emerald-100">
                            <img src="https://source.unsplash.com/800x600/?workers,safety,green" alt="SIL" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                                <span class="w-3 h-3 bg-emerald-500 mr-3 rounded-sm"></span>
                                {{ __('business.sil_title') }}
                            </h2>
                            <ul class="space-y-6 text-gray-700 leading-relaxed text-justify">
                                <li class="flex items-start">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                    {{ __('business.sil_list_1') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                    {{ __('business.sil_list_2') }}
                                </li>
                                <li class="flex items-start">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                    {{ __('business.sil_list_3') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="max-w-3xl mx-auto mb-20">
                        <div class="bg-white border border-gray-300 rounded-lg p-6 text-center hover:border-emerald-500 hover:shadow-md transition flex items-center justify-center h-28 cursor-default group">
                            <span class="font-bold text-lg text-gray-700 group-hover:text-emerald-600 transition">{{ __('business.sil_g1') }}</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-16">
                        <div class="swiper silSwiper pb-12">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-gray-100 flex items-center justify-center group-hover:bg-emerald-50 transition"><i class="xi-helmet text-8xl text-yellow-500"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.sil_s1') }}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-100 transition"><i class="xi-group text-8xl text-emerald-600"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.sil_s2') }}</h4></div></div></div>
                                <div class="swiper-slide"><div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition group h-80 flex flex-col"><div class="h-48 bg-slate-800 flex items-center justify-center group-hover:bg-slate-700 transition relative overflow-hidden"><div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-50"></div><i class="xi-man text-8xl text-white relative z-10"></i></div><div class="p-6 text-center flex-grow flex items-center justify-center"><h4 class="text-lg font-bold text-gray-800">{{ __('business.sil_s3') }}</h4></div></div></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiperOptions = {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            observer: true,
            observeParents: true,
            autoplay: { delay: 3500, disableOnInteraction: false },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 30 },
            },
        };

        var techSwiper = new Swiper(".techSwiper", { ...swiperOptions, pagination: { el: ".techSwiper .swiper-pagination", clickable: true } });
        var motorSwiper = new Swiper(".motorSwiper", { ...swiperOptions, pagination: { el: ".motorSwiper .swiper-pagination", clickable: true } });
        var hydrogenSwiper = new Swiper(".hydrogenSwiper", { ...swiperOptions, pagination: { el: ".hydrogenSwiper .swiper-pagination", clickable: true } });
        var essSwiper = new Swiper(".essSwiper", { ...swiperOptions, pagination: { el: ".essSwiper .swiper-pagination", clickable: true } });
        var silSwiper = new Swiper(".silSwiper", { ...swiperOptions, pagination: { el: ".silSwiper .swiper-pagination", clickable: true } });
    </script>

@endsection
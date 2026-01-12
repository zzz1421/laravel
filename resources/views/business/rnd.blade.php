@extends('layouts.foex')

@section('title', __('menu.rnd'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Process Flow Box (Dark Theme) */
        .process-dark-box {
            @apply flex-shrink-0 w-64 bg-gray-900 text-white p-5 flex flex-col items-center justify-center text-center rounded-sm shadow-md h-32;
        }
        .process-sub-text {
            @apply text-xs text-gray-400 mt-2 border-t border-gray-700 pt-2 w-full;
        }
        .process-arrow {
            @apply flex-shrink-0 mx-2 text-gray-400 text-xl;
        }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('business.rnd_title') }}</h1>
            <p class="text-gray-600">{{ __('business.rnd_desc') }}</p>
        </div>
    </div>

    <div x-data="{ tab: 'device' }">

        <div class="border-b border-gray-300 bg-white sticky top-20 z-30 shadow-sm">
            <div class="max-w-6xl mx-auto">
                <div class="flex w-full">
                    <button @click="tab = 'device'" 
                        :class="tab === 'device' ? 'border-b-2 border-gray-900 text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-700'"
                        class="w-1/2 py-5 text-center transition duration-200 text-lg">
                        {{ __('business.rnd_tab_device') }}
                    </button>

                    <button @click="tab = 'hydrogen'" 
                        :class="tab === 'hydrogen' ? 'border-b-2 border-gray-900 text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-700'"
                        class="w-1/2 py-5 text-center transition duration-200 text-lg">
                        {{ __('business.rnd_tab_hydrogen') }}
                    </button>
                </div>
            </div>
        </div>

        <div x-show="tab === 'device'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                
                <div class="mb-16">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center mb-6">
                        <span class="w-2 h-2 bg-amber-500 mr-3"></span>
                        {{ __('business.rnd_dev_title') }}
                    </h2>
                    <ul class="space-y-4 text-gray-700 leading-relaxed text-lg">
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_dev_list_1') }}
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_dev_list_2') }}
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_dev_list_3') }}
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_dev_list_4') }}
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_dev_list_5') }}
                        </li>
                    </ul>
                </div>

                <div class="grid md:grid-cols-3 gap-8 mb-20">
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition text-center group">
                        <div class="h-48 flex items-center justify-center bg-gray-50 rounded-lg mb-4 group-hover:bg-amber-50 transition">
                            <i class="xi-cog text-8xl text-gray-300 group-hover:text-amber-400 transition"></i>
                        </div>
                        <h4 class="font-bold text-gray-800">{{ __('business.rnd_dev_card1') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">Gasket Design & Simulation</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition text-center group">
                        <div class="h-48 flex items-center justify-center bg-gray-50 rounded-lg mb-4 group-hover:bg-amber-50 transition">
                            <i class="xi-plug text-8xl text-gray-300 group-hover:text-amber-400 transition"></i>
                        </div>
                        <h4 class="font-bold text-gray-800">{{ __('business.rnd_dev_card2') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">Ex d Gland & Enclosure</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition text-center group">
                        <div class="h-48 flex items-center justify-center bg-gray-50 rounded-lg mb-4 group-hover:bg-amber-50 transition">
                            <i class="xi-magnet text-8xl text-gray-300 group-hover:text-amber-400 transition"></i>
                        </div>
                        <h4 class="font-bold text-gray-800">{{ __('business.rnd_dev_card3') }}</h4>
                        <p class="text-sm text-gray-500 mt-1">Magnetic Flux Analysis</p>
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-8 text-center">{{ __('business.rnd_proc_title') }}</h3>
                    
                    <div class="overflow-x-auto pb-4">
                        <div class="flex items-center min-w-[1000px] justify-between px-2">
                            <div class="process-dark-box">
                                <span class="font-bold text-amber-400 mb-1">Step 01</span>
                                <span class="font-bold">{{ __('business.rnd_step_1') }}</span>
                                <div class="process-sub-text">{{ __('business.rnd_step_1_sub') }}</div>
                            </div>
                            <i class="xi-arrow-right process-arrow"></i>
                            
                            <div class="process-dark-box">
                                <span class="font-bold text-amber-400 mb-1">Step 02</span>
                                <span class="font-bold">{{ __('business.rnd_step_2') }}</span>
                                <div class="process-sub-text">{{ __('business.rnd_step_2_sub') }}</div>
                            </div>
                            <i class="xi-arrow-right process-arrow"></i>

                            <div class="process-dark-box">
                                <span class="font-bold text-amber-400 mb-1">Step 03</span>
                                <span class="font-bold">{{ __('business.rnd_step_3') }}</span>
                                <div class="process-sub-text">{!! __('business.rnd_step_3_sub') !!}</div>
                            </div>
                            <i class="xi-arrow-right process-arrow"></i>

                            <div class="process-dark-box">
                                <span class="font-bold text-amber-400 mb-1">Step 04</span>
                                <span class="font-bold">{{ __('business.rnd_step_4') }}</span>
                                <div class="process-sub-text">{!! __('business.rnd_step_4_sub') !!}</div>
                            </div>
                            <i class="xi-arrow-right process-arrow"></i>

                            <div class="process-dark-box">
                                <span class="font-bold text-amber-400 mb-1">Step 05</span>
                                <span class="font-bold">{{ __('business.rnd_step_5') }}</span>
                                <div class="process-sub-text">{!! __('business.rnd_step_5_sub') !!}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div x-show="tab === 'hydrogen'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                
                <div class="mb-16">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center mb-6">
                        <span class="w-2 h-2 bg-blue-500 mr-3"></span>
                        {{ __('business.rnd_hyd_title') }}
                    </h2>
                    <ul class="space-y-4 text-gray-700 leading-relaxed text-lg">
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_hyd_list_1') }}
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_hyd_list_2') }}
                        </li>
                        <li class="flex items-start">
                            <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                            {{ __('business.rnd_hyd_list_3') }}
                        </li>
                    </ul>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300 border border-emerald-100">
                        <div class="h-56 bg-emerald-50 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                            <i class="xi-rss text-9xl text-emerald-400 relative z-10"></i>
                            <i class="xi-warning text-4xl text-yellow-400 absolute top-10 right-10 animate-pulse"></i>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{!! __('business.rnd_hyd_card1') !!}</h3>
                            <p class="text-sm text-gray-500">Hydrogen Gas Detection System</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300 border border-indigo-100">
                        <div class="h-56 bg-indigo-50 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                            <i class="xi-battery-charging text-9xl text-indigo-400 relative z-10"></i>
                            <i class="xi-flash text-4xl text-yellow-400 absolute bottom-10 right-10"></i>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{!! __('business.rnd_hyd_card2') !!}</h3>
                            <p class="text-sm text-gray-500">Fuel Cell System Safety Design</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:-translate-y-2 transition duration-300 border border-teal-100">
                        <div class="h-56 bg-teal-50 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                            <i class="xi-home text-9xl text-teal-400 relative z-10"></i>
                            <i class="xi-arrow-down text-4xl text-teal-600 absolute top-4 left-1/2 -translate-x-1/2 animate-bounce"></i>
                        </div>
                        <div class="p-8 text-center">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{!! __('business.rnd_hyd_card3') !!}</h3>
                            <p class="text-sm text-gray-500">Fuel Supply System Safety</p>
                        </div>
                    </div>

                </div>

                <div class="mt-20 text-center">
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center bg-gray-900 hover:bg-black text-white font-bold py-4 px-12 rounded-lg shadow-lg transition">
                        {{ __('business.btn_rnd_inquiry') }} <i class="xi-arrow-right ml-2"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>

@endsection
@extends('layouts.foex')

@section('title', __('menu.business') . ' - ' . __('business.tech_svc_title'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Table Style */
        .tech-table th { @apply bg-gray-100 text-gray-800 font-bold py-3 px-4 border-b-2 border-gray-300 whitespace-nowrap; }
        .tech-table td { @apply py-3 px-4 border-b border-gray-200 text-gray-600 text-sm text-center; }
        .tech-table tr:hover { @apply bg-gray-50; }
        .tech-table td:first-child { @apply text-left font-medium text-gray-800 bg-gray-50/50; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('business.tech_svc_title') }}</h1>
            <p class="text-gray-600">{{ __('business.tech_svc_desc') }}</p>
        </div>
    </div>

    <div x-data="{ tab: 'risk' }">

        <div class="border-b border-gray-300 bg-white sticky top-20 z-30 shadow-sm">
            <div class="max-w-6xl mx-auto">
                <div class="flex w-full">
                    <button @click="tab = 'risk'" 
                        :class="tab === 'risk' ? 'border-b-2 border-gray-900 text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-700'"
                        class="w-1/2 py-5 text-center transition duration-200 text-lg">
                        {{ __('business.ts_tab_risk') }}
                    </button>

                    <button @click="tab = 'standard'" 
                        :class="tab === 'standard' ? 'border-b-2 border-gray-900 text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-700'"
                        class="w-1/2 py-5 text-center transition duration-200 text-lg">
                        {{ __('business.ts_tab_standard') }}
                    </button>
                </div>
            </div>
        </div>

        <div x-show="tab === 'risk'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                
                <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
                    <div class="border border-gray-200 rounded-xl p-2 shadow-sm">
                        <img src="https://via.placeholder.com/600x400?text=Risk+Assessment+Diagram" alt="Risk Assessment Diagram" class="w-full h-auto rounded-lg">
                    </div>
                    
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center mb-6">
                            <span class="w-2 h-2 bg-amber-500 mr-3"></span>
                            {{ __('business.ts_risk_title') }}
                        </h2>
                        <ul class="space-y-6 text-gray-700 leading-relaxed text-justify">
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_risk_list_1') }}
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_risk_list_2') }}
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_risk_list_3') }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-24">
                    <div class="group">
                        <div class="border border-gray-300 rounded-t-lg py-4 text-center text-sm font-bold text-gray-700 bg-white group-hover:border-amber-500 transition">
                            HAZID<br><span class="text-xs font-normal text-gray-500">Hazard Identifications</span>
                        </div>
                        <div class="h-40 overflow-hidden rounded-b-lg relative">
                            <img src="https://source.unsplash.com/400x300/?ship,port" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="border border-gray-300 rounded-t-lg py-4 text-center text-sm font-bold text-gray-700 bg-white group-hover:border-amber-500 transition">
                            HAZOP<br><span class="text-xs font-normal text-gray-500">Hazard and Operability</span>
                        </div>
                        <div class="h-40 overflow-hidden rounded-b-lg relative">
                            <img src="https://source.unsplash.com/400x300/?engineers,meeting" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="border border-gray-300 rounded-t-lg py-4 text-center text-sm font-bold text-gray-700 bg-white group-hover:border-amber-500 transition">
                            FMEA<br><span class="text-xs font-normal text-gray-500">Failure Mode and Effect Analysis</span>
                        </div>
                        <div class="h-40 overflow-hidden rounded-b-lg relative">
                            <img src="https://source.unsplash.com/400x300/?factory,inspection" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="border border-gray-300 rounded-t-lg py-4 text-center text-sm font-bold text-gray-700 bg-white group-hover:border-amber-500 transition">
                            LOPA<br><span class="text-xs font-normal text-gray-500">Layer of Protection Analysis</span>
                        </div>
                        <div class="h-40 overflow-hidden rounded-b-lg relative">
                            <img src="https://source.unsplash.com/400x300/?blueprint,safety" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="border border-gray-300 rounded-t-lg py-4 text-center text-sm font-bold text-gray-700 bg-white group-hover:border-amber-500 transition">
                            Ignition Risk Analysis<br><span class="text-xs font-normal text-gray-500">&nbsp;</span>
                        </div>
                        <div class="h-40 overflow-hidden rounded-b-lg relative">
                            <img src="https://source.unsplash.com/400x300/?fire,spark" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                        </div>
                    </div>
                </div>

                <div class="mb-12">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 border-l-4 border-amber-500 pl-3">{{ __('business.ts_compare_title') }}</h3>
                    <div class="overflow-x-auto bg-white border border-gray-300 rounded-lg shadow-sm">
                        <table class="w-full tech-table">
                            <thead>
                                <tr>
                                    <th>{{ __('business.ts_th_method') }}</th>
                                    <th>{{ __('business.ts_th_cost') }}</th>
                                    <th>{{ __('business.ts_th_uncert') }}</th>
                                    <th>{{ __('business.ts_th_complex') }}</th>
                                    <th>{{ __('business.ts_th_quant') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Check lists</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Preliminary hazard analysis</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Structured Interview and brainstorming</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Delphi technique</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>SWIFT (Structured "what-if")</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_any') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Root cause analysis</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_low') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Scenario analysis</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Business impact analysis</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>Fault tree analysis</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_pos') }}</td></tr>
                                <tr><td>Event tree analysis</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_pos') }}</td></tr>
                                <tr><td>Cause / consequence analysis</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_pos') }}</td></tr>
                                <tr><td>FMEA</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_pos') }}</td></tr>
                                <tr><td>HAZOP</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_imp') }}</td></tr>
                                <tr><td>LOPA</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_pos') }}</td></tr>
                                <tr><td>Bow tie analysis</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_high') }}</td><td>{{ __('business.val_med') }}</td><td>{{ __('business.val_pos') }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div x-show="tab === 'standard'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="rounded-xl overflow-hidden shadow-lg h-[400px] border border-gray-100">
                        <img src="https://source.unsplash.com/800x600/?industrial,pipes,plant" alt="Safety Standard Development" class="w-full h-full object-cover">
                    </div>
                    
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center mb-6">
                            <span class="w-2 h-2 bg-amber-500 mr-3"></span>
                            {{ __('business.ts_std_title') }}
                        </h2>
                        
                        <div class="space-y-6 text-gray-700 leading-relaxed text-justify">
                            <p class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_std_list_1') }}
                            </p>
                            <p class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_std_list_2') }}
                            </p>
                            <p class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_std_list_3') }}
                            </p>
                            <p class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-gray-400 rounded-full mt-2.5 mr-3 shrink-0"></span>
                                {{ __('business.ts_std_list_4') }}
                            </p>
                        </div>

                        <div class="mt-10">
                            <a href="{{ route('service.inquiry') }}" class="inline-flex items-center text-amber-600 font-bold hover:text-amber-700 transition">
                                {{ __('business.btn_std_inquiry') }} <i class="xi-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
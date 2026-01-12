@extends('layouts.foex')

@section('title', 'FOEX Node')

@section('content')

    <div class="bg-slate-900 text-white py-24 relative overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] rounded-full bg-teal-500 opacity-5 blur-[100px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-teal-500/10 border border-teal-500/30 text-teal-400 text-sm font-semibold mb-6">
                {{ __('products.node_tag') }}
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                {!! __('products.node_title') !!}
            </h1>
            <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
                {!! __('products.node_desc') !!}
            </p>
            
            <div class="relative max-w-4xl mx-auto mt-12">
                <div class="relative bg-gradient-to-b from-gray-700 to-gray-800 rounded-2xl p-1 shadow-2xl border border-gray-600">
                    <div class="bg-gray-900 rounded-xl aspect-[21/9] flex flex-col items-center justify-center relative overflow-hidden group">
                        <div class="absolute inset-0 bg-[linear-gradient(rgba(20,184,166,0.1)_1px,transparent_1px),linear-gradient(90deg,rgba(20,184,166,0.1)_1px,transparent_1px)] bg-[size:40px_40px]"></div>
                        
                        <div class="relative z-10 flex gap-8 items-center">
                            <div class="flex flex-col items-center animate-bounce duration-[2000ms]">
                                <i class="xi-sensor text-4xl text-gray-500 mb-2"></i>
                                <span class="text-xs text-gray-500">Sensor A</span>
                            </div>
                            <div class="h-px w-20 bg-teal-500/50 relative overflow-hidden">
                                <div class="absolute inset-0 bg-teal-400 w-1/2 animate-[shimmer_2s_infinite]"></div>
                            </div>
                            <div class="w-24 h-24 bg-teal-500/20 rounded-full flex items-center justify-center border border-teal-500/50 shadow-[0_0_30px_rgba(20,184,166,0.3)]">
                                <i class="xi-chip text-5xl text-teal-400"></i>
                            </div>
                            <div class="h-px w-20 bg-teal-500/50 relative overflow-hidden">
                                <div class="absolute inset-0 bg-teal-400 w-1/2 animate-[shimmer_2s_infinite] delay-75"></div>
                            </div>
                            <div class="flex flex-col items-center animate-bounce duration-[2000ms] delay-150">
                                <i class="xi-cloud-server text-4xl text-gray-500 mb-2"></i>
                                <span class="text-xs text-gray-500">Cloud</span>
                            </div>
                        </div>
                        <p class="mt-8 text-teal-500 font-mono text-sm animate-pulse">● Data Transmitting...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        {!! __('products.node_feat_title') !!}
                    </h2>
                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 flex-shrink-0">
                                <i class="xi-wifi text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('products.node_feat_1_title') }}</h3>
                                <p class="text-gray-600">{{ __('products.node_feat_1_desc') }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 flex-shrink-0">
                                <i class="xi-shield-checked text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('products.node_feat_2_title') }}</h3>
                                <p class="text-gray-600">{{ __('products.node_feat_2_desc') }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-teal-600 flex-shrink-0">
                                <i class="xi-chart-line text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ __('products.node_feat_3_title') }}</h3>
                                <p class="text-gray-600">{{ __('products.node_feat_3_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-2xl h-[500px] flex items-center justify-center relative overflow-hidden">
                    <i class="xi-network-company text-9xl text-gray-300"></i>
                    <div class="absolute bottom-6 right-6 bg-white p-4 rounded-lg shadow-lg max-w-xs">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                            <span class="text-xs font-bold text-gray-600">Status: Normal</span>
                        </div>
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-green-500 w-[80%]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-24 border-t border-gray-200">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-12">{{ __('products.spec_title') }}</h2>
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <th class="p-6 bg-gray-50 text-gray-600 w-1/3">{{ __('products.spec_cpu') }}</th>
                        <td class="p-6 text-gray-800">{{ __('products.spec_cpu_val') }}</td>
                    </tr>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <th class="p-6 bg-gray-50 text-gray-600">{{ __('products.spec_conn') }}</th>
                        <td class="p-6 text-gray-800">{{ __('products.spec_conn_val') }}</td>
                    </tr>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <th class="p-6 bg-gray-50 text-gray-600">{{ __('products.spec_power') }}</th>
                        <td class="p-6 text-gray-800">{{ __('products.spec_power_val') }}</td>
                    </tr>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <th class="p-6 bg-gray-50 text-gray-600">{{ __('products.spec_prot') }}</th>
                        <td class="p-6 text-gray-800">{{ __('products.spec_prot_val') }}</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <th class="p-6 bg-gray-50 text-gray-600">{{ __('products.spec_cert') }}</th>
                        <td class="p-6 text-gray-800">{{ __('products.spec_cert_val') }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center gap-2 bg-teal-600 hover:bg-teal-700 text-white font-bold py-4 px-10 rounded-lg transition shadow-lg shadow-teal-600/30">
                    <span>{{ __('products.node_btn_inquiry') }}</span>
                    <i class="xi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection
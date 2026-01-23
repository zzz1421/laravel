@extends('layouts.foex')

@section('title', 'FOEX Suite')

@section('content')

    <div class="bg-gray-900 text-white py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-blue-600 opacity-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-cyan-500 opacity-10 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-cyan-400 font-bold tracking-wider uppercase text-sm mb-2 block">{{ __('products.suite_tag') }}</span>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {!! __('products.suite_title') !!}
                </h1>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    {!! __('products.suite_desc') !!}
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('service.inquiry') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition">
                        {{ __('products.suite_btn_inquiry') }}
                    </a>
                    <a href="#" class="border border-gray-600 hover:border-gray-400 text-gray-300 hover:text-white font-bold py-3 px-8 rounded-lg transition">
                        {{ __('products.suite_btn_brochure') }}
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gray-800 border border-gray-700 rounded-xl shadow-2xl p-2 transform rotate-1 hover:rotate-0 transition duration-500">
                    <div class="bg-gray-900 rounded-lg aspect-video flex items-center justify-center overflow-hidden">
                        <i class="xi-browser text-6xl text-gray-700"></i>
                        <span class="ml-4 text-gray-600">{{ __('products.suite_img_alt') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">{{ __('products.feat_title') }}</h2>
                <p class="text-gray-500 mt-2">{{ __('products.feat_desc') }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition border border-gray-100 group">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition">
                        <i class="xi-calculator"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ __('products.feat_1_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('products.feat_1_desc') }}
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition border border-gray-100 group">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center text-green-600 text-2xl mb-6 group-hover:bg-green-600 group-hover:text-white transition">
                        <i class="xi-document"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ __('products.feat_2_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('products.feat_2_desc') }}
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-gray-50 hover:bg-white hover:shadow-xl transition border border-gray-100 group">
                    <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 text-2xl mb-6 group-hover:bg-purple-600 group-hover:text-white transition">
                        <i class="xi-refresh"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ __('products.feat_3_title') }}</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('products.feat_3_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-900 py-20 text-white">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-blue-800">
            <div>
                <div class="text-4xl font-bold text-cyan-400 mb-2">50%</div>
                <div class="text-blue-200">{{ __('products.stat_time') }}</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-cyan-400 mb-2">0%</div>
                <div class="text-blue-200">{{ __('products.stat_error') }}</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-cyan-400 mb-2">IEC</div>
                <div class="text-blue-200">{{ __('products.stat_std') }}</div>
            </div>
            <div>
                <div class="text-4xl font-bold text-cyan-400 mb-2">24/7</div>
                <div class="text-blue-200">{{ __('products.stat_mon') }}</div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.foex')

@section('title', __('menu.greeting'))

@section('content')

    <div class="relative h-[400px] flex items-center justify-center text-white">
        <div class="absolute inset-0 bg-gray-900">
            <div class="absolute inset-0 bg-[url('https://loremflickr.com/1600/900/business,building')] bg-cover bg-center opacity-30"></div>
        </div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('company.ceo_title') }}</h1>
            <p class="text-xl opacity-90 font-light">{{ __('company.ceo_subtitle') }}</p>
        </div>
    </div>

    <div class="py-24 max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-start">
            
            <div class="relative sticky top-24">
                <div class="bg-gray-200 rounded-lg aspect-[3/4] shadow-lg overflow-hidden">
                    <img src="https://loremflickr.com/600/800/man,suit" alt="CEO" class="w-full h-full object-cover grayscale hover:grayscale-0 transition duration-700">
                </div>
                
                <div class="absolute -bottom-6 -right-6 bg-blue-900 text-white p-6 rounded-lg shadow-xl hidden md:block">
                    <p class="font-bold text-sm text-blue-300 mb-1 uppercase">{{ __('company.ceo_role_short') }}</p>
                    <p class="text-2xl font-bold tracking-widest">{{ __('company.ceo_name') }}</p>
                </div>
            </div>
            
            <div>
                <span class="text-blue-600 font-bold tracking-widest text-sm uppercase mb-3 block">Global Business</span>
                
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 leading-tight">
                    {!! __('company.ceo_headline') !!}
                </h2>
                
                <div class="space-y-6 text-gray-700 leading-relaxed text-lg text-justify">
                    <p class="font-medium text-gray-900">{!! __('company.ceo_p1') !!}</p>
                    <p>{!! __('company.ceo_p2') !!}</p>
                    <p>{!! __('company.ceo_p3') !!}</p>
                    <p>{!! __('company.ceo_p4') !!}</p>
                    <p>{!! __('company.ceo_p5') !!}</p>
                    <p>{{ __('company.ceo_closing') }}</p>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">{{ __('company.ceo_role') }}</p>
                        <p class="text-2xl font-bold text-gray-800 font-serif">{{ __('company.ceo_name') }}</p>
                    </div>
                    <span class="text-4xl text-gray-300 font-script">Kang Gyu Hong</span>
                </div>
            </div>

        </div>
    </div>

@endsection
@extends('layouts.foex')

@section('title', 'Global Safety Partner')

@section('content')

    <div class="relative h-[600px] md:h-[800px] flex items-center justify-center text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://source.unsplash.com/1920x1080/?industrial,refinery,night" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div> </div>

        <div class="relative z-10 px-4 animate-fade-in-up">
            <h2 class="text-amber-400 font-bold text-lg md:text-2xl mb-4 tracking-widest uppercase">For Explosion Proof</h2>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                {{ __('main.hero_title') }}
            </h1>
            <p class="text-gray-200 text-lg md:text-xl mb-10 leading-relaxed">
                {!! __('main.hero_desc') !!}
            </p>
            <a href="{{ route('company.intro') }}" class="inline-block border-2 border-white text-white font-bold py-3 px-8 rounded-full hover:bg-white hover:text-gray-900 transition duration-300">
                {{ __('main.hero_btn') }}
            </a>
        </div>
    </div>

    <div class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('main.biz_title') }}</h2>
                <p class="text-gray-600">{{ __('main.biz_desc') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <a href="{{ route('business.education') }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-blue-100"></div>
                    <div class="w-14 h-14 bg-blue-600 rounded-lg flex items-center justify-center mb-6 text-white text-2xl relative z-10 group-hover:scale-110 transition">
                        <i class="xi-book"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition">{{ __('main.biz_1_title') }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6 h-10">{!! __('main.biz_1_desc') !!}</p>
                    <span class="text-blue-600 text-sm font-bold flex items-center">
                        {{ __('main.view_more') }} <i class="xi-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </span>
                </a>

                <a href="{{ route('business.consulting') }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-amber-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-amber-100"></div>
                    <div class="w-14 h-14 bg-amber-500 rounded-lg flex items-center justify-center mb-6 text-white text-2xl relative z-10 group-hover:scale-110 transition">
                        <i class="xi-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-amber-600 transition">{{ __('main.biz_2_title') }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6 h-10">{!! __('main.biz_2_desc') !!}</p>
                    <span class="text-amber-600 text-sm font-bold flex items-center">
                        {{ __('main.view_more') }} <i class="xi-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </span>
                </a>

                <a href="{{ route('business.engineering') }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-teal-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-teal-100"></div>
                    <div class="w-14 h-14 bg-teal-600 rounded-lg flex items-center justify-center mb-6 text-white text-2xl relative z-10 group-hover:scale-110 transition">
                        <i class="xi-cog"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-teal-600 transition">{{ __('main.biz_3_title') }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6 h-10">{!! __('main.biz_3_desc') !!}</p>
                    <span class="text-teal-600 text-sm font-bold flex items-center">
                        {{ __('main.view_more') }} <i class="xi-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </span>
                </a>

                <a href="{{ route('business.rnd') }}" class="group bg-white rounded-xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition duration-300 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-indigo-100"></div>
                    <div class="w-14 h-14 bg-indigo-600 rounded-lg flex items-center justify-center mb-6 text-white text-2xl relative z-10 group-hover:scale-110 transition">
                        <i class="xi-flask"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition">{{ __('main.biz_4_title') }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6 h-10">{!! __('main.biz_4_desc') !!}</p>
                    <span class="text-indigo-600 text-sm font-bold flex items-center">
                        {{ __('main.view_more') }} <i class="xi-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-20"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-2xl md:text-4xl font-bold mb-4">"{{ __('main.mid_title') }}"</h2>
            <p class="text-gray-400 text-lg mb-8">{{ __('main.mid_desc') }}</p>
        </div>
    </div>

    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-16">
            
            <div>
                <div class="flex justify-between items-end mb-6 border-b-2 border-gray-900 pb-2">
                    <h3 class="text-2xl font-bold text-gray-900">{{ __('main.news_title') }}</h3>
                    <a href="{{ route('pr.notice.index') }}" class="text-gray-500 hover:text-gray-900 text-sm flex items-center">
                        <i class="xi-plus-min mr-1"></i> More
                    </a>
                </div>
                <ul class="space-y-4">
                    @php
                        $notices = [
                            ['title'=>'2024 대한민국 안전산업 박람회 포엑스(주) 참가', 'date'=>'2024.09.06'],
                            ['title'=>'2024년 2차 IECEx CoPC 교육공고 (Unit Ex 001)', 'date'=>'2024.08.05'],
                            ['title'=>'포엑스 주식회사 소프트웨어 사업자 등록', 'date'=>'2024.04.26'],
                            ['title'=>'포엑스(주) 한국선박내연기관협회 가입', 'date'=>'2024.04.24'],
                        ];
                    @endphp
                    @foreach($notices as $notice)
                    <li class="flex justify-between items-center group cursor-pointer hover:bg-gray-50 p-2 rounded transition" onclick="location.href='{{ route('pr.notice.index') }}'">
                        <span class="text-gray-700 truncate w-3/4 group-hover:text-blue-600">{{ $notice['title'] }}</span>
                        <span class="text-gray-400 text-sm">{{ $notice['date'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-gray-50 rounded-xl p-8 border border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ __('main.cs_title') }}</h3>
                <p class="text-gray-600 mb-8">{{ __('main.cs_desc') }}</p>
                
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-blue-600 mr-4">
                        <i class="xi-call text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Tel.</p>
                        <p class="text-2xl font-bold text-gray-800">055-293-0521</p>
                    </div>
                </div>
                
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-blue-600 mr-4">
                        <i class="xi-mail text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">E-mail.</p>
                        <p class="text-lg font-bold text-gray-800">sklee@foex.kr</p>
                    </div>
                </div>

                <a href="{{ route('service.inquiry') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-lg text-center transition shadow-md">
                    {{ __('main.contact_us') }}
                </a>
            </div>

        </div>
    </div>

    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
    </style>

@endsection
@extends('layouts.foex')

@section('title', __('menu.location'))

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('company.loc_title') }}</h1>
            <p class="text-gray-600">{{ __('company.loc_desc') }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-16 px-4 space-y-24">
        
        <div class="grid md:grid-cols-2 gap-12 items-start">
                <div class="bg-gray-200 rounded-xl overflow-hidden shadow-inner h-[400px] relative group w-full">
                    
                    <div id="daumRoughmapContainer1768202938989" class="root_daum_roughmap root_daum_roughmap_landing" style="width:100%;"></div>

                    <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                    <script charset="UTF-8">
                        new daum.roughmap.Lander({
                            "timestamp" : "1768202938989",
                            "key" : "fv66oprua3a",
                            "mapWidth" : "100%",  // 여기를 100%로 변경했습니다!
                            "mapHeight" : "400"   // 높이도 디자인에 맞춰 400으로 변경
                        }).render();
                    </script>
                    </div>

                <div class="flex flex-col justify-center h-full">
                    <div class="mb-8">
                        <span class="text-blue-600 font-bold tracking-wider text-sm uppercase mb-2 block">{{ __('company.headquarters') }}</span>
                        <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                            {{ __('company.hq_name') }}
                        </h2>
                        <p class="text-gray-500 mt-2 text-sm">{{ __('company.hq_sub') }}</p>
                    </div>
                    
                    <ul class="space-y-6 border-l-2 border-gray-100 pl-6">
                        <li class="relative">
                            <span class="absolute -left-[31px] top-1 w-2 h-2 rounded-full bg-blue-600 ring-4 ring-white"></span>
                            <span class="block text-xs text-gray-400 font-bold mb-1">{{ __('company.label_addr') }}</span>
                            <p class="text-lg text-gray-800 font-medium leading-relaxed">
                                {!! __('company.hq_addr') !!}
                            </p>
                        </li>
                        <li class="relative">
                            <span class="absolute -left-[31px] top-1 w-2 h-2 rounded-full bg-gray-300 ring-4 ring-white"></span>
                            <span class="block text-xs text-gray-400 font-bold mb-1">{{ __('company.label_tel') }}</span>
                            <p class="text-lg text-gray-800 font-medium tracking-wide">052-277-8922</p>
                        </li>
                        <li class="relative">
                            <span class="absolute -left-[31px] top-1 w-2 h-2 rounded-full bg-gray-300 ring-4 ring-white"></span>
                            <span class="block text-xs text-gray-400 font-bold mb-1">{{ __('company.label_fax') }}</span>
                            <p class="text-lg text-gray-800 font-medium tracking-wide">055-293-0255</p>
                        </li>
                    </ul>

                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <a href="https://map.kakao.com/" target="_blank" class="inline-flex items-center text-sm text-gray-500 hover:text-blue-600 font-medium transition">
                            <i class="xi-map-marker mr-1"></i> {{ __('company.find_way') }}
                        </a>
                    </div>
                </div>
            </div>

        <div class="w-full h-px bg-gray-200"></div>

        <div class="grid md:grid-cols-2 gap-12 items-start">
            
            <div class="bg-gray-200 rounded-xl overflow-hidden shadow-inner h-[400px] relative group w-full md:order-2">
                
                <div id="daumRoughmapContainer1768203143212" class="root_daum_roughmap root_daum_roughmap_landing" style="width:100%;"></div>

                <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

                <script charset="UTF-8">
                    new daum.roughmap.Lander({
                        "timestamp" : "1768203143212",
                        "key" : "fv6bgtywb5o",
                        "mapWidth" : "100%",  // 반응형을 위해 100%로 변경
                        "mapHeight" : "400"   // 디자인 통일성을 위해 400으로 변경
                    }).render();
                </script>
                </div>

            <div class="flex flex-col justify-center h-full md:order-1">
                <div class="mb-8">
                    <span class="text-teal-600 font-bold tracking-wider text-sm uppercase mb-2 block">{{ __('company.rnd_center') }}</span>
                    <h2 class="text-3xl font-bold text-gray-900 flex items-center">
                        {{ __('company.rnd_name') }}
                    </h2>
                    <p class="text-gray-500 mt-2 text-sm">{{ __('company.rnd_sub') }}</p>
                </div>
                
                <ul class="space-y-6 border-l-2 border-gray-100 pl-6">
                    <li class="relative">
                        <span class="absolute -left-[31px] top-1 w-2 h-2 rounded-full bg-teal-500 ring-4 ring-white"></span>
                        <span class="block text-xs text-gray-400 font-bold mb-1">{{ __('company.label_addr') }}</span>
                        <p class="text-lg text-gray-800 font-medium leading-relaxed">
                            {!! __('company.rnd_addr') !!}
                        </p>
                    </li>
                    <li class="relative">
                        <span class="absolute -left-[31px] top-1 w-2 h-2 rounded-full bg-gray-300 ring-4 ring-white"></span>
                        <span class="block text-xs text-gray-400 font-bold mb-1">{{ __('company.label_tel') }}</span>
                        <p class="text-lg text-gray-800 font-medium tracking-wide">055-293-0521~4</p>
                    </li>
                    <li class="relative">
                        <span class="absolute -left-[31px] top-1 w-2 h-2 rounded-full bg-gray-300 ring-4 ring-white"></span>
                        <span class="block text-xs text-gray-400 font-bold mb-1">{{ __('company.label_fax') }}</span>
                        <p class="text-lg text-gray-800 font-medium tracking-wide">055-293-0255</p>
                    </li>
                </ul>

                <div class="mt-8 pt-8 border-t border-gray-100">
                    <a href="https://map.kakao.com/" target="_blank" class="inline-flex items-center text-sm text-gray-500 hover:text-blue-600 font-medium transition">
                        <i class="xi-map-marker mr-1"></i> {{ __('company.find_way') }}
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
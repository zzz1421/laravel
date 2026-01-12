@extends('layouts.foex')

@section('title', '홍보영상')

@section('content')

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">홍보영상</h1>
            <p class="text-gray-600">포엑스의 기술력과 비전을 영상으로 만나보세요.</p>
        </div>
    </div>

    <div class="py-20 bg-white" x-data="{ open: false, videoUrl: '' }">
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
                <span class="text-sm text-gray-600">전체 <b class="text-amber-600">2</b> 건 / 현재 1 페이지</span>
                <div class="flex gap-0">
                    <input type="text" class="border border-gray-300 px-3 py-2 text-sm w-48" placeholder="검색어 입력">
                    <button class="bg-amber-500 text-white px-3 py-2"><i class="xi-search"></i></button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="group cursor-pointer" 
                     @click="open = true; videoUrl = 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1'"> <div class="relative rounded-lg overflow-hidden border border-gray-200 aspect-video group-hover:shadow-lg transition">
                        <img src="https://via.placeholder.com/640x360.png?text=FOEX+Video+KR" alt="썸네일" class="w-full h-full object-cover">
                        
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition flex items-center justify-center">
                            <div class="w-14 h-14 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition duration-300">
                                <i class="xi-play text-2xl text-white ml-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-b border-gray-100 pb-4">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition truncate">FOEx Suite 홍보 영상 (국문)</h3>
                        <p class="text-sm text-gray-400 mt-1">2025.02.07</p>
                    </div>
                </div>

                <div class="group cursor-pointer" 
                     @click="open = true; videoUrl = 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1'">
                    <div class="relative rounded-lg overflow-hidden border border-gray-200 aspect-video group-hover:shadow-lg transition">
                        <img src="https://via.placeholder.com/640x360.png?text=FOEX+Video+EN" alt="썸네일" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition flex items-center justify-center">
                            <div class="w-14 h-14 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition duration-300">
                                <i class="xi-play text-2xl text-white ml-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-b border-gray-100 pb-4">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition truncate">FOEx Suite 홍보 영상 (영문)</h3>
                        <p class="text-sm text-gray-400 mt-1">2025.02.07</p>
                    </div>
                </div>

            </div>

            <div class="mt-12 flex justify-center">
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white text-sm font-bold">1</a>
            </div>
        </div>

        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center px-4" x-cloak>
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="open = false; videoUrl = ''"></div>
            
            <div class="relative bg-black w-full max-w-4xl aspect-video rounded-lg shadow-2xl overflow-hidden" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                
                <button @click="open = false; videoUrl = ''" class="absolute top-4 right-4 z-10 text-white hover:text-gray-300">
                    <i class="xi-close text-3xl"></i>
                </button>

                <iframe :src="videoUrl" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>

    </div>

@endsection
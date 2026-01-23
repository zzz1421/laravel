@extends('layouts.foex')

{{-- 1. 타이틀 변수 적용 --}}
@section('title', __('pr.media_title'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            {{-- 2. 페이지 타이틀 및 설명 --}}
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.media_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.media_desc') }}</p>
        </div>
    </div>

    {{-- Alpine.js 데이터 선언 (모달 제어용) --}}
    <div class="py-20 bg-white" x-data="{ open: false, videoUrl: '' }">
        <div class="max-w-7xl mx-auto px-4">
            
            {{-- 상단 검색 및 통계 --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 border-b border-gray-200 pb-4">
                <div class="text-sm text-gray-600 font-medium">
                    {{-- 3. 게시글 수 및 페이지 표시 (common 파일 활용) --}}
                    {{ __('common.total') }} <span class="text-amber-600 font-bold">{{ $videos->total() }}</span>{{ __('common.count') }} / {{ $videos->currentPage() }} {{ __('common.page') }}
                </div>
                
                {{-- form action을 pr.media 라우트로 변경해야 함 (컨트롤러에서 처리) --}}
                <form class="flex gap-0 w-full md:w-auto">
                    {{-- 4. 검색어 플레이스홀더 --}}
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('common.search_placeholder') }}" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            {{-- 비디오 그리드 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse($videos as $video)
                <div class="group cursor-pointer" 
                     @click="open = true; videoUrl = 'https://www.youtube.com/embed/{{ $video->video_id }}?autoplay=1'"> 
                    
                    {{-- 썸네일 영역 --}}
                    <div class="relative rounded-lg overflow-hidden border border-gray-200 aspect-video group-hover:shadow-lg transition bg-gray-100">
                        {{-- 모델에서 정의한 getThumbnailUrlAttribute() 사용 --}}
                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        
                        {{-- 재생 아이콘 오버레이 --}}
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition flex items-center justify-center">
                            <div class="w-14 h-14 bg-red-600 rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition duration-300">
                                <i class="xi-play text-2xl text-white ml-1"></i>
                            </div>
                        </div>
                    </div>

                    {{-- 텍스트 정보 --}}
                    <div class="mt-4 border-b border-gray-100 pb-4">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition truncate">
                            {{ $video->title }}
                        </h3>
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-sm text-gray-400">{{ $video->created_at->format('Y.m.d') }}</p>
                            <span class="text-xs text-gray-400"><i class="xi-eye"></i> {{ number_format($video->hit) }}</span>
                        </div>
                    </div>
                </div>
                @empty
                {{-- 5. 데이터 없음 메시지 --}}
                <div class="col-span-full py-20 text-center text-gray-400 border-2 border-dashed border-gray-100 rounded-lg">
                    {{ __('common.no_data') }}
                </div>
                @endforelse

            </div>

            {{-- 페이지네이션 --}}
            <div class="mt-12 flex justify-center">
                {{ $videos->appends(request()->input())->links('pagination.foex') }}
            </div>
        </div>

        {{-- 영상 재생 모달 --}}
        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center px-4" x-cloak>
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="open = false; videoUrl = ''"></div>
            
            <div class="relative bg-black w-full max-w-4xl aspect-video rounded-lg shadow-2xl overflow-hidden" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100">
                
                <button @click="open = false; videoUrl = ''" class="absolute top-4 right-4 z-10 text-white hover:text-gray-300 bg-black/50 rounded-full w-10 h-10 flex items-center justify-center transition">
                    <i class="xi-close text-2xl"></i>
                </button>

                <iframe :src="videoUrl" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>

    </div>

@endsection
@extends('layouts.foex')

@section('title', __('pr.press_title'))

@section('content')

    {{-- 헤더 영역 --}}
    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.press_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.press_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- 상단 툴바 (검색 등) --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4 border-b border-gray-100 pb-6"> 
                <div class="text-sm text-gray-600 font-medium">
                    {{ __('common.total') }} <span class="text-amber-600 font-bold">{{ number_format($pressReleases->total()) }}</span>{{ __('common.count') }}
                </div>
                
                <form action="{{ route('pr.press') }}" method="GET" class="flex gap-0 w-full md:w-auto shadow-sm">
                    <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 rounded-l-md px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" placeholder="{{ __('common.search_placeholder') }}">
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white px-5 py-2 rounded-r-md transition flex items-center justify-center">
                        <i class="xi-search text-lg"></i>
                    </button>
                </form>
            </div>

            {{-- ★ 카드 그리드 레이아웃 ★ --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($pressReleases as $item)
                    {{-- 카드 아이템 (클릭 시 새 창으로 링크 이동) --}}
                    <a href="{{ $item->link_url }}" target="_blank" class="group bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col h-full">
                        
                        {{-- 썸네일 영역 --}}
                        <div class="h-48 bg-gray-100 overflow-hidden relative border-b border-gray-100 group-hover:bg-blue-50 transition-colors duration-300">
                            
                            {{-- 1. 배경 (기본 아이콘) - 항상 밑에 깔려 있음 --}}
                            <div class="absolute inset-0 flex items-center justify-center text-gray-300 group-hover:text-blue-400 transition-colors duration-300">
                                <i class="xi-document text-5xl"></i>
                            </div>

                            {{-- 2. 이미지 (썸네일이 있을 때만 위에 덮어씌움) --}}
                            @if(!empty($item->thumbnail))
                                <img src="{{ $item->thumbnail }}"
                                    referrerpolicy="no-referrer"
                                    alt="{{ $item->title }}"
                                    class="absolute inset-0 w-full h-full object-cover z-10 hover:scale-105 transition-transform duration-500"
                                    {{-- 이미지가 깨지면(404) 스스로 사라져서 밑에 있는 아이콘을 보여줌 --}}
                                    onerror="this.style.display='none';">
                            @endif

                            {{-- 3. 날짜 배지 --}}
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-gray-800 shadow-sm z-20">
                                {{ $item->post_date->format('Y.m.d') }}
                            </div>
                        </div>

                        {{-- 2. 텍스트 내용 영역 --}}
                        <div class="p-6 flex-1 flex flex-col">
                            {{-- 제목 --}}
                            <h3 class="text-lg font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-amber-600 transition">
                                {{ $item->title }}
                            </h3>
                            
                            {{-- 작성자 / 언론사명 --}}
                            <div class="text-sm text-gray-500 mb-4 flex items-center">
                                <span class="font-medium text-gray-700">{{ $item->writer }}</span>
                                <span class="mx-2 text-gray-300">|</span>
                                <span><i class="xi-eye-o mr-1"></i> {{ number_format($item->hit) }}</span>
                            </div>

                            {{-- 하단 링크 버튼 (카드 하단에 고정) --}}
                            <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-sm font-medium text-blue-600 group-hover:underline flex items-center">
                                    {{ __('pr.read_more') }} <i class="xi-arrow-right ml-1 text-xs"></i>
                                </span>
                                <i class="xi-external-link text-gray-400 group-hover:text-blue-600 transition"></i>
                            </div>
                        </div>
                    </a>
                @empty
                    {{-- 데이터 없음 --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 py-24 text-center text-gray-500 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                        <i class="xi-document-off text-4xl mb-3 block text-gray-400"></i>
                        <p>{{ __('common.no_data') }}</p>
                    </div>
                @endforelse
            </div>

            {{-- 페이징 --}}
            <div class="mt-16 flex justify-center">
                {{ $pressReleases->appends(request()->input())->links('pagination.foex') }}
            </div>

        </div>
    </div>
@endsection
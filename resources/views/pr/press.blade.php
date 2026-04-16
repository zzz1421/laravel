@extends('layouts.foex')

@section('title', __('pr.press_title'))

@section('content')

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        {{-- 뉴스/미디어/비즈니스 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/pr/press_hero.jpg') }}" alt="FOEx Press Release" class="absolute inset-0 w-full h-full object-cover opacity-50" onerror="this.src='https://loremflickr.com/1920/1080/news,media'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                PR Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('pr.press_title') }}</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">{{ __('pr.press_desc') }}</p>
        </div>
    </section>

    {{-- [2] 보도자료 카드 그리드 영역 --}}
    <div class="py-[10rem] bg-white">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">

            {{-- 상단 컨트롤 바 (총 게시물 수 & 검색창) --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-[4rem] gap-[2rem] border-b border-gray-100 pb-[3rem]"> 
                <div class="text-[1.6rem] text-gray-600 font-medium w-full md:w-auto text-center md:text-left">
                    {{ __('common.total') }} <span class="text-blue-600 font-bold text-[1.8rem] mx-[0.5rem]">{{ number_format($pressReleases->total()) }}</span>{{ __('common.count') }}
                </div>
                
                <form action="{{ route('pr.press') }}" method="GET" class="flex w-full md:w-[40rem] shadow-sm rounded-[1rem] overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
                    <input type="text" name="search" value="{{ request('search') }}" class="w-full px-[2rem] py-[1.5rem] text-[1.6rem] text-gray-700 focus:outline-none bg-gray-50 focus:bg-white transition-colors" placeholder="{{ __('common.search_placeholder') }}">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-[3rem] py-[1.5rem] transition-colors flex items-center justify-center">
                        <i class="xi-search text-[2rem]"></i>
                    </button>
                </form>
            </div>

            {{-- ★ 프리미엄 카드 그리드 레이아웃 ★ --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[4rem]">
                @forelse($pressReleases as $item)
                    {{-- 카드 아이템 (클릭 시 새 창으로 링크 이동) --}}
                    <a href="{{ $item->link_url }}" target="_blank" class="group bg-white rounded-[2rem] border border-gray-200 overflow-hidden hover:shadow-[0_2rem_4rem_rgba(0,0,0,0.08)] hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-[0.5rem] flex flex-col h-full">
                        
                        {{-- 썸네일 영역 (16:9 비율 유지) --}}
                        <div class="aspect-video bg-gray-50 overflow-hidden relative border-b border-gray-100 group-hover:bg-blue-50/50 transition-colors duration-300 flex-shrink-0">
                            
                            {{-- 1. 배경 (기본 아이콘) - 항상 밑에 깔려 있음 --}}
                            <div class="absolute inset-0 flex items-center justify-center text-gray-200 group-hover:text-blue-200 transition-colors duration-300">
                                <i class="xi-paper-o text-[6rem]"></i>
                            </div>

                            {{-- 2. 이미지 (썸네일이 있을 때만 위에 덮어씌움) --}}
                            @if(!empty($item->thumbnail))
                                <img src="{{ $item->thumbnail }}"
                                     referrerpolicy="no-referrer"
                                     alt="{{ $item->title }}"
                                     class="absolute inset-0 w-full h-full object-cover z-10 group-hover:scale-105 transition-transform duration-700"
                                     {{-- 이미지가 깨지면(404) 스스로 사라져서 밑에 있는 아이콘을 보여줌 --}}
                                     onerror="this.style.display='none';">
                            @endif

                            {{-- 3. 날짜 배지 (썸네일 위에 플로팅) --}}
                            <div class="absolute top-[1.5rem] left-[1.5rem] bg-white/90 backdrop-blur-sm px-[1.5rem] py-[0.6rem] rounded-full text-[1.3rem] font-bold text-gray-800 shadow-sm z-20">
                                {{ $item->post_date->format('Y.m.d') }}
                            </div>
                            
                            {{-- 4. 호버 시 덮이는 반투명 오버레이 --}}
                            <div class="absolute inset-0 bg-blue-900/0 group-hover:bg-blue-900/20 transition-colors duration-300 z-15"></div>
                        </div>

                        {{-- 텍스트 내용 영역 --}}
                        <div class="p-[3rem] flex-1 flex flex-col">
                            {{-- 제목 --}}
                            <h3 class="text-[2rem] font-bold text-gray-900 mb-[1.5rem] leading-[1.4] line-clamp-2 group-hover:text-blue-600 transition-colors">
                                {{ $item->title }}
                            </h3>
                            
                            {{-- 작성자(언론사명) / 조회수 --}}
                            <div class="text-[1.4rem] text-gray-500 mb-[2.5rem] flex items-center">
                                <span class="font-bold text-gray-700 bg-gray-100 px-[1rem] py-[0.3rem] rounded-[0.5rem] mr-[1rem]">{{ $item->writer }}</span>
                                <span class="text-gray-300 mr-[1rem]">|</span>
                                <span><i class="xi-eye-o mr-[0.5rem]"></i> {{ number_format($item->hit) }}</span>
                            </div>

                            {{-- 하단 링크 버튼 (카드 하단에 고정) --}}
                            <div class="mt-auto pt-[2rem] border-t border-gray-100 flex justify-between items-center">
                                <span class="text-[1.5rem] font-bold text-blue-600 flex items-center group-hover:translate-x-[0.5rem] transition-transform">
                                    {{ __('pr.read_more') }} <i class="xi-arrow-right ml-[0.8rem] text-[1.4rem]"></i>
                                </span>
                                <div class="w-[3.5rem] h-[3.5rem] rounded-full bg-gray-50 flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                                    <i class="xi-external-link text-gray-400 text-[1.6rem] group-hover:text-white transition-colors"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    {{-- 데이터가 없을 때의 Empty State --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 py-[15rem] text-center text-gray-500 bg-gray-50 rounded-[2rem] border border-dashed border-gray-300">
                        <div class="w-[10rem] h-[10rem] bg-white rounded-full flex items-center justify-center mx-auto mb-[3rem] shadow-sm">
                            <i class="xi-paper-o text-[4rem] text-gray-300"></i>
                        </div>
                        <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem]">{{ __('common.no_data') }}</h3>
                        <p class="text-[1.6rem] text-gray-500">등록된 보도자료가 없습니다.</p>
                    </div>
                @endforelse
            </div>

            {{-- 페이징 --}}
            <div class="mt-[8rem] flex justify-center">
                {{ $pressReleases->appends(request()->input())->links('pagination.foex') }}
            </div>

        </div>
    </div>
@endsection
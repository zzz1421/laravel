@extends('layouts.foex')

{{-- 1. 타이틀 변수 적용 --}}
@section('title', __('pr.notice_title'))

@section('content')

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        {{-- 뉴스/공지사항/비즈니스 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/pr/notice_hero.jpg') }}" alt="FOEx Notice" class="absolute inset-0 w-full h-full object-cover opacity-50" onerror="this.src='https://loremflickr.com/1920/1080/news,announcement'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                PR Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('pr.notice_title') }}</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">{{ __('pr.notice_desc') }}</p>
        </div>
    </section>

    {{-- [2] 게시판 본문 영역 --}}
    <div class="py-[10rem] bg-white">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">

            {{-- 상단 컨트롤 바 (총 게시물 수 & 검색창) --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-[3rem] gap-[2rem]">
                <div class="text-[1.6rem] text-gray-600 font-medium w-full md:w-auto text-center md:text-left">
                    {{-- 2. 전체 게시글 수 / 페이지 표시 --}}
                    {{ __('common.total') }} <span class="text-blue-600 font-bold text-[1.8rem] mx-[0.5rem]">{{ $notices->total() }}</span>{{ __('common.count') }} 
                    <span class="mx-[1rem] text-gray-300">|</span> 
                    {{ $notices->currentPage() }} {{ __('common.page') }}
                </div>
                
                <form class="flex w-full md:w-[40rem] shadow-sm rounded-[1rem] overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
                    {{-- 3. 검색어 플레이스홀더 --}}
                    <input type="text" placeholder="{{ __('common.search_placeholder') }}" class="w-full px-[2rem] py-[1.5rem] text-[1.6rem] text-gray-700 focus:outline-none bg-gray-50 focus:bg-white transition-colors">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-[3rem] py-[1.5rem] transition-colors flex items-center justify-center">
                        <i class="xi-search text-[2rem]"></i>
                    </button>
                </form>
            </div>

            {{-- 프리미엄 테이블 영역 --}}
            <div class="bg-white border border-gray-200 rounded-[2rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.02)] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-[100rem]">
                        {{-- 4. 테이블 헤더 --}}
                        <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-[1.5rem] font-bold uppercase tracking-wider">
                            <tr>
                                <th class="py-[2.5rem] px-[2rem] w-[10rem] text-center">{{ __('common.no') }}</th>
                                <th class="py-[2.5rem] px-[2rem] text-center">{{ __('common.title') }}</th>
                                <th class="py-[2.5rem] px-[2rem] w-[12rem] text-center">{{ __('common.file') }}</th>
                                <th class="py-[2.5rem] px-[2rem] w-[15rem] text-center">{{ __('common.date') }}</th>
                                <th class="py-[2.5rem] px-[2rem] w-[10rem] text-center">{{ __('common.hit') }}</th>
                            </tr>
                        </thead>
                        {{-- 테이블 바디 --}}
                        <tbody class="text-[1.6rem]">
                            @if($notices->isEmpty())
                                <tr>
                                    {{-- 5. 데이터 없음 메시지 --}}
                                    <td colspan="5" class="py-[10rem] text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="xi-info-o text-[4rem] text-gray-300 mb-[1.5rem]"></i>
                                            <span class="text-[1.8rem]">{{ __('common.no_data') }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach($notices as $notice)
                                <tr class="border-b border-gray-100 hover:bg-blue-50/30 transition-colors cursor-pointer group" onclick="location.href='{{ route('pr.notice.show', $notice->id) }}'">
                                    
                                    <td class="py-[2.5rem] px-[2rem] text-center text-gray-500 font-medium">
                                        {{ $notice->id }}
                                    </td>
                                    
                                    <td class="py-[2.5rem] px-[2rem] text-left">
                                        {{-- 6. 말머리 (prefix) 배지 스타일 적용 --}}
                                        <span class="inline-block px-[1rem] py-[0.4rem] bg-blue-50 text-blue-600 text-[1.3rem] rounded-[0.5rem] font-bold mr-[1rem] group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                            {{ __('pr.notice_prefix') }}
                                        </span>
                                        <span class="text-gray-900 font-medium group-hover:text-blue-600 transition-colors">
                                            {{ $notice->title }}
                                        </span>
                                    </td>
                                    
                                    <td class="py-[2.5rem] px-[2rem] text-center">
                                        {{-- 첨부파일이 있을 경우와 없을 경우를 시각적으로 처리 (현재는 데이터가 없으므로 - 로 유지) --}}
                                        <span class="text-gray-300"><i class="xi-attachment hidden"></i> -</span>
                                    </td>
                                    
                                    <td class="py-[2.5rem] px-[2rem] text-center text-gray-500">
                                        {{ $notice->created_at->format('Y.m.d') }}
                                    </td>
                                    
                                    <td class="py-[2.5rem] px-[2rem] text-center text-gray-400">
                                        {{ number_format($notice->hit) }}
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 7. 페이지네이션 --}}
            <div class="mt-[6rem] flex justify-center">
                {{ $notices->links('pagination.foex') }}
            </div>

        </div>
    </div>

@endsection
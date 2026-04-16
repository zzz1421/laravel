@extends('layouts.foex')

{{-- 타이틀 --}}
@section('title', __('pr.qna_title'))

@section('content')

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        {{-- 고객지원/상담 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/pr/qna_hero.jpg') }}" alt="FOEx Q&A" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/helpdesk,support'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                Support Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('pr.qna_title') }}</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep max-w-[90rem] mx-auto">
                {{ __('pr.qna_desc') }}
            </p>
        </div>
    </section>

    {{-- [2] Q&A 리스트 영역 --}}
    <div class="py-[10rem] bg-white">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">

            {{-- 상단 컨트롤 바 (Total / 검색 / 문의하기) --}}
            <div class="flex flex-col lg:flex-row justify-between items-center mb-[4rem] gap-[2rem] pb-[3rem] border-b border-gray-100">
                
                {{-- 게시글 수 --}}
                <div class="text-[1.6rem] text-gray-600 font-medium w-full lg:w-auto text-center lg:text-left">
                    {{ __('common.total') }} <span class="text-blue-600 font-bold text-[1.8rem] mx-[0.5rem]">{{ $qnas->total() }}</span>{{ __('common.count') }} 
                    <span class="mx-[1rem] text-gray-300">|</span> 
                    {{ $qnas->currentPage() }} {{ __('common.page') }}
                </div>
                
                {{-- 검색창 및 문의하기 버튼 --}}
                <div class="flex flex-col md:flex-row items-center gap-[1.5rem] w-full lg:w-auto">
                    <form action="{{ route('pr.qna.index') }}" method="GET" class="flex w-full md:w-[35rem] shadow-sm rounded-[1rem] overflow-hidden border border-gray-200 focus-within:border-blue-500 transition-all">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="w-full px-[2rem] py-[1.2rem] text-[1.5rem] text-gray-700 focus:outline-none bg-gray-50 focus:bg-white transition-colors" 
                               placeholder="{{ __('common.search_placeholder') }}">
                        <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-[2rem] transition-colors">
                            <i class="xi-search text-[1.8rem]"></i>
                        </button>
                    </form>

                    {{-- 문의하기 버튼 (강조 스타일) --}}
                    <a href="{{ route('pr.qna.create') }}" class="w-full md:w-auto inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-[4rem] py-[1.3rem] text-[1.6rem] font-bold rounded-[1rem] transition-all shadow-lg shadow-blue-600/20 whitespace-nowrap">
                        <i class="xi-pen-o mr-[1rem]"></i> 문의하기
                    </a>
                </div>
            </div>

            {{-- 프리미엄 테이블 영역 --}}
            <div class="bg-white border border-gray-200 rounded-[2rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.02)] overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left min-w-[100rem]">
                        <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-[1.5rem] font-bold uppercase tracking-wider">
                            <tr>
                                <th class="py-[2.5rem] px-[2rem] w-[10rem] text-center">{{ __('common.no') }}</th>
                                <th class="py-[2.5rem] px-[2rem] text-center">{{ __('common.title') }}</th>
                                <th class="py-[2.5rem] px-[2rem] w-[15rem] text-center">{{ __('common.writer') }}</th>
                                <th class="py-[2.5rem] px-[2rem] w-[12rem] text-center">{{ __('common.status') }}</th>
                                <th class="py-[2.5rem] px-[2rem] w-[15rem] text-center">{{ __('common.date') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-[1.6rem] divide-y divide-gray-100">
                            @forelse($qnas as $item)
                            <tr class="hover:bg-blue-50/30 transition-colors cursor-pointer group" onclick="location.href='{{ route('pr.qna.show', $item->id) }}'">
                                {{-- 번호 --}}
                                <td class="py-[2.5rem] px-[2rem] text-center text-gray-400 font-medium">
                                    {{ $qnas->total() - ($qnas->currentPage() - 1) * $qnas->perPage() - $loop->index }}
                                </td>
                                
                                {{-- 제목 --}}
                                <td class="py-[2.5rem] px-[2rem] text-left">
                                    <div class="flex items-center gap-[1rem]">
                                        @if($item->category)
                                            <span class="inline-block px-[1rem] py-[0.3rem] bg-gray-100 text-gray-500 text-[1.3rem] rounded-[0.5rem] font-bold group-hover:bg-blue-100 group-hover:text-blue-600 transition-colors">
                                                {{ $item->category }}
                                            </span>
                                        @endif
                                        <span class="text-gray-900 font-medium group-hover:text-blue-600 transition-colors">
                                            {{ $item->title }}
                                        </span>
                                        @if($item->secret)
                                            <div class="w-[2.4rem] h-[2.4rem] bg-gray-50 rounded-full flex items-center justify-center">
                                                <i class="xi-lock text-gray-400 text-[1.4rem]"></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                {{-- 작성자 (마스킹 처리 권장) --}}
                                <td class="py-[2.5rem] px-[2rem] text-center text-gray-600 font-medium">
                                    {{ Str::mask($item->writer, '*', 1, 1) }}
                                </td>

                                {{-- 답변 상태 (배지 디자인 업그레이드) --}}
                                <td class="py-[2.5rem] px-[2rem] text-center">
                                    @if($item->status == 'answered')
                                        <span class="inline-flex items-center justify-center px-[1.5rem] py-[0.5rem] bg-blue-600 text-white text-[1.3rem] font-black rounded-full shadow-sm">
                                            <i class="xi-check-circle-o mr-1"></i> {{ __('common.answered') }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center justify-center px-[1.5rem] py-[0.5rem] bg-gray-100 text-gray-400 text-[1.3rem] font-bold rounded-full border border-gray-200">
                                            {{ __('common.waiting') }}
                                        </span>
                                    @endif
                                </td>

                                {{-- 날짜 --}}
                                <td class="py-[2.5rem] px-[2rem] text-center text-gray-400">
                                    {{ $item->created_at->format('Y.m.d') }}
                                </td>
                            </tr>
                            @empty
                            {{-- 데이터 없음 (Empty State) --}}
                            <tr>
                                <td colspan="5" class="py-[12rem] text-center text-gray-400">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-[8rem] h-[8rem] bg-gray-50 rounded-full flex items-center justify-center mb-[2rem]">
                                            <i class="xi-mail-read-o text-[4rem] text-gray-200"></i>
                                        </div>
                                        <p class="text-[1.8rem] font-medium">{{ __('common.no_data') }}</p>
                                        <a href="{{ route('pr.qna.create') }}" class="mt-[2.5rem] text-blue-600 font-bold hover:underline text-[1.6rem]">
                                            첫 번째 문의를 남겨보세요.
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 페이징 (프리미엄 대형 페이지네이션) --}}
            <div class="mt-[8rem] flex justify-center">
                {{ $qnas->appends(request()->input())->links('pagination.foex') }}
            </div>

        </div>
    </div>

@endsection
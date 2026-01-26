@extends('layouts.foex')

{{-- 타이틀 --}}
@section('title', __('pr.qna_title'))

@section('content')

    {{-- 상단 헤더 --}}
    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.qna_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.qna_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            {{-- 상단 툴바 (Total / 검색 / 글쓰기) --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4">
                
                {{-- 게시글 수 --}}
                <div class="text-sm text-gray-600 font-medium">
                    {{ __('common.total') }} <span class="text-amber-600 font-bold">{{ $qnas->total() }}</span>{{ __('common.count') }} 
                    / {{ $qnas->currentPage() }} {{ __('common.page') }}
                </div>
                
                {{-- 검색창 및 문의하기 버튼 --}}
                <div class="flex items-center gap-2 w-full md:w-auto">
                    <form action="{{ route('pr.qna.index') }}" method="GET" class="flex gap-0 flex-1 md:flex-none">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500" 
                               placeholder="{{ __('common.search_placeholder') }}">
                        <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                            <i class="xi-search"></i>
                        </button>
                    </form>

                    {{-- 문의하기 버튼 --}}
                    <a href="{{ route('pr.qna.create') }}" class="bg-gray-800 hover:bg-black text-white px-4 py-2 text-sm font-bold transition whitespace-nowrap">
                        문의하기
                    </a>
                </div>
            </div>

            {{-- 리스트 테이블 --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="bg-gray-50 border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            <th class="py-4 px-4 w-20 text-center">{{ __('common.no') }}</th>
                            <th class="py-4 px-4 text-center">{{ __('common.title') }}</th>
                            <th class="py-4 px-4 w-32 text-center">{{ __('common.writer') }}</th>
                            <th class="py-4 px-4 w-24 text-center">{{ __('common.status') }}</th>
                            <th class="py-4 px-4 w-32 text-center">{{ __('common.date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($qnas as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('pr.qna.show', $item->id) }}'">
                            {{-- 번호 --}}
                            <td class="py-4 px-4 text-center font-medium text-gray-500">
                                {{ $qnas->total() - ($qnas->currentPage() - 1) * $qnas->perPage() - $loop->index }}
                            </td>
                            
                            {{-- 제목 --}}
                            <td class="py-4 px-4 text-left">
                                @if($item->category)
                                    <span class="text-blue-600 font-medium mr-1">[{{ $item->category }}]</span>
                                @endif
                                <span class="text-gray-800 hover:underline">{{ $item->title }}</span>
                                @if($item->secret)
                                    <i class="xi-lock text-gray-400 ml-1"></i>
                                @endif
                            </td>

                            {{-- 작성자 --}}
                            <td class="py-4 px-4 text-center text-gray-600">{{ $item->writer }}</td>

                            {{-- 상태 --}}
                            <td class="py-4 px-4 text-center">
                                @if($item->status == 'answered')
                                    <span class="bg-blue-100 text-blue-600 border border-blue-200 px-2 py-1 rounded text-xs font-bold">{{ __('common.answered') }}</span>
                                @else
                                    <span class="bg-gray-100 text-gray-500 border border-gray-200 px-2 py-1 rounded text-xs font-bold">{{ __('common.waiting') }}</span>
                                @endif
                            </td>

                            {{-- 날짜 --}}
                            <td class="py-4 px-4 text-center text-gray-500">{{ $item->created_at->format('Y.m.d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center text-gray-500">{{ __('common.no_data') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- 페이징 --}}
            <div class="mt-12 flex justify-center">
                {{ $qnas->appends(request()->input())->links('pagination.foex') }}
            </div>

        </div>
    </div>

@endsection
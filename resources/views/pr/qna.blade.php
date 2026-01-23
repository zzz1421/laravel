@extends('layouts.foex')

{{-- 1. 타이틀 변수 적용 --}}
@section('title', __('pr.qna_title'))

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            {{-- 2. 페이지 타이틀 및 설명 --}}
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.qna_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.qna_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            {{-- 상단 검색 및 통계 --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4">
                <div class="text-sm text-gray-600 font-medium">
                    {{-- 3. 게시글 수 및 페이지 표시 --}}
                    {{ __('common.total') }} <span class="text-amber-600 font-bold">{{ $qnas->total() }}</span>{{ __('common.count') }} / {{ $qnas->currentPage() }} {{ __('common.page') }}
                </div>
                
                {{-- form action 수정 (qna 라우트로) --}}
                <form action="{{ route('pr.qna.index') }}" method="GET" class="flex gap-0 w-full md:w-auto">
                    {{-- 4. 검색어 플레이스홀더 --}}
                    <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500" placeholder="{{ __('common.search_placeholder') }}">
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            {{-- 테이블 리스트 --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            {{-- 5. 테이블 헤더 다국어 적용 --}}
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
                            <td class="py-4 px-4 text-center font-medium text-gray-500">
                                {{ $qnas->total() - ($qnas->currentPage() - 1) * $qnas->perPage() - $loop->index }}
                            </td>
                            <td class="py-4 px-4 text-left text-gray-800 hover:underline">
                                {{ $item->title }}
                                
                                {{-- 비밀글 아이콘 처리 (secret 컬럼이 있다고 가정) --}}
                                @if($item->secret)
                                    <i class="xi-lock text-gray-400 ml-1"></i>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">{{ $item->writer }}</td>
                            <td class="py-4 px-4 text-center">
                                {{-- 상태 뱃지 (status 컬럼 값에 따라 다국어 출력) --}}
                                @if($item->status == 'answered')
                                    <span class="bg-blue-500 text-white text-xs font-bold px-3 py-1.5 rounded-sm">{{ __('common.answered') }}</span>
                                @else
                                    <span class="bg-gray-400 text-white text-xs font-bold px-3 py-1.5 rounded-sm">{{ __('common.waiting') }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $item->created_at->format('Y.m.d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            {{-- 6. 데이터 없음 메시지 --}}
                            <td colspan="5" class="py-20 text-center text-gray-500">{{ __('common.no_data') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 relative">
                {{-- 문의하기(글쓰기) 버튼 --}}
                <div class="flex justify-end mb-8">
                    <a href="{{ route('pr.qna.create') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-sm shadow-sm transition flex items-center">
                        {{-- '문의하기'가 common에 없다면 '글쓰기' 사용 --}}
                        {{ __('common.inquiry') ?? __('common.write') }}
                    </a>
                </div>

                {{-- 페이징 --}}
                <div class="flex justify-center border-t border-gray-200 pt-8">
                    {{ $qnas->appends(request()->input())->links('pagination.foex') }}
                </div>
            </div>

        </div>
    </div>

@endsection
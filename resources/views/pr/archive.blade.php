@extends('layouts.foex')

{{-- 1. 타이틀 변수 적용 --}}
@section('title', __('pr.archive_title'))

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            {{-- 2. 페이지 타이틀 및 설명 --}}
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.archive_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.archive_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            {{-- 상단 검색 및 통계 --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4">
                <div class="text-sm text-gray-600 font-medium">
                    {{-- 3. 게시글 수 및 페이지 표시 --}}
                    {{ __('common.total') }} <span class="text-amber-600 font-bold">{{ $references->total() }}</span>{{ __('common.count') }} / {{ $references->currentPage() }} {{ __('common.page') }}
                </div>
                
                {{-- 검색 폼 (GET 방식) --}}
                <form action="{{ route('pr.archive.index') }}" method="GET" class="flex gap-0 w-full md:w-auto">
                    {{-- 4. 검색어 플레이스홀더 --}}
                    <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500" placeholder="{{ __('common.search_placeholder') }}">
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            {{-- 테이블 리스트 --}}
            <div class="border-t border-gray-300 overflow-x-auto"> 
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="bg-white border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            {{-- 5. 테이블 헤더 다국어 적용 --}}
                            <th class="py-4 px-4 w-20 text-center">{{ __('common.no') }}</th>
                            <th class="py-4 px-4 text-center">{{ __('common.title') }}</th>
                            <th class="py-4 px-4 w-24 text-center">{{ __('common.file') }}</th> 
                            <th class="py-4 px-4 w-32 text-center">{{ __('common.date') }}</th>
                            <th class="py-4 px-4 w-24 text-center">{{ __('common.hit') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($references as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('pr.archive.show', $item->id) }}'">
                            <td class="py-4 px-4 text-center font-medium text-gray-500">
                                {{ $references->total() - ($references->currentPage() - 1) * $references->perPage() - $loop->index }}
                            </td>
                            <td class="py-4 px-4 text-left">
                                <span class="text-gray-800 hover:text-blue-600 hover:underline transition">
                                    {{ $item->title }}
                                </span>
                                {{-- 새 글 아이콘 예시 (24시간 이내) --}}
                                @if($item->created_at->diffInHours(now()) < 24)
                                    <span class="inline-block w-4 h-4 bg-red-500 text-white text-[10px] text-center leading-4 rounded-full ml-1">N</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center text-gray-400">
                                {{-- 첨부파일 아이콘 (파일 존재 여부는 추후 로직에 따라 구현) --}}
                                <i class="xi-diskette text-lg"></i>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $item->created_at->format('Y.m.d') }}</td>
                            <td class="py-4 px-4 text-center text-gray-400">{{ number_format($item->hit) }}</td>
                        </tr>
                        @empty
                        <tr>
                            {{-- 6. 데이터 없음 메시지 --}}
                            <td colspan="5" class="py-32 text-center text-gray-500">
                                {{ __('common.no_data') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- 페이징 --}}
            <div class="mt-12 flex justify-center border-t border-gray-200 pt-8">
                {{ $references->appends(request()->input())->links('pagination.foex') }}
            </div>

        </div>
    </div>

@endsection
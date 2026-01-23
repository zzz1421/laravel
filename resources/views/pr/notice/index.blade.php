@extends('layouts.foex')

{{-- 1. 타이틀 변수 적용 --}}
@section('title', __('pr.notice_title'))

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.notice_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.notice_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div class="text-sm text-gray-600 font-medium">
                    {{-- 2. 전체 게시글 수 / 페이지 표시 --}}
                    {{ __('common.total') }} <span class="text-amber-600 font-bold">{{ $notices->total() }}</span>{{ __('common.count') }} / {{ $notices->currentPage() }} {{ __('common.page') }}
                </div>
                
                <form class="flex gap-0 w-full md:w-auto">
                    {{-- 3. 검색어 플레이스홀더 --}}
                    <input type="text" placeholder="{{ __('common.search_placeholder') }}" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="button" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            <div class="border-t-2 border-gray-800 overflow-x-auto">
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="bg-gray-50 border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            {{-- 4. 테이블 헤더 --}}
                            <th class="py-4 px-4 w-20 text-center">{{ __('common.no') }}</th>
                            <th class="py-4 px-4 text-center">{{ __('common.title') }}</th>
                            <th class="py-4 px-4 w-24 text-center">{{ __('common.file') }}</th>
                            <th class="py-4 px-4 w-32 text-center">{{ __('common.date') }}</th>
                            <th class="py-4 px-4 w-24 text-center">{{ __('common.hit') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($notices->isEmpty())
                            <tr>
                                {{-- 5. 데이터 없음 메시지 --}}
                                <td colspan="5" class="py-10 text-center text-gray-500">{{ __('common.no_data') }}</td>
                            </tr>
                        @else
                            @foreach($notices as $notice)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('pr.notice.show', $notice->id) }}'">
                                <td class="py-4 px-4 text-center font-medium">{{ $notice->id }}</td>
                                <td class="py-4 px-4 text-left">
                                    {{-- 6. 말머리 (prefix) --}}
                                    <span class="text-blue-600 font-medium mr-1">{{ __('pr.notice_prefix') }}</span>
                                    <span class="text-gray-800 hover:underline">{{ $notice->title }}</span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="text-gray-300">-</span>
                                </td>
                                <td class="py-4 px-4 text-center text-gray-500">
                                    {{ $notice->created_at->format('Y.m.d') }}
                                </td>
                                <td class="py-4 px-4 text-center text-gray-500">
                                    {{ number_format($notice->hit) }}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-12 flex justify-center">
                {{ $notices->links('pagination.foex') }}
            </div>

        </div>
    </div>

@endsection
@extends('layouts.foex')

@section('title', '자료실')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">자료실</h2>

        {{-- 검색창 --}}
        <div class="flex justify-end mb-6">
            <form action="{{ route('pr.archive.index') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="자료 검색" class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded text-sm hover:bg-gray-700">검색</button>
            </form>
        </div>

        {{-- 자료 목록 --}}
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <ul class="divide-y divide-gray-200">
                @forelse($archives as $item)
                    <li class="p-6 hover:bg-gray-50 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                {{-- 상세 페이지로 이동 링크 --}}
                                <a href="{{ route('pr.archive.show', $item->id) }}" class="text-lg font-bold text-gray-900 hover:text-blue-600 truncate block">
                                    {{ $item->title }}
                                </a>
                                <p class="text-sm text-gray-500 mt-1">
                                    등록일: {{ $item->created_at->format('Y-m-d') }} | 작성자: {{ $item->writer }} | 다운로드: {{ number_format($item->download_count) }}회
                                </p>
                            </div>
                            <div class="ml-4">
                                {{-- 바로 다운로드 버튼 --}}
                                @if($item->file_path)
                                    <a href="{{ route('pr.archive.download', $item->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                                        <i class="xi-download mr-2"></i> 다운로드
                                    </a>
                                @endif
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="p-10 text-center text-gray-500">
                        등록된 자료가 없습니다.
                    </li>
                @endforelse
            </ul>
        </div>

        <div class="mt-6">
            {{ $archives->links() }}
        </div>
    </div>
</div>
@endsection
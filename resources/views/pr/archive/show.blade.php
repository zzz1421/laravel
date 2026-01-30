@extends('layouts.foex')

@section('title', $archive->title)

@section('content')
<div class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 상단 헤더 --}}
        <div class="border-b border-gray-200 pb-6 mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">{{ $archive->title }}</h1>
            <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4">
                <span><i class="xi-user mr-1"></i> {{ $archive->writer }}</span>
                <span><i class="xi-time-o mr-1"></i> {{ $archive->created_at->format('Y-m-d') }}</span>
                <span><i class="xi-download mr-1"></i> 다운로드: {{ number_format($archive->download_count) }}회</span>
            </div>
        </div>

        {{-- 첨부파일 다운로드 박스 --}}
        @if($archive->file_path)
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-8 flex items-center justify-between">
                <div class="flex items-center overflow-hidden">
                    <div class="bg-white p-2 rounded border border-gray-200 mr-3 text-blue-600">
                        <i class="xi-file-o text-2xl"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ $archive->file_name }}</p>
                        <p class="text-xs text-gray-500">첨부파일을 다운로드 하세요.</p>
                    </div>
                </div>
                {{-- 다운로드 버튼 --}}
                <a href="{{ route('pr.archive.download', $archive->id) }}" class="ml-4 bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded font-medium transition flex items-center whitespace-nowrap">
                    <i class="xi-download mr-2"></i> 다운로드
                </a>
            </div>
        @endif

        {{-- 본문 내용 --}}
        <div class="prose max-w-none text-gray-800 mb-12 min-h-[200px]">
            @if($archive->content)
                {!! nl2br(e($archive->content)) !!}
            @else
                <p class="text-gray-400">내용이 없습니다.</p>
            @endif
        </div>

        {{-- 목록 버튼 --}}
        <div class="border-t border-gray-200 pt-8 text-center">
            <a href="{{ route('pr.archive.index') }}" class="inline-block bg-white border border-gray-300 text-gray-700 px-8 py-3 rounded hover:bg-gray-50 font-medium transition">
                목록으로
            </a>
        </div>

    </div>
</div>
@endsection
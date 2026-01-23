@extends('layouts.foex')

{{-- 브라우저 탭 제목 설정 --}}
@section('title', $notice->title)

@section('content')

    {{-- 상단 타이틀 영역 (디자인 통일) --}}
    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            {{-- 1. 타이틀 및 설명 다국어 적용 --}}
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.notice_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.notice_desc') }}</p>
        </div>
    </div>

    {{-- 본문 영역 --}}
    <div class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            
            <div class="bg-white p-0 md:p-8 rounded-lg">
                
                {{-- 게시글 헤더 --}}
                <div class="border-b border-gray-200 pb-6 mb-8">
                    {{-- 2. 뱃지 텍스트 ('공지') --}}
                    <span class="text-amber-600 font-bold text-sm mb-2 inline-block">{{ __('common.notice') }}</span>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">{{ $notice->title }}</h1>
                    
                    <div class="text-gray-500 text-sm mt-4 flex flex-wrap justify-between items-center gap-4">
                        <div class="flex items-center gap-4">
                            {{-- 3. 작성자 라벨 및 기본값 처리 --}}
                            <span>{{ __('common.writer') }}: {{ $notice->writer ?? __('common.admin') }}</span>
                            <span class="w-px h-3 bg-gray-300"></span>
                            <span>{{ $notice->created_at->format('Y.m.d') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="xi-eye-o text-lg"></i>
                            <span>{{ number_format($notice->hit) }}</span>
                        </div>
                    </div>
                </div>

                {{-- 게시글 본문 --}}
                {{-- CKEditor 등으로 작성된 HTML을 그대로 출력하기 위해 {!! !!} 사용 --}}
                <div class="content-body text-gray-800 leading-loose min-h-[300px]">
                    {!! $notice->content !!}
                </div>
                
                {{-- 첨부파일 영역 (추후 개발 시 주석 해제하여 사용) --}}
                {{-- 
                <div class="mt-10 p-4 bg-gray-50 rounded border border-gray-100">
                    <p class="font-bold text-sm text-gray-700 mb-2">{{ __('common.file') }}</p>
                    <a href="#" class="text-sm text-gray-600 hover:text-blue-600 flex items-center gap-1">
                        <i class="xi-download"></i> 파일명.pdf
                    </a>
                </div>
                --}}

                {{-- 하단 버튼 --}}
                <div class="mt-12 border-t border-gray-200 pt-8 flex justify-center">
                    {{-- 4. 목록으로 버튼 --}}
                    <a href="{{ route('pr.notice.index') }}" class="px-8 py-3 bg-gray-800 hover:bg-gray-700 text-white font-medium rounded transition">
                        {{ __('common.list') }}
                    </a>
                </div>

            </div>

        </div>
    </div>

    {{-- 본문 스타일 (필요시 추가) --}}
    <style>
        .content-body p { margin-bottom: 1.5em; }
        .content-body img { max-width: 100%; height: auto; border-radius: 4px; }
        .content-body ul { list-style-type: disc; margin-left: 1.5em; margin-bottom: 1.5em; }
        .content-body ol { list-style-type: decimal; margin-left: 1.5em; margin-bottom: 1.5em; }
    </style>

@endsection
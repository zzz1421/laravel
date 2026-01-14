@extends('layouts.foex')

{{-- 브라우저 탭 제목 설정 --}}
@section('title', $notice->title)

@section('content')

    {{-- 상단 타이틀 영역 (디자인 통일) --}}
    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">공지사항</h1>
            <p class="text-gray-600">포엑스의 주요 소식과 안내사항을 알려드립니다.</p>
        </div>
    </div>

    {{-- 본문 영역 --}}
    <div class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            
            <div class="bg-white p-0 md:p-8 rounded-lg">
                
                {{-- 게시글 헤더 --}}
                <div class="border-b border-gray-200 pb-6 mb-8">
                    <span class="text-amber-600 font-bold text-sm mb-2 inline-block">공지</span>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">{{ $notice->title }}</h1>
                    
                    <div class="text-gray-500 text-sm mt-4 flex flex-wrap justify-between items-center gap-4">
                        <div class="flex items-center gap-4">
                            <span>작성자: {{ $notice->writer ?? '관리자' }}</span>
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
                
                {{-- 첨부파일 영역 (파일이 있는 경우에만 표시하도록 추후 개발) --}}
                {{-- 
                <div class="mt-10 p-4 bg-gray-50 rounded border border-gray-100">
                    <p class="font-bold text-sm text-gray-700 mb-2">첨부파일</p>
                    <a href="#" class="text-sm text-gray-600 hover:text-blue-600 flex items-center gap-1">
                        <i class="xi-download"></i> 파일명.pdf
                    </a>
                </div>
                --}}

                {{-- 하단 버튼 --}}
                <div class="mt-12 border-t border-gray-200 pt-8 flex justify-center">
                    <a href="{{ route('pr.notice.index') }}" class="px-8 py-3 bg-gray-800 hover:bg-gray-700 text-white font-medium rounded transition">
                        목록으로
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
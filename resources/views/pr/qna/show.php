@extends('layouts.foex')

{{-- 타이틀 (게시글 제목) --}}
@section('title', $qna->title)

@section('content')

    {{-- 상단 헤더 (목록과 동일) --}}
    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.qna_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.qna_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">

            {{-- 질문 영역 --}}
            <div class="border-t-2 border-gray-900 border-b border-gray-200 mb-12">
                {{-- 글 정보 헤더 --}}
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">
                        <span class="text-amber-500 mr-2">[Q]</span>
                        {{-- 분류 --}}
                        @if($qna->category) 
                            <span class="text-gray-500 font-normal mr-1">[{{ $qna->category }}]</span>
                        @endif
                        {{ $qna->title }}
                    </h2>
                    <div class="flex gap-4 text-sm text-gray-500">
                        <span>{{ __('common.writer') }}: {{ $qna->writer }}</span>
                        <span class="w-px h-3 bg-gray-300 mt-1"></span>
                        <span>{{ __('common.date') }}: {{ $qna->created_at->format('Y.m.d') }}</span>
                        <span class="w-px h-3 bg-gray-300 mt-1"></span>
                        <span>{{ __('common.hit') }}: {{ number_format($qna->hit) }}</span>
                    </div>
                </div>

                {{-- 본문 내용 --}}
                <div class="p-8 min-h-[200px] text-gray-700 leading-relaxed whitespace-pre-wrap">
{{ $qna->content }}
                </div>
            </div>

            {{-- 답변 영역 (답변이 있을 경우에만 표시) --}}
            @if($qna->answer)
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-8 mb-12 relative overflow-hidden">
                <i class="xi-message text-9xl text-blue-100 absolute -top-4 -right-4"></i>

                <h3 class="text-lg font-bold text-blue-800 mb-4 flex items-center relative z-10">
                    <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded mr-2">Answer</span>
                    관리자 답변입니다.
                </h3>
                
                <div class="text-gray-700 leading-relaxed relative z-10 space-y-2 whitespace-pre-wrap">
{!! nl2br(e($qna->answer)) !!}
                </div>

                @if($qna->updated_at)
                <div class="mt-6 pt-6 border-t border-blue-200/50 text-sm text-blue-500 relative z-10">
                    답변일시: {{ $qna->updated_at->format('Y.m.d H:i') }}
                </div>
                @endif
            </div>
            @endif

            {{-- 하단 버튼 --}}
            <div class="flex justify-end items-center">
                <a href="{{ route('pr.qna.index') }}" class="bg-gray-900 text-white px-6 py-3 font-bold hover:bg-black transition rounded-sm">
                    목록으로
                </a>
            </div>

        </div>
    </div>

@endsection
@extends('layouts.admin')

@section('title', '공지사항 상세')
@section('header', '공지사항 상세')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-8 max-w-4xl mx-auto">
        
        {{-- 상단 정보 --}}
        <div class="border-b border-gray-200 pb-6 mb-6">
            <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $notice->is_display ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }} mb-2">
                {{ $notice->is_display ? '홈페이지 노출' : '숨김 상태' }}
            </span>
            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $notice->title }}</h1>
            <div class="flex items-center text-sm text-gray-500 gap-4">
                <span><i class="xi-user mr-1"></i> {{ $notice->writer }}</span>
                <span><i class="xi-time mr-1"></i> {{ $notice->created_at->format('Y-m-d H:i') }}</span>
                <span><i class="xi-eye mr-1"></i> {{ number_format($notice->hit) }}</span>
            </div>
        </div>

        {{-- 첨부파일 --}}
        @if($notice->file_path)
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-8 flex items-center justify-between">
                <div class="flex items-center gap-2 overflow-hidden">
                    <i class="xi-file-download-o text-xl text-blue-600"></i>
                    <span class="text-sm text-gray-700 truncate font-medium">{{ basename($notice->file_path) }}</span>
                </div>
                <a href="{{ asset('storage/'.$notice->file_path) }}" download class="text-sm bg-white border border-gray-300 px-3 py-1 rounded hover:bg-gray-100 transition whitespace-nowrap">
                    다운로드
                </a>
            </div>
        @endif

        {{-- 본문 내용 --}}
        <div class="min-h-[200px] prose max-w-none text-gray-800 leading-relaxed mb-10">
            {!! $notice->content !!}
        </div>

        <hr class="border-gray-200 mb-6">

        {{-- 하단 버튼 --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('admin.notice.index') }}" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-md hover:bg-gray-300 transition font-medium">
                목록으로
            </a>

            <div class="flex gap-2">
                <a href="{{ route('admin.notice.edit', $notice->id) }}" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                    수정
                </a>
                
                <form action="{{ route('admin.notice.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까? 복구할 수 없습니다.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-md hover:bg-red-600 transition font-medium">
                        삭제
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection
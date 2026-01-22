@extends('layouts.admin')

@section('title', '영상 상세')
@section('header', '영상 상세')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-8 max-w-4xl mx-auto">
    <div class="border-b border-gray-200 pb-6 mb-8">
        <div class="flex items-center gap-3 mb-3">
            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $video->is_display ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                {{ $video->is_display ? '홈페이지 노출' : '숨김 상태' }}
            </span>
            <span class="text-gray-400 text-sm">등록일: {{ $video->created_at->format('Y-m-d H:i') }}</span>
        </div>
        <h1 class="text-2xl font-bold text-gray-900 leading-tight">{{ $video->title }}</h1>
    </div>

    <div class="aspect-video bg-black rounded-lg overflow-hidden shadow-lg mb-8">
        @if($video->video_id)
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $video->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        @else
            <div class="flex items-center justify-center h-full text-white">
                <div class="text-center">
                    <i class="xi-warning text-4xl mb-2"></i><br>
                    영상 ID를 찾을 수 없습니다.
                </div>
            </div>
        @endif
    </div>

    <div class="bg-gray-50 rounded-lg p-4 mb-10 border border-gray-200 flex items-center justify-between">
        <div class="truncate text-gray-600 text-sm flex-1 mr-4">
            <span class="font-bold text-gray-800 mr-2">원본 링크:</span> {{ $video->video_url }}
        </div>
        <a href="{{ $video->video_url }}" target="_blank" class="text-blue-600 hover:underline text-sm flex-shrink-0">
            <i class="xi-external-link"></i> 유튜브에서 보기
        </a>
    </div>

    <div class="flex justify-between items-center pt-4 border-t">
        <a href="{{ route('admin.video.index') }}" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-200 font-medium">
            <i class="xi-arrow-left mr-1"></i> 목록
        </a>
        <div class="flex gap-2">
            <a href="{{ route('admin.video.edit', $video->id) }}" class="bg-amber-500 text-white px-5 py-2.5 rounded-lg hover:bg-amber-600 font-medium shadow-sm">
                <i class="xi-pen mr-1"></i> 수정
            </a>
            <form action="{{ route('admin.video.destroy', $video->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-5 py-2.5 rounded-lg hover:bg-red-600 font-medium shadow-sm">
                    <i class="xi-trash mr-1"></i> 삭제
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
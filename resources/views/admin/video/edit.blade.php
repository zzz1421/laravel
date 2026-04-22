@extends('layouts.admin')
@section('title', '영상 수정')
@section('header', '영상 수정')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
    <form action="{{ route('admin.video.update', $video->id) }}" method="POST" class="space-y-6">
        @csrf @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">영상 제목 <span class="text-red-500">*</span></label>
            <input type="text" name="title" required value="{{ old('title', $video->title) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">유튜브 링크 (URL) <span class="text-red-500">*</span></label>
            <input type="url" name="video_url" required value="{{ old('video_url', $video->video_url) }}" placeholder="https://www.youtube.com/watch?v=..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
            <p class="text-xs text-gray-400 mt-1">* 유튜브 주소창의 URL이나 '공유' 버튼의 링크를 복사해서 붙여넣으세요.</p>
        </div>

        <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
            <label class="block text-sm font-medium text-gray-700 mb-2">썸네일 미리보기</label>
            <div class="flex items-start gap-4">
                <img src="{{ $video->thumbnail_url }}" class="w-48 aspect-video object-cover rounded shadow border bg-black">
                <div class="text-xs text-gray-500 mt-2">
                    <p class="mb-1"><span class="font-bold text-gray-700">현재 ID:</span> {{ $video->video_id }}</p>
                    <p>썸네일은 입력하신 유튜브 링크에서 자동으로 가져옵니다.</p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-2 p-4 bg-gray-50 rounded-lg border border-gray-100">
            <input type="checkbox" name="is_display" id="is_display" value="1" {{ $video->is_display ? 'checked' : '' }} class="h-4 w-4 text-amber-600 rounded border-gray-300">
            <label for="is_display" class="text-sm font-medium text-gray-700 cursor-pointer">홈페이지에 노출합니다.</label>
        </div>

        <div class="flex justify-end gap-2 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.video.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-md hover:bg-gray-200 font-medium">취소</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-md hover:bg-blue-700 font-medium shadow-sm">수정 저장</button>
        </div>
    </form>
</div>
@endsection
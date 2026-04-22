@extends('layouts.admin')
@section('title', '영상 등록')
@section('header', '영상 등록')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
    <form action="{{ route('admin.video.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">영상 제목 <span class="text-red-500">*</span></label>
            <input type="text" name="title" required value="{{ old('title') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">유튜브 링크 (URL) <span class="text-red-500">*</span></label>
            <input type="url" name="video_url" required value="{{ old('video_url') }}" placeholder="https://www.youtube.com/watch?v=..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
            <p class="text-xs text-gray-400 mt-1">* 유튜브 주소창의 URL이나 '공유' 버튼의 링크를 복사해서 붙여넣으세요.</p>
        </div>

        <div class="flex items-center gap-2 p-4 bg-gray-50 rounded-lg border border-gray-100">
            <input type="checkbox" name="is_display" id="is_display" value="1" checked class="h-4 w-4 text-amber-600 rounded border-gray-300">
            <label for="is_display" class="text-sm font-medium text-gray-700 cursor-pointer">홈페이지에 노출합니다.</label>
        </div>

        <div class="flex justify-end gap-2 pt-6 border-t border-gray-100">
            <a href="{{ route('admin.video.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-md hover:bg-gray-200 font-medium">취소</a>
            <button type="submit" class="bg-amber-500 text-white px-6 py-2.5 rounded-md hover:bg-amber-600 font-medium shadow-sm">등록하기</button>
        </div>
    </form>
</div>
@endsection
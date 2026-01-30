@extends('layouts.admin')

@section('title', '자료 등록')
@section('header', '자료 등록')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.archives.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">제목 <span class="text-red-500">*</span></label>
            <input type="text" name="title" required class="w-full border-gray-300 rounded-md shadow-sm p-3 focus:ring-amber-500 focus:border-amber-500 border" placeholder="자료 제목을 입력하세요">
        </div>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">작성자</label>
                <input type="text" name="writer" value="관리자" class="w-full border-gray-300 rounded-md shadow-sm p-3 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">노출 여부</label>
                <select name="is_display" class="w-full border-gray-300 rounded-md shadow-sm p-3 border">
                    <option value="1">노출</option>
                    <option value="0">숨김</option>
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">파일 첨부</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                <input type="file" name="file" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 transition">
                <p class="text-xs text-gray-400 mt-2">PDF, HWP, ZIP, JPG 등 (최대 10MB)</p>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">내용 (선택)</label>
            <textarea name="content" rows="5" class="w-full border-gray-300 rounded-md shadow-sm p-3 border" placeholder="자료에 대한 간단한 설명을 입력하세요."></textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('admin.archives.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">취소</a>
            <button type="submit" class="px-6 py-2 bg-amber-500 text-white rounded hover:bg-amber-600 font-bold">등록하기</button>
        </div>
    </form>
</div>
@endsection
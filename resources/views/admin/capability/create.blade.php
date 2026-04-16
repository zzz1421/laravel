@extends('layouts.admin')
@section('title', '역량 등록')
@section('content')
<div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
    <form action="{{ route('admin.capability.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">분류 <span class="text-red-500">*</span></label>
            <select name="category" class="w-full border-gray-300 rounded-md">
                <option value="patent">특허/지식재산</option>
                <option value="certification">인증/자격</option>
                <option value="performance">주요실적</option>
                <option value="award">수상내역</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">제목(인증명) <span class="text-red-500">*</span></label>
            <input type="text" name="title" required class="w-full border-gray-300 rounded-md">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">발급기관</label>
                <input type="text" name="agency" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">취득일자</label>
                <input type="date" name="date" class="w-full border-gray-300 rounded-md">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">증빙 이미지</label>
            <input type="file" name="file_path" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-gray-100 hover:file:bg-gray-200">
        </div>

        <div class="flex justify-end gap-2 pt-4 border-t">
            <a href="{{ route('admin.capability.index') }}" class="bg-gray-200 px-4 py-2 rounded-md">취소</a>
            <button type="submit" class="bg-amber-500 text-white px-6 py-2 rounded-md hover:bg-amber-600">등록</button>
        </div>
    </form>
</div>
@endsection
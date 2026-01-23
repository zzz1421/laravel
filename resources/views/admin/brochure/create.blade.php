@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6">브로슈어 등록</h2>

                <form action="{{ route('admin.brochure.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-bold mb-2">제목</label>
                        <input type="text" name="title" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold mb-2">PDF 파일 (다운로드용)</label>
                            <input type="file" name="pdf_file" accept=".pdf" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-500 mt-1">PDF 파일만 업로드 가능 (최대 10MB)</p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold mb-2">표지 이미지 (미리보기용)</label>
                            <input type="file" name="image_file" accept="image/*" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-500 mt-1">JPG, PNG 등 이미지 파일</p>
                        </div>
                    </div>

                    <div class="border-t pt-6 flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">
                            등록하기
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
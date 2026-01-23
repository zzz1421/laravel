@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">브로슈어 수정</h2>
                    <a href="{{ route('admin.brochure.index') }}" class="text-gray-500 hover:text-gray-700">
                        &larr; 목록으로 돌아가기
                    </a>
                </div>

                <form action="{{ route('admin.brochure.update', $brochure->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT') <div>
                        <label class="block text-sm font-bold mb-2">제목</label>
                        <input type="text" name="title" value="{{ $brochure->title }}" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="grid grid-cols-2 gap-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-bold mb-2">PDF 파일</label>
                            
                            <div class="mb-3 text-sm text-gray-600">
                                현재 파일: <a href="{{ asset('storage/' . $brochure->pdf_path) }}" target="_blank" class="text-blue-600 underline">확인하기</a>
                            </div>
                            
                            <input type="file" name="pdf_file" accept=".pdf" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-red-500 mt-1">* 파일을 변경할 때만 업로드하세요.</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-bold mb-2">표지 이미지</label>
                            
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $brochure->image_path) }}" class="h-32 object-contain border bg-white">
                            </div>

                            <input type="file" name="image_file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-red-500 mt-1">* 이미지를 변경할 때만 업로드하세요.</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ $brochure->is_visible ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_visible" class="ml-2 block text-sm text-gray-900 font-bold">홈페이지에 공개하기</label>
                    </div>

                    <div class="border-t pt-6 flex justify-end gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">
                            수정 내용 저장
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
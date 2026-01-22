@extends('layouts.admin')

@section('title', '역량/실적 수정')
@section('header', '역량/실적 수정')

@section('content')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
        <form action="{{ route('admin.capability.update', $capability->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">분류 <span class="text-red-500">*</span></label>
                <select name="category" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ $capability->category == $key ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">제목 (프로젝트명/인증명) <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $capability->title) }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">발급기관 / 발주처 / 대상</label>
                    <input type="text" name="agency" value="{{ old('agency', $capability->agency) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">취득일 / 계약일</label>
                    <input type="date" name="date" value="{{ old('date', optional($capability->date)->format('Y-m-d')) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                <label class="block text-sm font-medium text-gray-700 mb-2">증빙 이미지 (이미지 교체 시에만 업로드)</label>
                
                @if($capability->file_path)
                    <div class="flex items-center gap-4 mb-3">
                        <img src="{{ asset('storage/'.$capability->file_path) }}" class="h-24 rounded border bg-white">
                        <div class="text-xs text-gray-500">
                            현재 등록된 파일<br>
                            <span class="text-gray-400">(새 파일을 업로드하면 자동 교체됩니다)</span>
                        </div>
                    </div>
                @endif

                <input type="file" name="file_path" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-white border hover:file:bg-gray-50"/>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">상세 내용 (MOU 협약 내용 등)</label>
                <textarea name="description" id="summernote">{{ old('description', $capability->description) }}</textarea>
            </div>

            <div class="flex justify-end gap-2 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.capability.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-md hover:bg-gray-200 font-medium transition">취소</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-md hover:bg-blue-700 font-medium transition shadow-sm">수정 저장</button>
            </div>
        </form>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: '상세 내용을 입력하세요.',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
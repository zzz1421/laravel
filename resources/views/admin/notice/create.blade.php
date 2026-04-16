@extends('layouts.admin')

@section('title', '공지사항 등록')
@section('header', '공지사항 등록')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
        
        <form action="{{ route('admin.notice.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- 제목 --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">제목 <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" required value="{{ old('title') }}"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 px-4 py-2 border"
                       placeholder="제목을 입력하세요">
            </div>

            {{-- 작성자 --}}
            <div class="w-1/3">
                <label for="writer" class="block text-sm font-medium text-gray-700 mb-1">작성자</label>
                <input type="text" name="writer" id="writer" required value="포엑스"
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-amber-500 focus:border-amber-500 px-4 py-2 border">
            </div>

            {{-- 옵션 (노출 여부) --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_display" id="is_display" value="1" checked
                       class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 rounded">
                <label for="is_display" class="text-sm text-gray-700">홈페이지에 노출합니다.</label>
            </div>

            {{-- 내용 --}}
            {{-- 기존 textarea 코드 --}}
            <textarea name="content" id="summernote">{{ old('content', $notice->content ?? '') }}</textarea>

            {{-- 하단 스크립트 추가 --}}
            <script>
                $('#summernote').summernote({
                    placeholder: '내용을 입력해주세요.',
                    tabsize: 2,
                    height: 400, // 에디터 높이
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

            {{-- 첨부파일 --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">첨부파일</label>
                <input type="file" name="file" class="block w-full text-sm text-gray-500
                  file:mr-4 file:py-2 file:px-4
                  file:rounded-md file:border-0
                  file:text-sm file:font-semibold
                  file:bg-gray-50 file:text-gray-700
                  hover:file:bg-gray-100
                "/>
            </div>

            <hr class="border-gray-200">

            {{-- 버튼 --}}
            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.notice.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">취소</a>
                <button type="submit" class="bg-amber-500 text-white px-6 py-2 rounded-md hover:bg-amber-600 transition font-medium">등록하기</button>
            </div>

        </form>

    </div>

@endsection
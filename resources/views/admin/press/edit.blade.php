@extends('layouts.admin')

@section('title', '보도자료 수정')
@section('header', '보도자료 수정')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
        <form action="{{ route('admin.press.update', $press->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">제목 <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title', $press->title) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">외부 기사 링크 (URL)</label>
                    <input type="url" name="link_url" value="{{ old('link_url', $press->link_url) }}" placeholder="https://" class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                </div>

                @if($press->thumbnail)
                    <div class="mb-6 p-4 bg-gray-50 border rounded-lg flex items-center gap-4">
                        {{-- 현재 썸네일 미리보기 --}}
                        <div>
                            <p class="text-xs text-gray-500 mb-1">현재 썸네일</p>
                            <img src="{{ $press->thumbnail }}" referrerpolicy="no-referrer" class="h-20 w-32 object-cover rounded border border-gray-300">
                        </div>

                        {{-- 삭제 체크박스 --}}
                        <div class="flex items-center h-full pt-4">
                            <input id="delete_thumbnail" type="checkbox" name="delete_thumbnail" value="1" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                            <label for="delete_thumbnail" class="ml-2 block text-sm font-bold text-red-600 cursor-pointer select-none">
                                썸네일 삭제하기 (체크 후 저장 시 아이콘으로 대체됨)
                            </label>
                        </div>
                    </div>
                @endif
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">작성자</label>
                    <input type="text" name="writer" value="{{ old('writer', $press->writer) }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                </div>
            </div>

            <div class="flex items-center gap-2 p-4 bg-gray-50 rounded-lg border border-gray-100">
                <input type="checkbox" name="is_display" id="is_display" value="1" {{ $press->is_display ? 'checked' : '' }} class="h-4 w-4 text-amber-600 rounded border-gray-300 focus:ring-amber-500">
                <label for="is_display" class="text-sm font-medium text-gray-700 cursor-pointer">홈페이지에 노출합니다.</label>
            </div>

            <div class="flex justify-end gap-2 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.press.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-md hover:bg-gray-200 font-medium transition">취소</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-md hover:bg-blue-700 font-medium transition shadow-sm">수정 저장</button>
            </div>
        </form>
    </div>

@endsection
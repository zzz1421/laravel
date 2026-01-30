@extends('layouts.admin')

@section('header', '교육 과정 수정')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    
    {{-- ★ 1. action을 update로 변경하고, 뒤에 ID를 붙여줍니다. --}}
    <form action="{{ route('admin.education.update', $education->id) }}" method="POST">
        @csrf
        {{-- ★ 2. 수정(Update) 요청임을 명시합니다. --}}
        @method('PUT')

        {{-- 1. 기본 정보 --}}
        <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">기본 정보 수정</h3>
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">교육 과정명 <span class="text-red-500">*</span></label>
                {{-- ★ 3. value 속성에 기존 데이터를 넣어줍니다. --}}
                <input type="text" name="title" value="{{ $education->title }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">상태</label>
                    <select name="status" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                        {{-- ★ 기존 값과 일치하면 selected 속성 추가 --}}
                        <option value="waiting" {{ $education->status == 'waiting' ? 'selected' : '' }}>대기 (오픈 전)</option>
                        <option value="recruiting" {{ $education->status == 'recruiting' ? 'selected' : '' }}>모집중</option>
                        <option value="closed" {{ $education->status == 'closed' ? 'selected' : '' }}>마감</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">교육 장소</label>
                    <input type="text" name="place" value="{{ $education->place }}" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">모집 정원 (명) <span class="text-red-500">*</span></label>
                    <input type="number" name="capacity" value="{{ $education->capacity }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">교육비 (원)</label>
                    <input type="number" name="price" value="{{ $education->price }}" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                </div>
            </div>
        </div>

        {{-- 2. 일정 정보 --}}
        <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4 mt-8">일정 설정 수정</h3>
        <div class="grid grid-cols-2 gap-6 mb-6">
            {{-- 날짜 필드는 format('Y-m-d')를 해주는 게 안전합니다 --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">접수 시작일</label>
                <input type="date" name="register_start" value="{{ $education->register_start ? $education->register_start->format('Y-m-d') : '' }}" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">접수 마감일</label>
                <input type="date" name="register_end" value="{{ $education->register_end ? $education->register_end->format('Y-m-d') : '' }}" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">교육 시작일 <span class="text-red-500">*</span></label>
                <input type="date" name="edu_start" value="{{ $education->edu_start ? $education->edu_start->format('Y-m-d') : '' }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">교육 종료일 <span class="text-red-500">*</span></label>
                <input type="date" name="edu_end" value="{{ $education->edu_end ? $education->edu_end->format('Y-m-d') : '' }}" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
        </div>

        {{-- 3. 상세 내용 --}}
        <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4 mt-8">상세 내용 수정</h3>
        <div class="mb-6">
            {{-- textarea는 value 속성이 없습니다. 태그 사이에 값을 넣어야 합니다. --}}
            <textarea name="content" rows="10" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">{{ $education->content }}</textarea>
            <p class="text-sm text-gray-500 mt-1">※ HTML 태그 사용이 가능합니다.</p>
        </div>

        <div class="flex justify-end pt-4 border-t">
            {{-- 취소 누르면 상세 페이지로 돌아가기 --}}
            <a href="{{ route('admin.education.show', $education->id) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300">취소</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-bold">수정 사항 저장</button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin')

@section('header', '교육 과정 개설')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
    
    <form action="{{ route('admin.education.store') }}" method="POST">
        @csrf

        {{-- 1. 기본 정보 --}}
        <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">기본 정보</h3>
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">교육 과정명 <span class="text-red-500">*</span></label>
                <input type="text" name="title" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border" placeholder="예: 2024년 스마트팩토리 전문가 과정">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">상태</label>
                    <select name="status" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
                        <option value="waiting">대기 (오픈 전)</option>
                        <option value="recruiting" selected>모집중</option>
                        <option value="closed">마감</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">교육 장소</label>
                    <input type="text" name="place" class="w-full border-gray-300 rounded-md shadow-sm p-2 border" placeholder="예: 본사 3층 대회의실">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">모집 정원 (명) <span class="text-red-500">*</span></label>
                    <input type="number" name="capacity" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border" placeholder="30">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">교육비 (원)</label>
                    <input type="number" name="price" class="w-full border-gray-300 rounded-md shadow-sm p-2 border" placeholder="0 (무료일 경우 0)">
                </div>
            </div>
        </div>

        {{-- 2. 일정 정보 --}}
        <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4 mt-8">일정 설정</h3>
        <div class="grid grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">접수 시작일</label>
                <input type="date" name="register_start" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">접수 마감일</label>
                <input type="date" name="register_end" class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">교육 시작일 <span class="text-red-500">*</span></label>
                <input type="date" name="edu_start" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">교육 종료일 <span class="text-red-500">*</span></label>
                <input type="date" name="edu_end" required class="w-full border-gray-300 rounded-md shadow-sm p-2 border">
            </div>
        </div>

        {{-- 3. 상세 내용 --}}
        <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4 mt-8">상세 내용</h3>
        <div class="mb-6">
            <textarea name="content" rows="10" class="w-full border-gray-300 rounded-md shadow-sm p-2 border" placeholder="교육 커리큘럼 및 상세 내용을 입력하세요."></textarea>
            <p class="text-sm text-gray-500 mt-1">※ HTML 태그 사용이 가능합니다.</p>
        </div>

        <div class="flex justify-end pt-4 border-t">
            <a href="{{ route('admin.education.applications') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300">취소</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-bold">교육 개설하기</button>
        </div>
    </form>
</div>
@endsection
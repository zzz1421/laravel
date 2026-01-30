@extends('layouts.admin')

@section('header', '회원 정보 수정')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
    <h3 class="text-lg font-bold text-gray-700 border-b pb-2 mb-4">회원 정보 수정</h3>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">이름</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">이메일</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">연락처</label>
                <input type="text" name="phone" value="{{ $user->phone }}" class="w-full border p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">회원 레벨 (1:일반, 7:관리자)</label>
                <select name="level" class="w-full border p-2 rounded bg-gray-50">
                    <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>Level 1 (일반 회원)</option>
                    <option value="7" {{ $user->level == 7 ? 'selected' : '' }}>Level 7 (중간 관리자)</option>
                    <option value="10" {{ $user->level == 10 ? 'selected' : '' }}>Level 10 (최고 관리자)</option>
                </select>
                <p class="text-xs text-gray-500 mt-1">※ 레벨 7 이상부터 관리자 페이지 접근 권한이 생길 수 있습니다.</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">비밀번호 변경 (선택사항)</label>
                <input type="password" name="password" class="w-full border p-2 rounded" placeholder="변경할 때만 입력하세요">
            </div>
        </div>

        <div class="flex justify-end mt-6 gap-2">
            <a href="{{ route('admin.users.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">취소</a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">정보 수정</button>
        </div>
    </form>
</div>
@endsection
@extends('layouts.admin')

@section('header', '회원 관리')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 검색 및 헤더 --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">가입 회원 목록 <span class="text-base text-gray-500 font-normal">({{ $users->total() }}명)</span></h2>
            
            <form method="GET" class="flex gap-2">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="이름, 이메일 검색" class="border border-gray-300 rounded px-3 py-2 w-64 text-sm">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-black text-sm">검색</button>
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">{{ session('error') }}</div>
        @endif

        {{-- 테이블 --}}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">이름/이메일</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">연락처</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">등급(Level)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">가입일</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">관리</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->id }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-900">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->phone ?? '-' }}</td>
                            <td class="px-6 py-4">
                                @if($user->level >= 7)
                                    <span class="px-2 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">관리자 ({{ $user->level }})</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800">일반회원 ({{ $user->level }})</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 text-center text-sm font-medium flex justify-center gap-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 px-2 py-1 rounded">수정</a>
                                
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까? 복구할 수 없습니다.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-2 py-1 rounded">강제탈퇴</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-10 text-gray-500">회원이 없습니다.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.education.index') }}" class="bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 px-3 py-2 rounded-md shadow-sm transition">
                    <i class="xi-arrow-left"></i> 목록으로
                </a>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">신청자 관리</h2>
                    <p class="text-sm text-blue-600 font-bold mt-1">현재 과정: {{ $currentEducation->title }}</p>
                </div>
            </div>
        </div>

        {{-- 알림 메시지 --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
                {{-- 검색 필터 (필요시 기능 확장) --}}
                <form method="GET" class="mb-6 flex gap-2">
                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="이름 또는 회사명 검색" class="border border-gray-300 rounded px-3 py-2 w-64">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-black">검색</button>
                </form>

                {{-- 테이블 --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">상태</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">교육과정</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">신청자</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">소속/연락처</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">신청일</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">관리</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($applications as $app)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($app->status == 'approved')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">승인완료</span>
                                        @elseif($app->status == 'rejected')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">반려됨</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">승인대기</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $app->education->title ?? '삭제된 과정' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $app->applicant_name }}</div>
                                        <div class="text-sm text-gray-500">{{ $app->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $app->company_name ?? '-' }}</div>
                                        <div class="text-sm text-gray-500">{{ $app->phone }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $app->created_at->format('Y-m-d H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if($app->status == 'waiting')
                                            <div class="flex gap-2">
                                                {{-- 승인 버튼 --}}
                                                <form action="{{ route('admin.education.approve', $app->id) }}" method="POST" onsubmit="return confirm('정말 승인하시겠습니까?');">
                                                    @csrf
                                                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-xs">승인</button>
                                                </form>

                                                {{-- 반려 버튼 --}}
                                                <form action="{{ route('admin.education.reject', $app->id) }}" method="POST" onsubmit="return confirm('정말 반려하시겠습니까?');">
                                                    @csrf
                                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-xs">반려</button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-xs">처리완료</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                        신청 내역이 없습니다.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
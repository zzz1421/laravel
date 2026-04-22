@extends('layouts.admin')

@section('header', '교육 과정 관리')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">개설된 교육 과정 목록</h2>
            {{-- 교육 개설 버튼 --}}
            <a href="{{ route('admin.education.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition flex items-center">
                <i class="xi-plus-circle mr-2"></i> 교육 과정 개설
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">상태</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">교육 과정명</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">교육 기간</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">신청 현황</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">관리</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($educations as $edu)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($edu->status == 'recruiting')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">모집중</span>
                                @elseif($edu->status == 'waiting')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">대기</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">마감</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.education.show', $edu->id) }}" class="text-sm font-bold text-gray-900 mb-1 hover:text-blue-600 hover:underline cursor-pointer block">
                                    {{ $edu->title }}
                                </a>
                                <div class="text-xs text-gray-500">{{ $edu->place }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $edu->edu_start }} ~ {{ $edu->edu_end }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="text-lg font-bold text-blue-600">{{ $edu->applications_count }}</span>
                                <span class="text-gray-400 text-xs"> / {{ $edu->capacity }}명</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                {{-- ★ 핵심: 이 버튼을 누르면 해당 교육의 신청자 관리 페이지로 이동 --}}
                                <a href="{{ route('admin.education.applications', $edu->id) }}" class="text-white bg-green-600 hover:bg-green-700 px-3 py-1.5 rounded text-xs inline-flex items-center">
                                    <i class="xi-users mr-1"></i> 신청자 관리
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                개설된 교육 과정이 없습니다.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $educations->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
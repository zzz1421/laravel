@extends('layouts.admin')

@section('header', '교육 과정 상세')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- 상단 헤더: 제목 및 관리 버튼 --}}
    <div class="bg-white shadow-sm rounded-t-xl p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <div class="flex items-center gap-2 mb-2">
                {{-- 상태 뱃지 --}}
                @if($education->status == 'recruiting')
                    <span class="px-2 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-800">모집중</span>
                @elseif($education->status == 'waiting')
                    <span class="px-2 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800">대기</span>
                @else
                    <span class="px-2 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">마감</span>
                @endif
                <span class="text-sm text-gray-500">{{ $education->created_at->format('Y-m-d') }} 등록</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">{{ $education->title }}</h2>
        </div>

        {{-- ★ 관리 버튼 (수정/삭제/목록) --}}
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.education.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 font-medium transition text-sm">
                목록으로
            </a>
            <a href="{{ route('admin.education.edit', $education->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium transition text-sm flex items-center">
                <i class="xi-pen mr-1"></i> 수정
            </a>
            <form action="{{ route('admin.education.destroy', $education->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 font-medium transition text-sm flex items-center">
                    <i class="xi-trash mr-1"></i> 삭제
                </button>
            </form>
        </div>
    </div>

    {{-- 상세 정보 그리드 --}}
    <div class="bg-white shadow-sm p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 border-b border-gray-100">
        
        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-xs text-gray-500 mb-1 uppercase font-bold">교육 기간</p>
            <p class="text-gray-900 font-medium">
                {{ $education->edu_start }} ~ {{ $education->edu_end }}
            </p>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-xs text-gray-500 mb-1 uppercase font-bold">교육 장소</p>
            <p class="text-gray-900 font-medium">
                <i class="xi-marker-map text-gray-400 mr-1"></i>
                {{ $education->place ?? '미정' }}
            </p>
        </div>

        <div class="bg-gray-50 p-4 rounded-lg">
            <p class="text-xs text-gray-500 mb-1 uppercase font-bold">모집 정원</p>
            <p class="text-gray-900 font-medium">
                {{ number_format($education->capacity) }}명
                <span class="text-xs text-gray-500 font-normal ml-1">
                    (신청: {{ $education->applications_count }}명)
                </span>
            </p>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 mb-1 uppercase font-bold">신청자 관리</p>
                <p class="text-xs text-gray-600">신청 내역 확인 및 승인</p>
            </div>
            <a href="{{ route('admin.education.applications', $education->id) }}" class="text-green-600 hover:text-green-800 bg-green-100 hover:bg-green-200 p-2 rounded-full transition">
                <i class="xi-users text-xl"></i>
            </a>
        </div>
    </div>

    {{-- 본문 내용 (에디터 내용 출력) --}}
    <div class="bg-white shadow-sm rounded-b-xl p-8 min-h-[400px]">
        <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">교육 상세 내용</h3>
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {{-- HTML 태그를 그대로 출력하기 위해 {!! !!} 사용 --}}
            {!! $education->content !!}
        </div>
    </div>

</div>
@endsection
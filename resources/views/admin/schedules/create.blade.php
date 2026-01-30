@extends('layouts.admin')

@section('title', '일정 등록')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-xl font-bold text-gray-800">새 일정 등록</h2>
        <a href="{{ route('admin.schedules.index') }}" class="text-gray-500 hover:text-gray-700">
            <i class="xi-close text-xl"></i>
        </a>
    </div>

    <form action="{{ route('admin.schedules.store') }}" method="POST">
        @csrf
        
        {{-- 제목 --}}
        <div class="mb-5">
            <label class="block text-gray-700 text-sm font-bold mb-2">일정 제목 <span class="text-red-500">*</span></label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required placeholder="예: 2026 CES 참가">
        </div>

        {{-- 기간 --}}
        <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">시작일 <span class="text-red-500">*</span></label>
                <input type="date" name="start" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">종료일 (선택)</label>
                <input type="date" name="end" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                <p class="text-xs text-gray-400 mt-1">* 당일 일정인 경우 비워두셔도 됩니다.</p>
            </div>
        </div>

        {{-- 색상 선택 (프론트엔드 범례와 일치) --}}
        <div class="mb-5">
            <label class="block text-gray-700 text-sm font-bold mb-2">일정 유형 (색상) <span class="text-red-500">*</span></label>
            <div class="flex flex-wrap gap-3">
                @php
                    $colors = [
                        // 1. IECEx: 노란색 (#ffbb00)으로 변경
                        ['code' => '#ffbb00', 'name' => 'IECEx', 'label' => 'I'], 
                        ['code' => '#A855F7', 'name' => '방폭', 'label' => 'P'],
                        // 2. 모터: 기존 파란색 (#3B82F6)으로 변경
                        ['code' => '#3B82F6', 'name' => '모터', 'label' => 'M'], 
                        ['code' => '#EF4444', 'name' => '수소', 'label' => 'H'],
                        ['code' => '#06B6D4', 'name' => 'SIL', 'label' => 'S'],
                        // 3. 공지: 기존 초록색 (#22C55E)으로 변경
                        ['code' => '#22C55E', 'name' => '공지', 'label' => 'N'], 
                        ['code' => '#9D174D', 'name' => '기타', 'label' => 'E'],
                        ['code' => '#000000', 'name' => '블랙', 'label' => 'B'],
                    ];
                @endphp

                @foreach($colors as $color)
                <label class="cursor-pointer">
                    <input type="radio" name="color" value="{{ $color['code'] }}" class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                    <div class="flex flex-col items-center gap-1 p-2 rounded-lg border border-gray-200 peer-checked:ring-2 peer-checked:ring-offset-1 peer-checked:ring-gray-500 hover:bg-gray-50 transition">
                        <span class="w-8 h-8 rounded flex items-center justify-center text-white text-xs font-bold shadow-sm" style="background-color: {{ $color['code'] }}">
                            {{ $color['label'] }}
                        </span>
                        <span class="text-[10px] text-gray-500">{{ $color['name'] }}</span>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        {{-- 공개 여부 --}}
        <div class="mb-8">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="is_display" value="1" checked class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <span class="ml-2 text-gray-700 text-sm font-bold">홈페이지에 게시하기</span>
            </label>
        </div>

        {{-- 버튼 --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('admin.schedules.index') }}" class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition">취소</a>
            <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium shadow-md transition">일정 등록</button>
        </div>
    </form>
</div>
@endsection
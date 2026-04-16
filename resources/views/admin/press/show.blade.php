@extends('layouts.admin')

@section('title', '보도자료 상세')
@section('header', '보도자료 상세')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-8 max-w-4xl mx-auto">
        
        <div class="border-b border-gray-200 pb-6 mb-8">
            <div class="flex items-center gap-3 mb-3">
                <span class="inline-block px-3 py-1 text-xs font-bold rounded-full {{ $press->is_display ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                    {{ $press->is_display ? '공개중' : '비공개' }}
                </span>
                <span class="text-gray-400 text-sm">
                     등록일: {{ $press->created_at->format('Y-m-d H:i') }}
                </span>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 leading-tight">{{ $press->title }}</h1>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 mb-10 border border-gray-200">
            <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-2">연결된 외부 기사 링크</h3>
            @if($press->link_url)
                <div class="flex items-center justify-between">
                    <a href="{{ $press->link_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium text-lg truncate flex-1 hover:underline">
                        {{ $press->link_url }}
                    </a>
                    <a href="{{ $press->link_url }}" target="_blank" class="ml-4 flex-shrink-0 bg-white border border-gray-300 text-gray-700 px-3 py-1 rounded text-sm hover:bg-gray-50 transition">
                        <i class="xi-external-link mr-1"></i> 새창으로 확인
                    </a>
                </div>
            @else
                <span class="text-gray-400">등록된 링크가 없습니다.</span>
            @endif
        </div>

        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
            <a href="{{ route('admin.press.index') }}" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-200 font-medium transition">
                <i class="xi-arrow-left mr-1"></i> 목록으로
            </a>
            <div class="flex gap-2">
                <a href="{{ route('admin.press.edit', $press->id) }}" class="bg-amber-500 text-white px-5 py-2.5 rounded-lg hover:bg-amber-600 font-medium transition shadow-sm">
                    <i class="xi-pen mr-1"></i> 수정
                </a>
                <form action="{{ route('admin.press.destroy', $press->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-5 py-2.5 rounded-lg hover:bg-red-600 font-medium transition shadow-sm">
                        <i class="xi-trash mr-1"></i> 삭제
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
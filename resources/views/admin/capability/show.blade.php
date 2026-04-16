@extends('layouts.admin')

@section('title', '역량/실적 상세')
@section('header', '역량/실적 상세')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-8 max-w-4xl mx-auto">
        
        <div class="border-b border-gray-200 pb-6 mb-8">
            <div class="flex items-center gap-3 mb-3">
                <span class="px-3 py-1 rounded-full text-xs font-bold 
                    @if($capability->category == 'patent') bg-blue-100 text-blue-800 
                    @elseif($capability->category == 'certification') bg-green-100 text-green-800
                    @elseif($capability->category == 'mou') bg-purple-100 text-purple-800
                    @else bg-gray-100 text-gray-800 @endif">
                    {{ $categories[$capability->category] ?? $capability->category }}
                </span>
                
                <span class="text-gray-400 text-sm">
                     등록일: {{ $capability->created_at->format('Y-m-d') }}
                </span>
            </div>
            
            <h1 class="text-3xl font-bold text-gray-900 leading-tight mb-2">{{ $capability->title }}</h1>
            
            <div class="flex flex-col sm:flex-row gap-4 text-sm text-gray-600 mt-4">
                @if($capability->agency)
                    <div class="flex items-center"><i class="xi-building mr-2 text-gray-400"></i> <span class="font-medium">기관/대상:</span> &nbsp;{{ $capability->agency }}</div>
                @endif
                @if($capability->date)
                    <div class="flex items-center"><i class="xi-calendar mr-2 text-gray-400"></i> <span class="font-medium">취득/계약일:</span> &nbsp;{{ $capability->date->format('Y-m-d') }}</div>
                @endif
            </div>
        </div>

        @if($capability->file_path)
            <div class="mb-10 bg-gray-50 p-4 rounded-lg border border-gray-200 text-center">
                <label class="block text-left text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">증빙 이미지</label>
                <img src="{{ asset('storage/'.$capability->file_path) }}" class="max-h-[500px] max-w-full inline-block rounded shadow-sm">
            </div>
        @endif

        @if($capability->description)
            <div class="prose max-w-none text-gray-800 leading-relaxed mb-10 pb-10 border-b border-gray-100">
                <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">상세 내용</h3>
                {!! $capability->description !!}
            </div>
        @endif

        <div class="flex justify-between items-center">
            <a href="{{ route('admin.capability.index') }}" class="bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg hover:bg-gray-200 font-medium transition">
                <i class="xi-arrow-left mr-1"></i> 목록으로
            </a>
            <div class="flex gap-2">
                <a href="{{ route('admin.capability.edit', $capability->id) }}" class="bg-amber-500 text-white px-5 py-2.5 rounded-lg hover:bg-amber-600 font-medium transition shadow-sm">
                    <i class="xi-pen mr-1"></i> 수정
                </a>
                <form action="{{ route('admin.capability.destroy', $capability->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-5 py-2.5 rounded-lg hover:bg-red-600 font-medium transition shadow-sm">
                        <i class="xi-trash mr-1"></i> 삭제
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
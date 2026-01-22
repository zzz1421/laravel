@extends('layouts.admin')

@section('title', '홍보영상 관리')
@section('header', '홍보영상 관리')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <span class="text-gray-600 font-medium">Total: <strong class="text-amber-600">{{ $videos->total() }}</strong></span>
        
        <div class="flex gap-2 w-full md:w-auto">
            <form action="{{ route('admin.video.index') }}" method="GET" class="flex gap-2 w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="영상 제목 검색" class="border border-gray-300 px-3 py-2 rounded-md text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700"><i class="xi-search"></i></button>
            </form>
            <a href="{{ route('admin.video.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded-md hover:bg-amber-600 flex items-center whitespace-nowrap">
                <i class="xi-plus mr-1"></i> 등록
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($videos as $video)
        <div class="border rounded-lg overflow-hidden hover:shadow-lg transition cursor-pointer group bg-white" onclick="location.href='{{ route('admin.video.show', $video->id) }}'">
            <div class="relative aspect-video bg-black">
                <img src="{{ $video->thumbnail_url }}" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition">
                <div class="absolute inset-0 flex items-center justify-center">
                    <i class="xi-play-circle-o text-5xl text-white opacity-80 group-hover:opacity-100 group-hover:scale-110 transition"></i>
                </div>
            </div>
            
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <span class="px-2 py-0.5 rounded text-[10px] font-bold {{ $video->is_display ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                        {{ $video->is_display ? '노출중' : '숨김' }}
                    </span>
                    <span class="text-xs text-gray-400">{{ $video->created_at->format('Y-m-d') }}</span>
                </div>
                <h3 class="font-bold text-gray-800 truncate mb-1 group-hover:text-amber-600">{{ $video->title }}</h3>
                <p class="text-xs text-gray-400 truncate">{{ $video->video_url }}</p>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-20 text-gray-400 bg-gray-50 rounded-lg border border-dashed">
            등록된 홍보영상이 없습니다.
        </div>
        @endforelse
    </div>

    <div class="mt-8 flex justify-center">
        {{ $videos->appends(request()->input())->links('pagination.foex') }}
    </div>
</div>
@endsection
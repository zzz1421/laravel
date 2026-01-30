@extends('layouts.admin')

@section('title', '대시보드')
@section('header', '관리자 대시보드')

@section('content')

    {{-- 1. 상단 통계 카드 그리드 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        {{-- 공지사항 (클릭 시 이동) --}}
        <a href="{{ route('admin.notice.index') }}" class="group bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 flex items-center justify-between hover:shadow-md transition transform hover:-translate-y-1">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">공지사항</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['notice']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-xl group-hover:bg-blue-500 group-hover:text-white transition">
                {{-- 아이콘 변경: xi-notice -> xi-volume-up --}}
                <i class="xi-bell"></i>
            </div>
        </a>

        {{-- 보도자료 --}}
        <a href="{{ route('admin.press.index') }}" class="group bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 flex items-center justify-between hover:shadow-md transition transform hover:-translate-y-1">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">보도자료</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['press']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-xl group-hover:bg-green-500 group-hover:text-white transition">
                <i class="xi-document"></i>
            </div>
        </a>

        {{-- 자료실 --}}
        <a href="{{ route('admin.archives.index') }}" class="group bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 flex items-center justify-between hover:shadow-md transition transform hover:-translate-y-1">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">자료실</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['archive']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-full flex items-center justify-center text-xl group-hover:bg-purple-500 group-hover:text-white transition">
                <i class="xi-library-books-o"></i>
            </div>
        </a>

        {{-- 보유 역량 --}}
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-amber-500 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">보유 역량</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['capability']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center text-xl">
                <i class="xi-trophy"></i>
            </div>
        </div>
    </div>

    {{-- 2. 바로가기 버튼 (Quick Actions) --}}
    <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
        <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Quick Actions</h4>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.notice.create') }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                <i class="xi-pen mr-2"></i> 공지사항 작성
            </a>
            <a href="{{ route('admin.press.create') }}" class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-medium">
                <i class="xi-pen mr-2"></i> 보도자료 등록
            </a>
            <a href="{{ route('admin.archives.create') }}" class="flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition text-sm font-medium">
                <i class="xi-upload mr-2"></i> 자료 등록
            </a>
        </div>
    </div>

    {{-- 3. 하단 상세 영역 (최신글 & 미디어) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        {{-- 최신 공지사항 (2칸 차지) --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-gray-800"><i class="xi-volume-up mr-2 text-blue-500"></i>최신 공지사항</h3>
                <a href="{{ route('admin.notice.index') }}" class="text-xs text-blue-600 hover:underline">더보기</a>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($recentNotices as $notice)
                    <div class="px-6 py-3 flex justify-between items-center hover:bg-gray-50 transition">
                        <a href="{{ route('admin.notice.edit', $notice->id) }}" class="text-sm text-gray-700 truncate hover:text-blue-600 flex-1 pr-4">
                            {{ $notice->title }}
                            @if(!$notice->is_display) <span class="text-xs text-red-500 bg-red-50 px-1 rounded ml-2">비공개</span> @endif
                        </a>
                        <span class="text-xs text-gray-400 whitespace-nowrap">{{ $notice->created_at->format('Y.m.d') }}</span>
                    </div>
                @empty
                    <div class="p-6 text-center text-sm text-gray-400">등록된 게시글이 없습니다.</div>
                @endforelse
            </div>
        </div>

        {{-- 미디어 및 기타 현황 (1칸 차지) --}}
        <div class="flex flex-col gap-6">
            
            {{-- 최신 보도자료 (간략형) --}}
            <div class="bg-white rounded-xl shadow-sm overflow-hidden flex-1">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="font-bold text-gray-800"><i class="xi-document mr-2 text-green-500"></i>최신 보도자료</h3>
                    <a href="{{ route('admin.press.index') }}" class="text-xs text-green-600 hover:underline">더보기</a>
                </div>
                <ul class="divide-y divide-gray-100">
                    @forelse($recentPress as $press)
                        <li class="px-6 py-3 hover:bg-gray-50 transition">
                            <a href="{{ route('admin.press.edit', $press->id) }}" class="block">
                                <span class="block text-sm text-gray-700 truncate mb-1">{{ $press->title }}</span>
                                <div class="flex items-center text-xs text-gray-400">
                                    <span class="mr-2">{{ $press->writer }}</span>
                                    <span>{{ $press->post_date ? $press->post_date->format('Y.m.d') : $press->created_at->format('Y.m.d') }}</span>
                                </div>
                            </a>
                        </li>
                    @empty
                         <li class="p-6 text-center text-sm text-gray-400">데이터가 없습니다.</li>
                    @endforelse
                </ul>
            </div>

            {{-- 미디어 카운트 --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h4 class="text-sm font-bold text-gray-500 uppercase mb-4">Media Assets</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-lg p-3 text-center border border-gray-100">
                        <span class="block text-gray-500 text-xs mb-1">Video</span>
                        <strong class="text-xl text-gray-900">{{ number_format($counts['video']) }}</strong>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 text-center border border-gray-100">
                        <span class="block text-gray-500 text-xs mb-1">Brochure</span>
                        <strong class="text-xl text-gray-900">{{ number_format($counts['brochure']) }}</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
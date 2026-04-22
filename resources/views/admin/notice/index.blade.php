@extends('layouts.admin')

@section('title', '공지사항 관리')
@section('header', '공지사항 관리')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6">
        
        {{-- 상단 툴바 --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-medium">Total: <strong class="text-amber-600">{{ number_format($notices->total()) }}</strong></span>
            </div>
            
            <div class="flex gap-2 w-full md:w-auto">
                <form action="{{ route('admin.notice.index') }}" method="GET" class="flex gap-2 w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="제목 검색" class="border border-gray-300 px-3 py-2 rounded-md text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition"><i class="xi-search"></i></button>
                </form>
                {{-- 등록 버튼 --}}
                <a href="{{ route('admin.notice.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded-md hover:bg-amber-600 transition flex items-center whitespace-nowrap">
                    <i class="xi-pen mr-1"></i> 등록
                </a>
            </div>
        </div>

        {{-- 리스트 테이블 --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600 border-collapse">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 w-16 text-center">No</th>
                        <th class="px-6 py-3">제목</th>
                        <th class="px-6 py-3 w-32 text-center">작성자</th>
                        <th class="px-6 py-3 w-24 text-center">상태</th>
                        <th class="px-6 py-3 w-32 text-center">작성일</th>
                        <th class="px-6 py-3 w-32 text-center">관리</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notices as $item)
                    <tr class="bg-white border-b hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-center text-gray-400">
                            {{ $notices->total() - ($notices->currentPage() - 1) * $notices->perPage() - $loop->index }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{-- 제목 클릭 시 상세 페이지로 이동 --}}
                            <a href="{{ route('admin.notice.show', $item->id) }}" class="text-gray-900 hover:text-amber-600 hover:underline transition block w-full">
                                {{ $item->title }}
                                @if($item->file_path)
                                    <i class="xi-attachment text-gray-400 ml-1" title="첨부파일 있음"></i>
                                @endif
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center">{{ $item->writer }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($item->is_display)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    노출
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    숨김
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center text-gray-500">{{ $item->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-center flex justify-center gap-3">
                            {{-- 수정 버튼 --}}
                            <a href="{{ route('admin.notice.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900" title="수정">
                                <i class="xi-pen-o text-lg"></i>
                            </a>
                            
                            {{-- 삭제 버튼 --}}
                            <form action="{{ route('admin.notice.destroy', $item->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="삭제">
                                    <i class="xi-trash-o text-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {{-- ★ 데이터가 없을 때 디자인 강화 ★ --}}
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-gray-400">
                                    <i class="xi-bell-o text-3xl"></i> {{-- 공지사항 아이콘 --}}
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">등록된 공지사항이 없습니다</h3>
                                <p class="text-gray-500 mt-1 mb-4">중요한 소식을 등록하여 사용자들에게 알려주세요.</p>
                                <a href="{{ route('admin.notice.create') }}" class="text-amber-600 hover:text-amber-700 font-medium text-sm flex items-center hover:underline">
                                    <i class="xi-plus-circle mr-1"></i> 공지사항 등록하기
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 페이지네이션 (데이터가 있을 때만 표시) --}}
        @if($notices->hasPages())
            <div class="mt-6 flex justify-center">
                 {{ $notices->appends(request()->input())->links('pagination.foex') }}
            </div>
        @endif

    </div>

@endsection
@extends('layouts.admin')

@section('title', '공지사항 관리')
@section('header', '공지사항 관리')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6">
        
        {{-- 상단 툴바 --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-medium">Total: <strong class="text-amber-600">{{ $notices->total() }}</strong></span>
            </div>
            
            <div class="flex gap-2 w-full md:w-auto">
                <form action="{{ route('admin.notice.index') }}" method="GET" class="flex gap-2 w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="제목 검색" class="border border-gray-300 px-3 py-2 rounded-md text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition"><i class="xi-search"></i></button>
                </form>
                <a href="{{ route('admin.notice.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded-md hover:bg-amber-600 transition flex items-center whitespace-nowrap">
                    <i class="xi-pen mr-1"></i> 등록
                </a>
            </div>
        </div>

        {{-- 리스트 테이블 --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
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
                        <td class="px-6 py-4 text-center">
                            {{ $notices->total() - ($notices->currentPage() - 1) * $notices->perPage() - $loop->index }}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{-- ★ 제목 클릭 시 상세 페이지로 이동 --}}
                            <a href="{{ route('admin.notice.show', $item->id) }}" class="text-gray-900 hover:text-amber-600 hover:underline transition block w-full">
                                {{ $item->title }}
                                @if($item->file_path)
                                    <i class="xi-attachment text-gray-400 ml-1"></i>
                                @endif
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center">{{ $item->writer }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($item->is_display)
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">노출</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">숨김</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">{{ $item->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-center flex justify-center gap-2">
                            {{-- 관리 버튼에서도 상세/수정 이동 가능 --}}
                            <a href="{{ route('admin.notice.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900" title="수정">
                                <i class="xi-pen-o text-lg"></i>
                            </a>
                            
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
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-400">등록된 게시물이 없습니다.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- 페이지네이션 --}}
        <div class="mt-6 flex justify-center">
             {{ $notices->appends(request()->input())->links('pagination.foex') }}
        </div>

    </div>

@endsection
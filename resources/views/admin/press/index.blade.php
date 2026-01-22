@extends('layouts.admin')

@section('title', '보도자료 관리')
@section('header', '보도자료 관리')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <span class="text-gray-600 font-medium">Total: <strong class="text-amber-600">{{ $presses->total() }}</strong></span>
            
            <div class="flex gap-2 w-full md:w-auto">
                <form action="{{ route('admin.press.index') }}" method="GET" class="flex gap-2 w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="제목 검색" class="border border-gray-300 px-3 py-2 rounded-md text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition"><i class="xi-search"></i></button>
                </form>
                <a href="{{ route('admin.press.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded-md hover:bg-amber-600 transition flex items-center whitespace-nowrap">
                    <i class="xi-pen mr-1"></i> 등록
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 w-16 text-center">No</th>
                        <th class="px-6 py-3">제목</th>
                        <th class="px-6 py-3 w-24 text-center">상태</th>
                        <th class="px-6 py-3 w-32 text-center">작성일</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($presses as $item)
                    <tr class="bg-white border-b hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('admin.press.show', $item->id) }}'">
                        <td class="px-6 py-4 text-center">
                            {{ $presses->total() - ($presses->currentPage() - 1) * $presses->perPage() - $loop->index }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 hover:text-amber-600 hover:underline">
                            {{ $item->title }}
                            @if($item->link_url)
                                <i class="xi-external-link text-gray-400 ml-1" title="외부링크 있음"></i>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->is_display)
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">노출</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">숨김</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">{{ $item->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">등록된 보도자료가 없습니다.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
             {{ $presses->appends(request()->input())->links('pagination.foex') }}
        </div>
    </div>
@endsection
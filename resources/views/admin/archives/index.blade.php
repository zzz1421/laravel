@extends('layouts.admin')

@section('title', '자료실 관리')
@section('header', '자료실 관리')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <span class="text-gray-600">Total: <strong class="text-amber-600">{{ number_format($archives->total()) }}</strong></span>
        <a href="{{ route('admin.archives.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded hover:bg-amber-600 transition flex items-center">
            <i class="xi-upload mr-2"></i> 자료 등록
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600 border-collapse">
            <thead class="bg-gray-50 text-gray-700 border-b">
                <tr>
                    <th class="px-6 py-3 text-center w-16">No</th>
                    <th class="px-6 py-3">제목</th>
                    <th class="px-6 py-3 w-40 text-center">첨부파일</th>
                    <th class="px-6 py-3 w-24 text-center">다운로드</th>
                    <th class="px-6 py-3 w-32 text-center">등록일</th>
                    <th class="px-6 py-3 w-32 text-center">관리</th>
                </tr>
            </thead>
            <tbody>
                @forelse($archives as $item)
                <tr class="hover:bg-gray-50 border-b transition">
                    <td class="px-6 py-4 text-center text-gray-400">
                        {{ $archives->total() - ($archives->currentPage() - 1) * $archives->perPage() - $loop->index }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $item->title }}
                        @if(!$item->is_display)
                            <span class="ml-2 text-xs bg-gray-200 text-gray-600 px-2 py-0.5 rounded">숨김</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-gray-500 text-xs">
                        @if($item->file_name)
                            <div class="flex items-center justify-center gap-1" title="{{ $item->file_name }}">
                                <i class="xi-file-o text-lg"></i>
                                <span class="truncate w-24">{{ $item->file_name }}</span>
                            </div>
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center text-gray-500">{{ number_format($item->download_count) }}</td>
                    <td class="px-6 py-4 text-center">{{ $item->created_at->format('Y-m-d') }}</td>
                    <td class="px-6 py-4 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.archives.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800"><i class="xi-pen-o text-lg"></i></a>
                        <form action="{{ route('admin.archives.destroy', $item->id) }}" method="POST" onsubmit="return confirm('파일도 함께 삭제됩니다. 삭제하시겠습니까?');">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:text-red-800"><i class="xi-trash-o text-lg"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                        <i class="xi-folder-open-o text-3xl mb-2 block"></i>
                        등록된 자료가 없습니다.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-center">
        {{ $archives->links() }}
    </div>
</div>
@endsection
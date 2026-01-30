@extends('layouts.admin')

@section('title', '일정 관리')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-xl font-bold text-gray-800">📅 일정 관리</h2>
        <a href="{{ route('admin.schedules.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
            <i class="xi-plus mr-2"></i> 일정 등록
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500 text-sm uppercase">
                    <th class="py-3 px-4 w-16 text-center">상태</th>
                    <th class="py-3 px-4">색상</th>
                    <th class="py-3 px-4">제목</th>
                    <th class="py-3 px-4">기간</th>
                    <th class="py-3 px-4 text-center">관리</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($schedules as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 text-center">
                        @if($item->is_display)
                            <span class="inline-block w-2 h-2 rounded-full bg-green-500" title="공개"></span>
                        @else
                            <span class="inline-block w-2 h-2 rounded-full bg-gray-300" title="비공개"></span>
                        @endif
                    </td>
                    <td class="py-3 px-4">
                        <div class="w-6 h-6 rounded border border-gray-200 shadow-sm" style="background-color: {{ $item->color }};"></div>
                    </td>
                    <td class="py-3 px-4 font-medium text-gray-800">
                        {{ $item->title }}
                    </td>
                    <td class="py-3 px-4 text-sm text-gray-600">
                        {{ $item->start->format('Y.m.d') }}
                        @if($item->end && $item->start != $item->end)
                            ~ {{ $item->end->format('Y.m.d') }}
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        <a href="{{ route('admin.schedules.edit', $item->id) }}" class="inline-block text-gray-500 hover:text-blue-600 mr-2 transition">
                            <i class="xi-pen"></i>
                        </a>
                        <form action="{{ route('admin.schedules.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-600 transition">
                                <i class="xi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-gray-400">등록된 일정이 없습니다.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $schedules->links() }}
    </div>
</div>
@endsection
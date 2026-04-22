@extends('layouts.admin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">브로슈어 관리</h2>
            <a href="{{ route('admin.brochure.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + 신규 등록
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 w-16">ID</th>
                            <th class="px-6 py-3 w-32">미리보기</th>
                            <th class="px-6 py-3">제목 / 파일경로</th>
                            <th class="px-6 py-3 w-24">공개여부</th>
                            <th class="px-6 py-3 w-32">등록일</th>
                            <th class="px-6 py-3 w-40 text-center">관리</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brochures as $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $item->image_path) }}" class="h-16 w-12 object-cover rounded border border-gray-200">
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 mb-1">{{ $item->title }}</div>
                                <a href="{{ asset('storage/' . $item->pdf_path) }}" target="_blank" class="text-blue-600 hover:underline text-xs">
                                    <i class="xi-download"></i> PDF 다운로드 확인
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @if($item->is_visible)
                                    <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">공개</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">비공개</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.brochure.edit', $item->id) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1.5 rounded text-xs transition">
                                        수정
                                    </a>
                                    
                                    <form action="{{ route('admin.brochure.destroy', $item->id) }}" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded text-xs transition">
                                            삭제
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                등록된 데이터가 없습니다.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($brochures->hasPages())
                <div class="p-4 border-t">
                    {{ $brochures->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
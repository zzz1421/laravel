@extends('layouts.admin')

@section('title', '역량/실적 관리')
@section('header', '역량/실적 관리')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div class="flex gap-2">
            <span class="text-gray-600 font-medium self-center">Total: <strong class="text-amber-600">{{ $items->total() }}</strong></span>
        </div>
        
        <div class="flex gap-2 w-full md:w-auto">
            <form action="{{ route('admin.capability.index') }}" method="GET" class="flex gap-2 w-full">
                <select name="category" class="border border-gray-300 rounded-md text-sm py-2 focus:border-amber-500" onchange="this.form.submit()">
                    <option value="">전체 분류</option>
                    @foreach($categories as $key => $val)
                        <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>{{ $val }}</option>
                    @endforeach
                </select>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="제목 검색" class="border border-gray-300 px-3 py-2 rounded-md text-sm w-full md:w-48 focus:outline-none focus:border-amber-500">
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700"><i class="xi-search"></i></button>
            </form>
            <a href="{{ route('admin.capability.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded-md hover:bg-amber-600 flex items-center whitespace-nowrap">
                <i class="xi-plus mr-1"></i> 등록
            </a>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-3 w-16 text-center">No</th>
                    <th class="px-6 py-3 w-24 text-center">이미지</th>
                    <th class="px-6 py-3 w-32 text-center">분류</th>
                    <th class="px-6 py-3">제목 / 발급기관</th>
                    <th class="px-6 py-3 w-32 text-center">날짜</th>
                    <th class="px-6 py-3 w-20 text-center">관리</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                <tr class="bg-white border-b hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('admin.capability.show', $item->id) }}'">
                    <td class="px-6 py-4 text-center">
                        {{ $items->total() - ($items->currentPage() - 1) * $items->perPage() - $loop->index }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($item->file_path)
                            @php
                                // 파일 확장자 추출 (소문자로 변환)
                                $extension = strtolower(pathinfo($item->file_path, PATHINFO_EXTENSION));
                            @endphp

                            @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                <img src="{{ asset('storage/'.$item->file_path) }}" class="w-12 h-12 object-cover rounded border mx-auto cursor-pointer" onclick="event.stopPropagation(); window.open(this.src)">
                            
                            @elseif($extension === 'pdf')
                                <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" onclick="event.stopPropagation()" class="w-12 h-12 bg-red-50 rounded border mx-auto flex flex-col items-center justify-center text-red-500 hover:bg-red-100 transition">
                                    <i class="xi-file-pdf text-2xl"></i>
                                    <span class="text-[9px] font-bold mt-1">PDF</span>
                                </a>
                                
                            @else
                                <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" onclick="event.stopPropagation()" class="w-12 h-12 bg-gray-50 rounded border mx-auto flex flex-col items-center justify-center text-gray-400 hover:bg-gray-100 transition">
                                    <i class="xi-file-text text-2xl"></i>
                                    <span class="text-[9px] font-bold mt-1">{{ strtoupper($extension) }}</span>
                                </a>
                            @endif
                        @else
                            <div class="w-12 h-12 bg-gray-50 rounded border mx-auto flex items-center justify-center text-gray-300"><i class="xi-image-o"></i></div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-2 py-1 rounded text-xs font-semibold 
                            @if($item->category == 'patent') bg-blue-100 text-blue-800 
                            @elseif($item->category == 'certification') bg-green-100 text-green-800
                            @elseif($item->category == 'mou') bg-purple-100 text-purple-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ $categories[$item->category] ?? $item->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900 hover:text-amber-600 hover:underline transition">
                            {{ $item->title }}
                        </div>
                        @if($item->agency)
                            <div class="text-xs text-gray-400 mt-1">{{ $item->agency }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $item->date ? date('Y-m-d', strtotime($item->date)) : '-' }}
                    </td>
                    <td class="px-6 py-4 text-center flex justify-center gap-2" onclick="event.stopPropagation()">
                        <a href="{{ route('admin.capability.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900"><i class="xi-pen"></i></a>
                        <form action="{{ route('admin.capability.destroy', $item->id) }}" method="POST" onsubmit="return confirm('삭제하시겠습니까?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900"><i class="xi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">데이터가 없습니다.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6 flex justify-center">{{ $items->appends(request()->input())->links('pagination.foex') }}</div>
</div>
@endsection
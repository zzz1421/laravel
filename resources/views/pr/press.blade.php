@extends('layouts.foex')

@section('title', '보도자료')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">보도자료</h1>
            <p class="text-gray-600">언론에 소개된 포엑스의 소식과 관련 기사를 모았습니다.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            {{-- 상단 검색 및 통계 --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4"> 
                <div class="text-sm text-gray-600 font-medium">
                    Total <span class="text-amber-600 font-bold">{{ $pressReleases->total() }}</span> / {{ $pressReleases->currentPage() }} page
                </div>
                
                <form action="{{ route('pr.press') }}" method="GET" class="flex gap-0 w-full md:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500" placeholder="검색어를 입력하세요">
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            {{-- 테이블 리스트 --}}
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            <th class="py-4 px-4 w-20 text-center">NO</th>
                            <th class="py-4 px-4 text-center">제목</th>
                            <th class="py-4 px-4 w-24 text-center">첨부파일</th>
                            <th class="py-4 px-4 w-32 text-center">작성자</th> 
                            <th class="py-4 px-4 w-32 text-center">날짜</th>
                            <th class="py-4 px-4 w-24 text-center">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pressReleases as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer group" 
                            onclick="window.open('{{ $item->link_url }}', '_blank')">
                            <td class="py-4 px-4 text-center font-medium text-gray-500">
                                {{ $pressReleases->total() - ($pressReleases->currentPage() - 1) * $pressReleases->perPage() - $loop->index }}
                            </td>
                            <td class="py-4 px-4 text-left">
                                <span class="text-gray-800 font-medium group-hover:text-blue-600 transition">
                                    {{ $item->title }}
                                </span>
                                @if($item->link_url)
                                <i class="xi-external-link text-gray-400 ml-1 text-xs group-hover:text-blue-400"></i>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center text-gray-400">
                                -
                            </td>
                            <td class="py-4 px-4 text-center text-gray-600">{{ $item->writer }}</td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $item->post_date->format('Y.m.d') }}</td>
                            <td class="py-4 px-4 text-center text-gray-400">{{ number_format($item->hit) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-20 text-center text-gray-400">등록된 보도자료가 없습니다.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- ★★★ 페이징 (여기가 핵심입니다) ★★★ --}}
            <div class="mt-12 flex justify-center">
                {{-- 커스텀 뷰 지정: pagination.foex --}}
                {{ $pressReleases->appends(request()->input())->links('pagination.foex') }}
            </div>

        </div>
    </div>
@endsection
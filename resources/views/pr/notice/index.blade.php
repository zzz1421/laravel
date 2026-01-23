@extends('layouts.foex')

@section('title', '공지사항')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.notice_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.notice_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div class="text-sm text-gray-600 font-medium">
                    {{-- 전체 게시글 수 표시 --}}
                    전체 <span class="text-amber-600 font-bold">{{ $notices->total() }}</span> 건 / 현재 {{ $notices->currentPage() }} 페이지
                </div>
                
                <form class="flex gap-0 w-full md:w-auto">
                    <input type="text" placeholder="검색어를 입력하세요" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="button" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            <div class="border-t-2 border-gray-800 overflow-x-auto">
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="bg-gray-50 border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            <th class="py-4 px-4 w-20 text-center">NO</th>
                            <th class="py-4 px-4 text-center">제목</th>
                            <th class="py-4 px-4 w-24 text-center">첨부파일</th>
                            <th class="py-4 px-4 w-32 text-center">날짜</th>
                            <th class="py-4 px-4 w-24 text-center">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- 데이터가 없을 경우 처리 --}}
                        @if($notices->isEmpty())
                            <tr>
                                <td colspan="5" class="py-10 text-center text-gray-500">등록된 공지사항이 없습니다.</td>
                            </tr>
                        @else
                            {{-- 컨트롤러에서 넘겨받은 $notices 변수 사용 --}}
                            @foreach($notices as $notice)
                            <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('pr.notice.show', $notice->id) }}'">
                                <td class="py-4 px-4 text-center font-medium">{{ $notice->id }}</td>
                                <td class="py-4 px-4 text-left">
                                    <span class="text-blue-600 font-medium mr-1">[공지사항]</span>
                                    {{-- 제목 출력 --}}
                                    <span class="text-gray-800 hover:underline">{{ $notice->title }}</span>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    {{-- 파일 여부는 일단 비워둠 (추후 구현 시 if문 추가) --}}
                                    <span class="text-gray-300">-</span>
                                </td>
                                <td class="py-4 px-4 text-center text-gray-500">
                                    {{-- 날짜 포맷 변경 --}}
                                    {{ $notice->created_at->format('Y.m.d') }}
                                </td>
                                <td class="py-4 px-4 text-center text-gray-500">
                                    {{-- 조회수 숫자 포맷 --}}
                                    {{ number_format($notice->hit) }}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-12 flex justify-center">
                {{-- 라라벨 기본 페이지네이션 링크 출력 --}}
                {{ $notices->links('pagination.foex') }}
            </div>

        </div>
    </div>

@endsection
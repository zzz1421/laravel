@extends('layouts.foex')

@section('title', 'Q&A')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Q&A</h1>
            <p class="text-gray-600">궁금한 점을 남겨주시면 친절하게 답변해 드립니다.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4">
                <div class="text-sm text-gray-600 font-medium">
                    전체 <span class="text-amber-600 font-bold">3</span> 건 / 현재 1 페이지
                </div>
                
                <form class="flex gap-0 w-full md:w-auto">
                    <input type="text" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="button" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            <th class="py-4 px-4 w-20 text-center">NO</th>
                            <th class="py-4 px-4 text-center">제목</th>
                            <th class="py-4 px-4 w-32 text-center">작성자명</th>
                            <th class="py-4 px-4 w-24 text-center">상태</th>
                            <th class="py-4 px-4 w-32 text-center">등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $qna_list = [
                                [
                                    'no' => 3, 
                                    'title' => '[IECEx CoPC] 방폭컨설팅 견적 문의 건.', 
                                    'writer' => '손**', 
                                    'status' => '답변완료', 
                                    'date' => '2023.09.22'
                                ],
                                [
                                    'no' => 2, 
                                    'title' => '[IECEx CoPC] IECEx CoPC Unit Ex 001 교육 계획 문의 드립니다', 
                                    'writer' => '정**', 
                                    'status' => '답변완료', 
                                    'date' => '2023.05.30'
                                ],
                                [
                                    'no' => 1, 
                                    'title' => '[IECEx CoPC] 교육비 결재는 어떤방식으로 해야하나요?', 
                                    'writer' => '유**', 
                                    'status' => '답변완료', 
                                    'date' => '2023.04.24'
                                ],
                            ];
                        @endphp

                        @foreach($qna_list as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('pr.qna.show') }}'">
                            <td class="py-4 px-4 text-center font-medium text-gray-500">{{ $item['no'] }}</td>
                            <td class="py-4 px-4 text-left text-gray-800 hover:underline">
                                {{ $item['title'] }}
                                <i class="xi-lock text-gray-400 ml-1"></i> </td>
                            <td class="py-4 px-4 text-center text-gray-600">{{ $item['writer'] }}</td>
                            <td class="py-4 px-4 text-center">
                                <span class="bg-amber-400 text-white text-xs font-bold px-3 py-1.5 rounded-sm">
                                    {{ $item['status'] }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $item['date'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 relative">
                <div class="flex justify-end mb-8">
                    <a href="{{ route('service.inquiry') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-8 rounded-sm shadow-sm transition flex items-center">
                        문의하기
                    </a>
                </div>

                <div class="flex justify-center border-t border-gray-200 pt-8">
                    <div class="flex items-center gap-1">
                        <a href="#" class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-bold text-sm border border-gray-900">1</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
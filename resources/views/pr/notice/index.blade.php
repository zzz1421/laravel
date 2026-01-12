@extends('layouts.foex')

@section('title', '공지사항')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">공지사항</h1>
            <p class="text-gray-600">포엑스의 주요 소식과 안내사항을 알려드립니다.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <div class="text-sm text-gray-600 font-medium">
                    전체 <span class="text-amber-600 font-bold">41</span> 건 / 현재 1 페이지
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
                        @php
                            $notices = [
                                ['no'=>41, 'title'=>'2024 대한민국 안전산업 박람회 포엑스(주) 참가', 'file'=>true, 'date'=>'2024.09.06', 'hits'=>1560],
                                ['no'=>40, 'title'=>'2024년 2차 IECEx CoPC 교육공고 (Unit Ex 001)', 'file'=>true, 'date'=>'2024.08.05', 'hits'=>1818],
                                ['no'=>39, 'title'=>'포엑스 주식회사 소프트웨어 사업자 등록', 'file'=>false, 'date'=>'2024.04.26', 'hits'=>2005],
                                ['no'=>38, 'title'=>'포엑스(주) 한국선박내연기관협회 가입', 'file'=>true, 'date'=>'2024.04.24', 'hits'=>2105],
                                ['no'=>37, 'title'=>'포엑스(주) 2024년 IP기반해외진출지원(글로벌IP스타기업) 선정', 'file'=>false, 'date'=>'2024.04.24', 'hits'=>739],
                                ['no'=>36, 'title'=>'2024년 1차 IECEx CoPC 교육공고 (Unit Ex 001)', 'file'=>true, 'date'=>'2024.03.22', 'hits'=>1801],
                                ['no'=>35, 'title'=>'국제방폭 기술 교육(방폭 기본)', 'file'=>true, 'date'=>'2024.01.12', 'hits'=>2005],
                                ['no'=>34, 'title'=>'국제방폭 기술 교육(폭발위험장소설정)', 'file'=>true, 'date'=>'2024.01.12', 'hits'=>450],
                                ['no'=>33, 'title'=>'포엑스(주) 세계 최초로 수소방폭 개인자격(IECEx CoPC Unit ...', 'file'=>true, 'date'=>'2023.07.10', 'hits'=>2355],
                                ['no'=>32, 'title'=>'2023년 12차 IECEx CoPC 교육공고 (Unit Ex 001)', 'file'=>true, 'date'=>'2023.06.05', 'hits'=>2089],
                            ];
                        @endphp

                        @foreach($notices as $notice)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer" onclick="location.href='{{ route('pr.notice.show', 1) }}'">
                            <td class="py-4 px-4 text-center font-medium">{{ $notice['no'] }}</td>
                            <td class="py-4 px-4 text-left">
                                <span class="text-blue-600 font-medium mr-1">[공지사항]</span>
                                <span class="text-gray-800 hover:underline">{{ $notice['title'] }}</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                @if($notice['file'])
                                    <i class="xi-diskette text-gray-400 text-lg border border-gray-300 rounded p-0.5"></i>
                                @else
                                    <span class="text-gray-300">-</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $notice['date'] }}</td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $notice['hits'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-12 flex justify-center">
                <div class="flex items-center gap-1">
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-bold text-sm border border-gray-900">1</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition">2</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition">3</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition">4</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition">5</a>
                </div>
            </div>

        </div>
    </div>

@endsection
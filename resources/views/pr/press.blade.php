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

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4"> <div class="text-sm text-gray-600 font-medium">
                    Total <span class="text-amber-600 font-bold">101</span> / 1 page
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
                            <th class="py-4 px-4 w-24 text-center">첨부파일</th>
                            <th class="py-4 px-4 w-32 text-center">작성자</th> <th class="py-4 px-4 w-32 text-center">날짜</th>
                            <th class="py-4 px-4 w-24 text-center">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $press_list = [
                                ['no'=>101, 'title'=>'천안 자원순환시설 LP가스 폭발 추정 사고', 'date'=>'2025.05.02'],
                                ['no'=>100, 'title'=>"수소 트레일러, 폭발 대신 '안전'을 싣는다", 'date'=>'2025.05.02'],
                                ['no'=>99, 'title'=>'용인 수지 연료전지 개발 연구소서 폭발사고...5명 부상', 'date'=>'2025.04.01'],
                                ['no'=>98, 'title'=>'울산 수소발전소 공사 현장서 폭발 사고...2명 부상', 'date'=>'2025.04.01'],
                                ['no'=>97, 'title'=>'경기 시흥 PVC필터 제조업체 폭발 사고...7명 중상', 'date'=>'2025.03.06'],
                                ['no'=>96, 'title'=>'울산 온산공단 유류탱크 폭발·화재...2명 사상(종합3보)', 'date'=>'2025.03.06'],
                                ['no'=>95, 'title'=>"경남도 '암모니아 혼소 연료 선박' 3월 시운전 준비 착착", 'date'=>'2025.02.03'],
                                ['no'=>94, 'title'=>"[이슈진단] 리튬배터리 폭발 예방의 게임체인저 '능동적 방폭'", 'date'=>'2025.02.03'],
                                ['no'=>93, 'title'=>'울산시 2년 연속 미국 CES 2025 홍보관 운영', 'date'=>'2025.01.15'],
                                ['no'=>92, 'title'=>'인천 자동차 휠 제조공장에서 폭발 사고...5명 중경상', 'date'=>'2025.01.02'],
                            ];
                        @endphp

                        @foreach($press_list as $item)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition cursor-pointer group">
                            <td class="py-4 px-4 text-center font-medium text-gray-500">{{ $item['no'] }}</td>
                            <td class="py-4 px-4 text-left">
                                <span class="text-gray-800 font-medium group-hover:text-blue-600 transition">
                                    {{ $item['title'] }}
                                </span>
                                <i class="xi-external-link text-gray-400 ml-1 text-xs group-hover:text-blue-400"></i>
                            </td>
                            <td class="py-4 px-4 text-center text-gray-400">-</td>
                            <td class="py-4 px-4 text-center text-gray-600">포엑스</td>
                            <td class="py-4 px-4 text-center text-gray-500">{{ $item['date'] }}</td>
                            <td class="py-4 px-4 text-center text-gray-400">-</td>
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
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition"><i class="xi-angle-right"></i></a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition"><i class="xi-angle-right-min"></i></a>
                </div>
            </div>

        </div>
    </div>

@endsection
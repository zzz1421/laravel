@extends('layouts.foex')

@section('title', '교육신청')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">교육신청</h1>
            <p class="text-gray-600">포엑스의 전문 교육 과정을 신청하고 전문가로 성장하세요.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between items-center mb-8 gap-4 border-b border-gray-200 pb-6">
                <div class="text-sm text-gray-600 font-medium w-full lg:w-auto">
                    전체 <span class="text-amber-600 font-bold">10</span> 건 / 현재 1 페이지
                </div>
                
                <form class="flex flex-wrap gap-2 w-full lg:w-auto justify-end">
                    <select class="border border-gray-300 px-3 py-2 text-sm rounded-sm focus:outline-none focus:border-amber-500">
                        <option value="">지역 전체</option>
                        <option value="gn">경남</option>
                        <option value="us">울산</option>
                        <option value="se">서울</option>
                    </select>
                    
                    <select class="border border-gray-300 px-3 py-2 text-sm rounded-sm focus:outline-none focus:border-amber-500">
                        <option value="">교육분류 전체</option>
                        <option value="copc">IECEx CoPC</option>
                        <option value="tech">기술교육</option>
                        <option value="safety">안전교육</option>
                    </select>

                    <div class="flex gap-0">
                        <input type="text" placeholder="교육명 검색" class="border border-gray-300 px-4 py-2 text-sm w-48 md:w-64 focus:outline-none focus:border-amber-500">
                        <button type="button" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                            <i class="xi-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="space-y-6">
                
                @php
                    $courses = [
                        [
                            'status' => 'recruiting', // 모집중
                            'region' => '경남',
                            'category' => '[기술교육] 방폭교육',
                            'title' => '방폭전문가 기술교육 (Beginner Expert Course) 10차',
                            'period' => '2026.03.10 ~ 2026.03.10 (09:00 ~ 18:00)',
                            'limit' => '9명',
                            'fee' => '500,000원',
                            'app_period' => '2026.02.01 ~ 2026.02.28'
                        ],
                        [
                            'status' => 'closed', // 모집마감
                            'region' => '경남',
                            'category' => '[IECEx CoPC] IECEx CoPC 001',
                            'title' => 'IECEx CoPC Unit Ex 001 교육 (9차)',
                            'period' => '2025.08.13 ~ 2025.08.13 (09:00 ~ 18:00)',
                            'limit' => '9명',
                            'fee' => '500,000원',
                            'app_period' => '2025.07.18 ~ 2025.08.08'
                        ],
                        [
                            'status' => 'closed', // 모집마감
                            'region' => '경남',
                            'category' => '[IECEx CoPC] IECEx CoPC 001',
                            'title' => 'IECEx CoPC Unit Ex 001 교육 (8차)',
                            'period' => '2024.09.03 ~ 2024.09.03 (09:00 ~ 18:00)',
                            'limit' => '9명',
                            'fee' => '500,000원',
                            'app_period' => '2024.08.05 ~ 2024.08.23'
                        ],
                    ];
                @endphp

                @foreach($courses as $course)
                <div class="border border-gray-200 rounded-xl p-6 md:p-8 hover:shadow-lg hover:border-amber-300 transition duration-300 bg-white group relative">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        
                        <div class="flex-grow">
                            <div class="flex items-center gap-2 mb-3 text-sm">
                                <span class="text-amber-600 font-bold"><i class="xi-maker mr-1"></i>{{ $course['region'] }}</span>
                                <span class="text-gray-400">|</span>
                                <span class="text-gray-600">{{ $course['category'] }}</span>
                            </div>

                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 group-hover:text-blue-700 transition flex items-center gap-2">
                                {{ $course['title'] }}
                                <i class="xi-external-link text-gray-400 text-lg group-hover:text-blue-500"></i>
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-8 text-sm text-gray-600">
                                <div class="flex items-start">
                                    <span class="w-4 h-4 mr-2 mt-0.5"><i class="xi-calendar text-gray-400"></i></span>
                                    <span class="font-bold mr-2 w-16">교육기간</span>
                                    <span>{{ $course['period'] }}</span>
                                </div>
                                <div class="flex items-start">
                                    <span class="w-4 h-4 mr-2 mt-0.5"><i class="xi-user text-gray-400"></i></span>
                                    <span class="font-bold mr-2 w-16">교육인원</span>
                                    <span>{{ $course['limit'] }}</span>
                                    <span class="mx-2 text-gray-300">|</span>
                                    <span class="font-bold mr-2">교육비</span>
                                    <span>{{ $course['fee'] }}</span>
                                </div>
                                <div class="flex items-start md:col-span-2">
                                    <span class="w-4 h-4 mr-2 mt-0.5"><i class="xi-time text-gray-400"></i></span>
                                    <span class="font-bold mr-2 w-16">신청기간</span>
                                    <span class="text-amber-600">{{ $course['app_period'] }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-auto flex-shrink-0 mt-4 md:mt-0">
                            @if($course['status'] === 'recruiting')
                                <button onclick="location.href='#'" class="w-full md:w-32 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded shadow-md transition transform hover:-translate-y-1">
                                    신청하기
                                </button>
                            @else
                                <button disabled class="w-full md:w-32 bg-gray-400 text-white font-bold py-3 rounded cursor-not-allowed">
                                    모집기간종료
                                </button>
                            @endif
                        </div>

                    </div>
                </div>
                @endforeach
                </div>

            <div class="mt-12 flex justify-center">
                <div class="flex items-center gap-1">
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-bold text-sm border border-gray-900">1</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition">2</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-white text-gray-600 hover:bg-gray-50 text-sm border border-gray-300 transition"><i class="xi-angle-right-min"></i></a>
                </div>
            </div>

        </div>
    </div>

@endsection
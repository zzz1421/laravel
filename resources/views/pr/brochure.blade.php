@extends('layouts.foex')

@section('title', '홍보자료')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">홍보자료</h1>
            <p class="text-gray-600">포엑스의 브로슈어와 카탈로그를 확인하세요.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
                <span class="text-sm text-gray-600">전체 <b class="text-amber-600">1</b> 건 / 현재 1 페이지</span>
                <div class="flex gap-0">
                    <input type="text" class="border border-gray-300 px-3 py-2 text-sm w-48" placeholder="검색어 입력">
                    <button class="bg-amber-500 text-white px-3 py-2"><i class="xi-search"></i></button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                
                <div class="group cursor-pointer">
                    <div class="relative bg-gray-100 rounded-lg overflow-hidden border border-gray-200 aspect-[1/1.4] flex items-center justify-center group-hover:shadow-lg transition duration-300">
                        <div class="w-3/4 h-3/4 bg-white shadow-md flex flex-col items-center justify-center text-center p-4 relative z-0">
                            <i class="xi-shield-checked text-4xl text-amber-500 mb-2"></i>
                            <span class="font-bold text-gray-800">FOEX</span>
                            <span class="text-xs text-gray-500 mt-1">Brochure 2026</span>
                        </div>

                        <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                            <a href="#" class="bg-amber-500 text-white text-sm font-bold py-2 px-6 rounded-full hover:bg-amber-600 transition mb-2">
                                <i class="xi-download mr-1"></i> PDF 다운로드
                            </a>
                            <a href="#" class="bg-white text-gray-800 text-sm font-bold py-2 px-6 rounded-full hover:bg-gray-100 transition">
                                <i class="xi-eye mr-1"></i> 미리보기
                            </a>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition truncate">Foex 브로슈어</h3>
                        <p class="text-sm text-gray-400 mt-1">2022.12.01</p>
                    </div>
                </div>

            </div>

            <div class="mt-12 flex justify-center">
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white text-sm font-bold">1</a>
            </div>
        </div>
    </div>

@endsection
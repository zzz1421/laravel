@extends('layouts.admin')

@section('title', '대시보드')
@section('header', '관리자 대시보드')

@section('content')
    
    {{-- 통계 카드 그리드 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        {{-- 공지사항 --}}
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">공지사항</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['notice']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center text-xl">
                <i class="xi-notice"></i>
            </div>
        </div>

        {{-- 보도자료 --}}
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">보도자료</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['press']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 text-green-500 rounded-full flex items-center justify-center text-xl">
                <i class="xi-newspaper"></i>
            </div>
        </div>

        {{-- 자료실 --}}
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">자료실 (파일)</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['archive']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-purple-50 text-purple-500 rounded-full flex items-center justify-center text-xl">
                <i class="xi-library-books-o"></i>
            </div>
        </div>

        {{-- 역량 (특허/인증 등) --}}
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-amber-500 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium mb-1">보유 역량</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ number_format($counts['capability']) }}</h3>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center text-xl">
                <i class="xi-trophy"></i>
            </div>
        </div>

    </div>

    {{-- 하단 미디어 통계 --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h4 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">미디어 현황</h4>
            <div class="flex gap-4">
                <div class="flex-1 bg-gray-50 rounded-lg p-4 text-center">
                    <span class="block text-gray-500 text-sm">홍보영상</span>
                    <strong class="text-2xl text-gray-900">{{ number_format($counts['video']) }}</strong>
                </div>
                <div class="flex-1 bg-gray-50 rounded-lg p-4 text-center">
                    <span class="block text-gray-500 text-sm">브로슈어</span>
                    <strong class="text-2xl text-gray-900">{{ number_format($counts['brochure']) }}</strong>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center justify-center text-gray-400">
            <div class="text-center">
                <i class="xi-chart-bar xi-3x mb-2"></i>
                <p>방문자 통계 준비중</p>
            </div>
        </div>
    </div>

@endsection
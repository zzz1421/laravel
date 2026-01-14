{{-- 반드시 layouts.foex를 상속받아야 합니다! --}}
@extends('layouts.foex')

@section('title', '페이지 제목') {{-- 여기에 '포엑스 일정', '홍보영상' 등을 적으세요 --}}

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">페이지 제목</h1>
            <p class="text-gray-600">포엑스의 다양한 소식을 전해드립니다.</p>
        </div>
    </div>

    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="inline-block p-6 rounded-full bg-gray-100 mb-6">
                <i class="xi-wrench text-4xl text-gray-400"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">페이지 준비 중입니다.</h2>
            <p class="text-gray-500">빠른 시일 내에 알찬 내용으로 찾아뵙겠습니다.</p>
            
            <div class="mt-8">
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline font-medium">
                    <i class="xi-arrow-left mr-1"></i> 메인으로 돌아가기
                </a>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.foex') {{-- 1. 우리가 만든 레이아웃 상속 --}}

@section('content') {{-- 2. foex 레이아웃의 content 부분에 내용 넣기 --}}

    {{-- 대시보드 배경 및 여백 --}}
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- 헤더 (타이틀) --}}
            <div class="mb-6 px-4 sm:px-0">
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>

            {{-- 본문 카드 --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">환영합니다!</h3>
                    <p class="text-gray-600">
                        {{ __("You're logged in!") }} (성공적으로 로그인되었습니다.)
                    </p>

                    {{-- 추가: 마이페이지로 가는 버튼 예시 --}}
                    <div class="mt-6">
                        <a href="{{ route('mypage') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            내 정보 보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
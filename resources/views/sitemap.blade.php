@extends('layouts.foex')

@section('title', '사이트맵')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">사이트맵</h1>
            <p class="text-gray-600">포엑스의 모든 메뉴를 한눈에 확인하실 수 있습니다.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 group">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-gray-100 flex items-center group-hover:border-blue-500 transition">
                        <i class="xi-building text-blue-600 mr-2 text-2xl"></i> 회사소개
                    </h2>
                    <ul class="space-y-3">
                        <li><a href="{{ route('company.intro') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 포엑스 소개</a></li>
                        <li><a href="{{ route('company.greeting') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 인사말</a></li>
                        <li><a href="{{ route('company.history') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 연혁</a></li>
                        <li><a href="{{ route('company.organization') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 조직도</a></li>
                        <li><a href="{{ route('company.location') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 오시는 길</a></li>
                    </ul>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 group">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-gray-100 flex items-center group-hover:border-blue-500 transition">
                        <i class="xi-briefcase text-blue-600 mr-2 text-2xl"></i> 사업분야
                    </h2>
                    <ul class="space-y-3">
                        <li><a href="{{ route('business.education') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 교육사업</a></li>
                        <li><a href="{{ route('business.consulting') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 컨설팅</a></li>
                        <li><a href="{{ route('business.engineering') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 엔지니어링</a></li>
                        <li><a href="{{ route('business.rnd') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 연구개발</a></li>
                    </ul>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 group">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-gray-100 flex items-center group-hover:border-blue-500 transition">
                        <i class="xi-desktop text-blue-600 mr-2 text-2xl"></i> 솔루션
                    </h2>
                    <ul class="space-y-3">
                        <li><a href="{{ route('products.suite') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> FOEX Suite</a></li>
                        <li><a href="{{ route('products.node') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> FOEX Node</a></li>
                    </ul>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 group">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-gray-100 flex items-center group-hover:border-blue-500 transition">
                        <i class="xi-newspaper text-blue-600 mr-2 text-2xl"></i> 홍보센터
                    </h2>
                    <ul class="space-y-3">
                        <li><a href="{{ route('pr.schedule') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 포엑스일정</a></li>
                        <li><a href="{{ route('pr.notice.index') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 공지사항</a></li>
                        <li><a href="{{ route('pr.brochure') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 홍보자료</a></li>
                        <li><a href="{{ route('pr.media') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 홍보영상</a></li>
                        <li><a href="{{ route('pr.press') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 보도자료</a></li>
                        <li><a href="{{ route('pr.archive') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 자료실</a></li>
                        <li><a href="{{ route('pr.qna') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> Q&A</a></li>
                    </ul>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 group">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-gray-100 flex items-center group-hover:border-blue-500 transition">
                        <i class="xi-mouse text-blue-600 mr-2 text-2xl"></i> 온라인신청
                    </h2>
                    <ul class="space-y-3">
                        <li><a href="{{ route('service.edu.apply') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 교육신청</a></li>
                        <li><a href="{{ route('service.inquiry') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 견적문의</a></li>
                    </ul>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-8 hover:shadow-lg transition duration-300 group">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-gray-100 flex items-center group-hover:border-blue-500 transition">
                        <i class="xi-user text-blue-600 mr-2 text-2xl"></i> 회원서비스 & 기타
                    </h2>
                    <ul class="space-y-3">
                        <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 로그인</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 회원가입</a></li>
                        <li><a href="{{ route('privacy') }}" class="text-gray-600 hover:text-blue-600 hover:translate-x-1 inline-block transition font-bold"><i class="xi-angle-right-min mr-1 text-gray-300"></i> 개인정보처리방침</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

@endsection
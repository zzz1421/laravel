@extends('layouts.foex')

@section('title', '대시보드')

@section('content')

    {{-- [1] 공통 히어로 컴포넌트: 웰컴 메시지 --}}
    <x-page-hero 
        category="MEMBERSHIP" 
        title="WELCOME, {{ Auth::user()->name }}님!" 
        desc="포엑스 회원으로 로그인되었습니다. 안전한 방폭 솔루션을 자유롭게 이용해 보세요." 
        bg-image="images/business/location_hero.jpg" 
        padding="pt-[18rem] pb-[18rem]"
    />

    {{-- [2] 대시보드 본문: 퀵 메뉴 카드 --}}
    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[120rem] mx-auto px-[4rem]">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-[3rem]" data-aos="fade-up">
                
                {{-- 카드 1: 내 정보 관리 --}}
                <div class="bg-white p-[5rem] rounded-[3rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-[7rem] h-[7rem] bg-orange-50 rounded-[2rem] flex items-center justify-center mb-[3rem] group-hover:bg-[#ff6a00] transition-colors">
                        <i class="xi-user-address text-[#ff6a00] text-[3rem] group-hover:text-white"></i>
                    </div>
                    <h4 class="text-[2.2rem] font-bold mb-[1.5rem]">마이페이지</h4>
                    <p class="text-[1.6rem] text-gray-500 mb-[3rem] break-keep">내 회원 정보와 서비스 이용 내역을 한눈에 확인하세요.</p>
                    <a href="{{ route('mypage') }}" class="text-[1.6rem] font-bold text-[#ff6a00] flex items-center">
                        바로가기 <i class="xi-arrow-right ml-[0.5rem]"></i>
                    </a>
                </div>

                {{-- 카드 2: 온라인 문의 --}}
                <div class="bg-white p-[5rem] rounded-[3rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-[7rem] h-[7rem] bg-gray-50 rounded-[2rem] flex items-center justify-center mb-[3rem] group-hover:bg-gray-900 transition-colors">
                        <i class="xi-help text-gray-900 text-[3rem] group-hover:text-white"></i>
                    </div>
                    <h4 class="text-[2.2rem] font-bold mb-[1.5rem]">기술 상담 문의</h4>
                    <p class="text-[1.6rem] text-gray-500 mb-[3rem] break-keep">궁금하신 사항은 전문가에게 직접 문의하실 수 있습니다.</p>
                    <a href="{{ route('inquiry') }}" class="text-[1.6rem] font-bold text-gray-900 flex items-center">
                        문의하기 <i class="xi-arrow-right ml-[0.5rem]"></i>
                    </a>
                </div>

                {{-- 카드 3: 교육 신청 내역 --}}
                <div class="bg-white p-[5rem] rounded-[3rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="w-[7rem] h-[7rem] bg-gray-50 rounded-[2rem] flex items-center justify-center mb-[3rem] group-hover:bg-gray-900 transition-colors">
                        <i class="xi-calendar-check text-gray-900 text-[3rem] group-hover:text-white"></i>
                    </div>
                    <h4 class="text-[2.2rem] font-bold mb-[1.5rem]">교육 내역</h4>
                    <p class="text-[1.6rem] text-gray-500 mb-[3rem] break-keep">신청하신 방폭 교육 일정과 상태를 확인합니다.</p>
                    <a href="#" class="text-[1.6rem] font-bold text-gray-900 flex items-center">
                        자세히 보기 <i class="xi-arrow-right ml-[0.5rem]"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>

@endsection
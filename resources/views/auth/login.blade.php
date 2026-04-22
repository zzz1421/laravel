@extends('layouts.foex')

@section('title', '로그인')

@section('content')

    {{-- [1] 공통 히어로 컴포넌트 --}}
    <x-page-hero 
        category="MEMBERSHIP" 
        title="LOGIN" 
        desc="포엑스의 다양한 방폭 안전 서비스를 이용해 보세요." 
        bg-image="images/business/location_hero.jpg" 
    />

    {{-- [2] 로그인 본문 영역 --}}
    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[65rem] mx-auto px-[4rem]">
            
            {{-- 시안 스타일 적용: 둥근 모서리, 연회색 테두리, 부드러운 그림자 --}}
            <div class="bg-white rounded-[3rem] border border-gray-200 p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] relative overflow-hidden" data-aos="fade-up">
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- 아이디/이메일 입력 --}}
                    <div class="mb-[3rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">아이디 또는 이메일</label>
                        {{-- 디자인 요소: 연회색 배경, 클릭 시 오렌지색 테두리 하이라이트 --}}
                        <input type="text" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="이메일 또는 아이디를 입력해주세요"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                        @error('email') 
                            <span class="text-red-500 text-[1.4rem] mt-[0.8rem] block flex items-center">
                                <i class="xi-warning mr-[0.5rem]"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- 비밀번호 입력 --}}
                    <div class="mb-[4rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">비밀번호</label>
                        <input type="password" name="password" required
                               placeholder="비밀번호를 입력해주세요"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                        @error('password') 
                            <span class="text-red-500 text-[1.4rem] mt-[0.8rem] block flex items-center">
                                <i class="xi-warning mr-[0.5rem]"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- 로그인 상태 유지 (체크박스) --}}
                    <div class="flex items-center mb-[4rem]">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-[2.2rem] h-[2.2rem] rounded-[0.6rem] border-gray-300 text-[#ff6a00] focus:ring-[#ff6a00] transition-all cursor-pointer">
                            <span class="ml-[1.2rem] text-[1.6rem] text-gray-600 font-medium group-hover:text-gray-900 transition-colors">로그인 상태 유지</span>
                        </label>
                    </div>

                    {{-- 로그인 버튼 (오렌지 포인트 컬러) --}}
                    <button type="submit" formtarget="_self" 
                            class="w-full bg-[#ff6a00] hover:bg-gray-900 text-white font-bold text-[1.8rem] py-[2.2rem] rounded-[1.5rem] shadow-lg shadow-orange-500/30 hover:shadow-none transition-all duration-300 flex justify-center items-center">
                        로그인 <i class="xi-arrow-right ml-[1rem] text-[2rem]"></i>
                    </button>

                    {{-- 하단 링크 (회원가입 / 비밀번호 찾기) --}}
                    <div class="mt-[4rem] pt-[3rem] border-t border-gray-100 flex items-center justify-center gap-[2.5rem] text-[1.6rem] font-medium text-gray-500">
                        <a href="{{ route('register') }}" class="hover:text-[#ff6a00] transition-colors">회원가입</a>
                        <span class="w-[4px] h-[4px] rounded-full bg-gray-300"></span>
                        <a href="{{ route('password.request') }}" class="hover:text-[#ff6a00] transition-colors">비밀번호 찾기</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.foex')

@section('title', '회원가입')

@section('content')

    {{-- [1] 공통 히어로 컴포넌트 --}}
    <x-page-hero 
        category="MEMBERSHIP" 
        title="JOIN MEMBER" 
        desc="포엑스와 함께 안전한 글로벌 방폭 솔루션을 경험하세요." 
        bg-image="images/business/location_hero.jpg" 
    />

    {{-- [2] 회원가입 본문 영역 --}}
    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[65rem] mx-auto px-[4rem]">
            
            {{-- 시안 스타일 적용: 둥근 모서리, 연회색 테두리, 부드러운 그림자 --}}
            <div class="bg-white rounded-[3rem] border border-gray-200 p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] relative overflow-hidden" data-aos="fade-up">
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- 이름 입력 --}}
                    <div class="mb-[3rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">이름</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                               placeholder="이름을 입력해주세요"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                        @error('name') 
                            <span class="text-red-500 text-[1.4rem] mt-[0.8rem] flex items-center">
                                <i class="xi-warning mr-[0.5rem]"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- 이메일 입력 --}}
                    <div class="mb-[3rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">이메일</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               placeholder="이메일 주소를 입력해주세요"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                        @error('email') 
                            <span class="text-red-500 text-[1.4rem] mt-[0.8rem] flex items-center">
                                <i class="xi-warning mr-[0.5rem]"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- 비밀번호 입력 --}}
                    <div class="mb-[3rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">비밀번호</label>
                        <input type="password" name="password" required
                               placeholder="비밀번호를 입력해주세요"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                        @error('password') 
                            <span class="text-red-500 text-[1.4rem] mt-[0.8rem] flex items-center">
                                <i class="xi-warning mr-[0.5rem]"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- 비밀번호 확인 입력 --}}
                    <div class="mb-[5rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">비밀번호 확인</label>
                        <input type="password" name="password_confirmation" required
                               placeholder="비밀번호를 다시 한번 입력해주세요"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                    </div>

                    {{-- 회원가입 버튼 --}}
                    <button type="submit" 
                            class="w-full bg-[#ff6a00] hover:bg-gray-900 text-white font-bold text-[1.8rem] py-[2.2rem] rounded-[1.5rem] shadow-lg shadow-orange-500/30 hover:shadow-none transition-all duration-300 flex justify-center items-center">
                        가입하기 <i class="xi-user-plus ml-[1rem] text-[2rem]"></i>
                    </button>

                    {{-- 로그인 페이지로 돌아가기 링크 --}}
                    <div class="mt-[4rem] pt-[3rem] border-t border-gray-100 flex items-center justify-center text-[1.6rem] text-gray-500">
                        이미 계정이 있으신가요? 
                        <a href="{{ route('login') }}" class="ml-[1.5rem] font-bold text-[#ff6a00] hover:text-gray-900 transition-colors">
                            로그인
                        </a>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

@endsection
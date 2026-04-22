@extends('layouts.foex')

@section('title', '비밀번호 찾기')

@section('content')

    {{-- [1] 공통 히어로 컴포넌트 --}}
    <x-page-hero 
        category="MEMBERSHIP" 
        title="FIND PASSWORD" 
        desc="가입하신 이메일 주소를 입력하시면 비밀번호 재설정 링크를 보내드립니다." 
        bg-image="images/business/location_hero.jpg" 
    />

    {{-- [2] 비밀번호 찾기 본문 영역 --}}
    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[65rem] mx-auto px-[4rem]">
            
            {{-- 시안 스타일 적용: 둥근 모서리, 연회색 테두리, 부드러운 그림자 --}}
            <div class="bg-white rounded-[3rem] border border-gray-200 p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] relative overflow-hidden" data-aos="fade-up">
                
                {{-- 안내 문구 --}}
                <div class="mb-[4rem] text-center">
                    <div class="w-[8rem] h-[8rem] bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-[2rem]">
                        <i class="xi-lock-o text-[#ff6a00] text-[3.5rem]"></i>
                    </div>
                    <p class="text-[1.6rem] text-gray-500 font-medium leading-relaxed break-keep">
                        비밀번호를 잊으셨나요?<br>
                        회원가입 시 등록한 이메일 주소를 입력해 주시면,<br>
                        비밀번호를 재설정할 수 있는 링크를 이메일로 보내드립니다.
                    </p>
                </div>

                {{-- 이메일 전송 성공 메시지 (라라벨 기본 세션 상태 렌더링) --}}
                <x-auth-session-status class="mb-[3rem] p-[2rem] bg-teal-50 border border-teal-200 text-teal-700 text-[1.5rem] rounded-[1.5rem] font-medium" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    {{-- 이메일 입력 --}}
                    <div class="mb-[4rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">이메일 주소</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="예) foex@foex.kr"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all text-center md:text-left">
                        @error('email') 
                            <span class="text-red-500 text-[1.4rem] mt-[0.8rem] flex items-center justify-center md:justify-start">
                                <i class="xi-warning mr-[0.5rem]"></i>{{ $message }}
                            </span> 
                        @enderror
                    </div>

                    {{-- 링크 전송 버튼 --}}
                    <button type="submit" 
                            class="w-full bg-[#ff6a00] hover:bg-gray-900 text-white font-bold text-[1.8rem] py-[2.2rem] rounded-[1.5rem] shadow-lg shadow-orange-500/30 hover:shadow-none transition-all duration-300 flex justify-center items-center">
                        재설정 링크 받기 <i class="xi-mail-send ml-[1rem] text-[2.2rem]"></i>
                    </button>

                    {{-- 로그인 페이지로 돌아가기 링크 --}}
                    <div class="mt-[4rem] pt-[3rem] border-t border-gray-100 flex items-center justify-center text-[1.6rem] text-gray-500">
                        기억이 나셨나요? 
                        <a href="{{ route('login') }}" class="ml-[1.5rem] font-bold text-[#ff6a00] hover:text-gray-900 transition-colors">
                            로그인으로 돌아가기
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
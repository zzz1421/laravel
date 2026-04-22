@extends('layouts.foex')

@section('title', '비밀번호 확인')

@section('content')

    {{-- [1] 공통 히어로 컴포넌트 --}}
    <x-page-hero 
        category="SECURITY" 
        title="CONFIRM PASSWORD" 
        desc="보안을 위해 비밀번호를 한 번 더 확인합니다." 
        bg-image="images/business/location_hero.jpg" 
    />

    {{-- [2] 본문 영역 --}}
    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[65rem] mx-auto px-[4rem]">
            <div class="bg-white rounded-[3rem] border border-gray-200 p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] text-center" data-aos="fade-up">
                
                <div class="w-[8rem] h-[8rem] bg-gray-900 rounded-full flex items-center justify-center mx-auto mb-[3rem]">
                    <i class="xi-shield-checked text-[#ff6a00] text-[3.5rem]"></i>
                </div>

                <p class="text-[1.6rem] text-gray-600 mb-[4rem] break-keep">
                    이곳은 보안 구역입니다. 계속 진행하시려면 현재 계정의 비밀번호를 입력해 주세요.
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-[3rem]">
                        <input type="password" name="password" required autocomplete="current-password"
                               placeholder="비밀번호 입력"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all text-center">
                        @error('password') <span class="text-red-500 text-[1.4rem] mt-[0.8rem] block">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" 
                            class="w-full bg-[#ff6a00] hover:bg-gray-900 text-white font-bold text-[1.8rem] py-[2.2rem] rounded-[1.5rem] transition-all duration-300">
                        본인 확인 완료
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
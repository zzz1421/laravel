@extends('layouts.foex')

@section('title', '비밀번호 재설정')

@section('content')

    <x-page-hero 
        category="MEMBERSHIP" 
        title="RESET PASSWORD" 
        desc="새로운 비밀번호를 설정하여 계정 보안을 강화하세요." 
        bg-image="images/business/location_hero.jpg" 
    />

    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[65rem] mx-auto px-[4rem]">
            <div class="bg-white rounded-[3rem] border border-gray-200 p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)]" data-aos="fade-up">
                
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    {{-- 이메일 (보통 링크에서 자동으로 넘어오지만, 확인용으로 둠) --}}
                    <div class="mb-[3rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">이메일 주소</label>
                        <input type="email" name="email" value="{{ old('email', $request->email) }}" required readonly
                               class="w-full text-[1.6rem] bg-gray-100 border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] text-gray-500 cursor-not-allowed">
                    </div>

                    {{-- 새 비밀번호 --}}
                    <div class="mb-[3rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">새 비밀번호</label>
                        <input type="password" name="password" required autofocus
                               placeholder="8자 이상의 영문, 숫자 조합"
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                        @error('password') <span class="text-red-500 text-[1.4rem] mt-[0.8rem] block">{{ $message }}</span> @enderror
                    </div>

                    {{-- 비밀번호 확인 --}}
                    <div class="mb-[4rem]">
                        <label class="block text-[1.6rem] font-bold text-gray-900 mb-[1rem]">비밀번호 확인</label>
                        <input type="password" name="password_confirmation" required
                               class="w-full text-[1.6rem] bg-[#f4f5f7] border border-gray-200 rounded-[1.5rem] px-[2.5rem] py-[2rem] focus:bg-white focus:border-[#ff6a00] focus:ring-[4px] focus:ring-[#ff6a00]/10 transition-all">
                    </div>

                    <button type="submit" 
                            class="w-full bg-[#ff6a00] hover:bg-gray-900 text-white font-bold text-[1.8rem] py-[2.2rem] rounded-[1.5rem] shadow-lg shadow-orange-500/30 transition-all duration-300">
                        비밀번호 변경 완료
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
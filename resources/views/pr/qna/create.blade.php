@extends('layouts.foex')

@section('title', 'Q&A 글쓰기')

@section('content')

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마 - 일관성 유지) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        <img src="{{ asset('images/pr/qna_hero.jpg') }}" alt="FOEx Q&A" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/support,typing'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                Support Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">Q&A 문의하기</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">궁금하신 사항을 남겨주시면 담당자가 확인 후 정성껏 답변해 드리겠습니다.</p>
        </div>
    </section>

    {{-- [2] 작성 폼 영역 --}}
    <div class="py-[10rem] bg-gray-50">
        <div class="max-w-[100rem] mx-auto px-[4rem]">

            {{-- 폼 시작 --}}
            <form action="{{ route('pr.qna.store') }}" method="POST" class="space-y-[4rem]">
                @csrf
                
                <div class="bg-white rounded-[2.5rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-up">
                    
                    <div class="space-y-[4rem]">
                        {{-- 1. 카테고리 및 작성자 (2단 그리드) --}}
                        <div class="grid md:grid-cols-2 gap-[4rem]">
                            <div class="space-y-[1.5rem]">
                                <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">문의 유형 <span class="text-blue-600">*</span></label>
                                <select name="category" class="w-full px-[2.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none appearance-none" required>
                                    <option value="">유형을 선택해주세요</option>
                                    <option value="제품문의">제품문의</option>
                                    <option value="기술지원">기술지원</option>
                                    <option value="교육문의">교육문의</option>
                                    <option value="기타">기타</option>
                                </select>
                            </div>
                            <div class="space-y-[1.5rem]">
                                <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">작성자 <span class="text-blue-600">*</span></label>
                                <input type="text" name="writer" value="{{ auth()->check() ? auth()->user()->name : old('writer') }}" class="w-full px-[2.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none" placeholder="이름을 입력하세요" required>
                            </div>
                        </div>

                        {{-- 2. 제목 --}}
                        <div class="space-y-[1.5rem]">
                            <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">문의 제목 <span class="text-blue-600">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" class="w-full px-[2.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none" placeholder="제목을 입력해주세요" required>
                        </div>

                        {{-- 3. 내용 --}}
                        <div class="space-y-[1.5rem]">
                            <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">상세 내용 <span class="text-blue-600">*</span></label>
                            <textarea name="content" rows="10" class="w-full px-[2.5rem] py-[2.5rem] bg-gray-50 border border-gray-200 rounded-[2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none resize-none" placeholder="문의하실 내용을 상세히 기재해 주세요." required>{{ old('content') }}</textarea>
                        </div>

                        {{-- 4. 비밀글 설정 및 비밀번호 (비회원/비밀글용) --}}
                        <div class="pt-[2rem] border-t border-gray-100">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-[3rem]">
                                <label class="flex items-center cursor-pointer group">
                                    <div class="relative">
                                        <input type="checkbox" name="secret" value="1" class="sr-only peer" id="secret_check">
                                        <div class="w-[5rem] h-[2.6rem] bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[0.3rem] after:left-[0.4rem] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-[2rem] after:w-[2.2rem] after:transition-all peer-checked:bg-blue-600"></div>
                                    </div>
                                    <span class="ml-[1.5rem] text-[1.7rem] font-bold text-gray-700 group-hover:text-blue-600 transition-colors">비밀글로 문의하기</span>
                                </label>

                                <div class="flex items-center gap-[1.5rem]">
                                    <i class="xi-lock text-gray-400 text-[2rem]"></i>
                                    <input type="password" name="password" class="w-[20rem] px-[2rem] py-[1.2rem] bg-gray-50 border border-gray-200 rounded-[1rem] text-[1.5rem] focus:border-blue-500 transition-all outline-none" placeholder="비밀번호 4자리">
                                </div>
                            </div>
                            <p class="mt-[1.5rem] text-[1.4rem] text-gray-400">※ 비밀글 설정 시 본인과 관리자만 확인이 가능합니다.</p>
                        </div>
                    </div>

                </div>

                {{-- [3] 버튼 그룹 --}}
                <div class="flex flex-col md:flex-row justify-center gap-[2rem] pt-[2rem]">
                    <a href="{{ route('pr.qna.index') }}" class="inline-flex items-center justify-center bg-white border-[0.2rem] border-gray-200 text-gray-500 font-bold py-[2rem] px-[6rem] rounded-[1.5rem] text-[1.8rem] hover:bg-gray-50 transition-all order-2 md:order-1">
                        취소하기
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center bg-blue-600 text-white font-black py-[2rem] px-[10rem] rounded-[1.5rem] text-[1.8rem] shadow-[0_1.5rem_3rem_rgba(37,99,235,0.3)] hover:bg-blue-700 transition-all hover:-translate-y-[0.5rem] order-1 md:order-2">
                        문의 등록하기 <i class="xi-check ml-[1rem]"></i>
                    </button>
                </div>

            </form>
            
        </div>
    </div>

@endsection
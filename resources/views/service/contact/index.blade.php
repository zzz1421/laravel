@extends('layouts.foex')

@section('title', '문의하기')

@section('content')

    {{-- [1] 페이지 헤더 (비즈니스 컨설팅 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        <img src="{{ asset('images/contact/inquiry_hero.jpg') }}" alt="FOEx Inquiry" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/consulting,office'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                Contact Us
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">문의하기</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep max-w-[90rem] mx-auto">
                상담, 견적, 기술지원 등 무엇이든 남겨주시면 포엑스의 전문가가 답변해 드립니다.
            </p>
        </div>
    </section>

    {{-- [2] 통합 문의 폼 영역 --}}
    <div class="py-[10rem] bg-gray-50">
        <div class="max-w-[110rem] mx-auto px-[4rem]">

            <form action="{{ route('pr.qna.store') }}" method="POST" enctype="multipart/form-data" class="space-y-[6rem]"> 
                @csrf
                
                {{-- 1. 개인정보 수집 및 이용 동의 --}}
                <div class="bg-white rounded-[2.5rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-up">
                    <h3 class="text-[2.4rem] font-bold text-gray-900 mb-[3rem] flex items-center">
                        <span class="w-[0.6rem] h-[2.5rem] bg-blue-600 mr-[1.5rem] rounded-full"></span> 개인정보 수집 및 이용 동의
                    </h3>
                    <div class="bg-gray-50 border border-gray-100 p-[3rem] rounded-[1.5rem] h-[20rem] overflow-y-auto text-[1.5rem] text-gray-600 leading-[1.8] mb-[3rem] custom-scrollbar">
                        1. 수집하는 개인정보 항목: 회사명, 담당자명, 연락처, 이메일<br>
                        2. 개인정보 수집 및 이용 목적: 문의 사항에 대한 검토 및 답변 전달, 서비스 안내<br>
                        3. 개인정보 보유 및 이용 기간: 목적 달성 후 3년간 보관 (이후 파기)<br>
                        4. 귀하는 개인정보 수집 및 이용에 거부할 권리가 있으며, 거부 시 상담 접수가 제한될 수 있습니다.
                    </div>
                    <div class="flex items-center justify-center md:justify-end">
                        <label class="flex items-center cursor-pointer group">
                            <input type="checkbox" id="privacy_agree" name="privacy_agree" class="w-[2.4rem] h-[2.4rem] text-blue-600 border-gray-300 rounded-[0.5rem] focus:ring-blue-500 cursor-pointer" required>
                            <span class="ml-[1.2rem] text-[1.8rem] text-gray-700 font-bold group-hover:text-blue-600 transition-colors">개인정보 수집 및 이용에 동의합니다. <span class="text-blue-600">(필수)</span></span>
                        </label>
                    </div>
                </div>

                {{-- 2. 문의 내용 작성 --}}
                <div class="bg-white rounded-[2.5rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-[2.4rem] font-bold text-gray-900 mb-[4rem] flex items-center">
                        <span class="w-[0.6rem] h-[2.5rem] bg-blue-600 mr-[1.5rem] rounded-full"></span> 문의 내용 작성
                    </h3>
                    
                    <div class="space-y-[4rem]">
                        {{-- [A] 문의 구분 --}}
                        <div class="flex flex-col md:flex-row md:items-center gap-[2rem] md:gap-[4rem] pb-[3rem] border-b border-gray-50">
                            <label class="w-[18rem] text-[1.8rem] font-bold text-gray-800">문의 구분 <span class="text-blue-600">*</span></label>
                            <div class="flex flex-wrap gap-[1.5rem]">
                                @foreach(['견적문의'=>'견적 문의', '기술지원'=>'기술 지원', '제품문의'=>'제품 문의', '교육문의'=>'교육 관련', '기타'=>'기타'] as $val => $label)
                                <label class="flex items-center cursor-pointer bg-gray-50 px-[2.5rem] py-[1.2rem] rounded-full border border-gray-200 hover:border-blue-300 transition-all has-[:checked]:bg-blue-600 has-[:checked]:text-white shadow-sm">
                                    <input type="radio" name="category" value="{{ $val }}" class="hidden" {{ $loop->first ? 'checked' : '' }}>
                                    <span class="text-[1.6rem] font-bold">{{ $label }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- [B] 회사명 / 담당자명 --}}
                        <div class="grid md:grid-cols-2 gap-[4rem]">
                            <div class="space-y-[1.5rem]">
                                <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">회사명 <span class="text-blue-600">*</span></label>
                                <input type="text" name="company" class="w-full px-[2.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none" placeholder="회사명을 입력하세요" required>
                            </div>
                            <div class="space-y-[1.5rem]">
                                <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">담당자명 <span class="text-blue-600">*</span></label>
                                <input type="text" name="writer" value="{{ auth()->check() ? auth()->user()->name : old('writer') }}" class="w-full px-[2.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none" placeholder="담당자 성함을 입력하세요" required>
                            </div>
                        </div>

                        {{-- [C] 연락처 / 이메일 --}}
                        <div class="grid md:grid-cols-2 gap-[4rem]">
                            <div class="space-y-[1.5rem]">
                                <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">연락처 <span class="text-blue-600">*</span></label>
                                <div class="flex items-center gap-[1rem]">
                                    <input type="text" name="phone1" class="w-full px-[1.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] text-center focus:border-blue-500" maxlength="3" required>
                                    <span class="text-gray-300">-</span>
                                    <input type="text" name="phone2" class="w-full px-[1.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] text-center focus:border-blue-500" maxlength="4" required>
                                    <span class="text-gray-300">-</span>
                                    <input type="text" name="phone3" class="w-full px-[1.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] text-center focus:border-blue-500" maxlength="4" required>
                                </div>
                            </div>
                            <div class="space-y-[1.5rem]">
                                <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">이메일 <span class="text-blue-600">*</span></label>
                                <div class="flex items-center gap-[1rem]">
                                    <input type="text" name="email_id" class="w-full px-[2rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500" placeholder="아이디" required>
                                    <span class="text-gray-400">@</span>
                                    <input type="text" name="email_domain" class="w-full px-[2rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500" placeholder="도메인" required>
                                </div>
                            </div>
                        </div>

                        {{-- [D] 문의 제목 --}}
                        <div class="space-y-[1.5rem]">
                            <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">문의 제목 <span class="text-blue-600">*</span></label>
                            <input type="text" name="title" class="w-full px-[2.5rem] py-[1.8rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none" placeholder="문의 제목을 입력해주세요" required>
                        </div>

                        {{-- [E] 문의 내용 --}}
                        <div class="space-y-[1.5rem]">
                            <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">문의 내용 <span class="text-blue-600">*</span></label>
                            <textarea name="content" rows="10" class="w-full px-[2.5rem] py-[2.5rem] bg-gray-50 border border-gray-200 rounded-[2rem] text-[1.6rem] focus:border-blue-500 focus:bg-white transition-all outline-none resize-none shadow-inner" placeholder="문의하실 내용을 구체적으로 기재해 주시면 보다 정확한 상담이 가능합니다." required></textarea>
                        </div>

                        {{-- [F] 첨부파일 --}}
                        <div class="space-y-[1.5rem]">
                            <label class="block text-[1.7rem] font-bold text-gray-800 ml-[0.5rem]">첨부파일</label>
                            <div class="flex flex-col md:flex-row items-start md:items-center gap-[2rem] bg-gray-50 p-[2.5rem] rounded-[1.5rem] border border-dashed border-gray-300">
                                <label class="flex items-center justify-center bg-white border border-gray-200 text-gray-600 px-[3rem] py-[1.5rem] rounded-[1rem] cursor-pointer hover:bg-blue-600 hover:text-white transition-all text-[1.5rem] font-bold shadow-sm">
                                    <i class="xi-file-upload-o mr-[1rem] text-[2rem]"></i> 파일 선택
                                    <input type="file" name="file" class="hidden" onchange="this.parentElement.nextElementSibling.innerText = this.files[0].name">
                                </label>
                                <span class="text-[1.5rem] text-gray-400 font-medium">선택된 파일 없음 (최대 10MB)</span>
                            </div>
                        </div>

                        {{-- [G] 비밀글 설정 (Q&A 확인용 핵심 기능) --}}
                        <div class="pt-[4rem] border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-[3rem]">
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" name="secret" value="1" class="w-[2.4rem] h-[2.4rem] text-blue-600 border-gray-300 rounded-[0.5rem] focus:ring-blue-500 transition-all">
                                <div class="ml-[1.5rem]">
                                    <span class="block text-[1.8rem] font-bold text-gray-700 group-hover:text-blue-600 transition-colors">비밀글로 등록하기</span>
                                    <span class="block text-[1.4rem] text-gray-400 font-medium">관리자와 본인만 문의 내용을 확인할 수 있습니다.</span>
                                </div>
                            </label>
                            <div class="flex items-center gap-[1.5rem] bg-blue-50 px-[2.5rem] py-[1.5rem] rounded-[1.5rem] border border-blue-100">
                                <i class="xi-lock text-blue-600 text-[2.2rem]"></i>
                                <input type="password" name="password" maxlength="4" class="w-[18rem] bg-transparent text-[1.7rem] font-bold placeholder:text-blue-300 focus:outline-none" placeholder="비밀번호 4자리">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- [3] 하단 버튼 그룹 --}}
                <div class="flex flex-col md:flex-row justify-center gap-[2.5rem] pt-[4rem]">
                    <a href="{{ route('pr.qna.index') }}" class="inline-flex items-center justify-center bg-white border-[0.2rem] border-gray-200 text-gray-500 font-bold py-[2.2rem] px-[8rem] rounded-[1.5rem] text-[2rem] hover:bg-gray-100 transition-all order-2 md:order-1 shadow-sm">
                        취소하기
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center bg-blue-600 text-white font-black py-[2.2rem] px-[12rem] rounded-[1.5rem] text-[2rem] shadow-[0_1.5rem_4rem_rgba(37,99,235,0.3)] hover:bg-blue-700 transition-all hover:-translate-y-[0.8rem] order-1 md:order-2">
                        문의 등록하기 <i class="xi-send ml-[1.5rem]"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
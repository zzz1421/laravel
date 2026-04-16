@extends('layouts.foex')

@section('title', __('menu.location'))

@section('content')

    {{-- [1] 페이지 헤더 (기존 코드 그대로 유지) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        <img src="{{ asset('images/business/location_hero.jpg') }}" 
            alt="FOEx Location" 
            class="absolute inset-0 w-full h-full object-cover opacity-50"
            onerror="this.src='https://loremflickr.com/1920/1080/architecture,office,building'">

        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-[#1a1c1e] pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[2rem] py-[0.8rem] bg-[#f9b417]/10 border border-[#f9b417]/20 rounded-full text-[#f9b417] text-[1.4rem] font-bold tracking-widest uppercase mb-[2rem] backdrop-blur-sm">
                LOCATION
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">
                {{ __('company.loc_title') }}
            </h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-200 font-medium break-keep opacity-90">
                {{ __('company.loc_desc') }}
            </p>
        </div>
    </section>


    {{-- [2] 오시는길 본문 영역 (시안 스타일 완벽 적용) --}}
    {{-- 시안 배경색과 유사한 아주 옅은 회색 배경 적용 --}}
    <div class="bg-[#fafafa] py-[10rem]">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[10rem]">
            
            {{-- [A] 상단: 그리드 너비를 꽉 채우는 연구소 대형 지도 --}}
            <div class="w-full h-[50rem] md:h-[60rem] bg-gray-200 overflow-hidden shadow-sm border border-gray-200 relative mb-[10rem]" data-aos="fade-up">
                <div id="daumRoughmapContainer1768203143212" class="root_daum_roughmap root_daum_roughmap_landing" style="width:100%;"></div>
                <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
                <script charset="UTF-8">
                    new daum.roughmap.Lander({
                        "timestamp" : "1768203143212",
                        "key" : "fv6bgtywb5o",
                        "mapWidth" : "100%",
                        "mapHeight" : "600"
                    }).render();
                </script>
            </div>

            {{-- [B] 하단: 중앙 세로선을 기준으로 좌/우 분할 --}}
            {{-- 🚨 핵심: lg:border-r lg:border-black 으로 시안의 얇고 검은 중앙 세로선을 만듭니다. --}}
            <div class="grid lg:grid-cols-2">
                
                {{-- [B-1] 왼쪽: CONTACT & LOCATION --}}
                <div class="lg:pr-[6rem] lg:border-r-[1px] lg:border-black mb-[8rem] lg:mb-0" data-aos="fade-right">
                    
                    {{-- 시안 컬러: 오렌지 (#ff6a00) 적용 --}}
                    <h3 class="text-[#ff6a00] text-[2rem] font-black uppercase tracking-tight mb-[2rem]">CONTACT & LOCATION</h3>
                    
                    {{-- 타이틀 아래 굵은 구분선 --}}
                    <div class="border-t-[2px] border-gray-600">
                        
                        {{-- 주소 --}}
                        {{-- 항목 사이 얇은 가로 구분선 border-b border-gray-300 --}}
                        <div class="flex items-start py-[4rem] border-b border-gray-300">
                            {{-- 아이콘 박스: 시안처럼 연회색 배경 + 둥근 사각형 --}}
                            <div class="w-[8.5rem] h-[8.5rem] bg-[#f4f5f7] rounded-[2rem] flex items-center justify-center mr-[3.5rem] shrink-0 border border-gray-200">
                                <i class="xi-map-pin text-[#ff6a00] text-[3.5rem]"></i>
                            </div>
                            <div class="pt-[0.5rem]">
                                <h4 class="text-[#ff6a00] text-[1.6rem] font-bold mb-[1rem]">주소</h4>
                                <p class="text-[2rem] text-gray-900 font-bold leading-[1.4] break-keep">
                                    {!! __('company.rnd_addr') !!}
                                </p>
                            </div>
                        </div>

                        {{-- 전화 --}}
                        <div class="flex items-start py-[4rem] border-b border-gray-300">
                            <div class="w-[8.5rem] h-[8.5rem] bg-[#f4f5f7] rounded-[2rem] flex items-center justify-center mr-[3.5rem] shrink-0 border border-gray-200">
                                <i class="xi-call text-[#ff6a00] text-[3.5rem]"></i>
                            </div>
                            <div class="pt-[0.5rem]">
                                <h4 class="text-[#ff6a00] text-[1.6rem] font-bold mb-[1rem]">전화</h4>
                                <p class="text-[2.2rem] text-gray-900 font-black">055-293-0521</p>
                            </div>
                        </div>

                        {{-- 팩스 --}}
                        <div class="flex items-start py-[4rem] border-b border-gray-300">
                            <div class="w-[8.5rem] h-[8.5rem] bg-[#f4f5f7] rounded-[2rem] flex items-center justify-center mr-[3.5rem] shrink-0 border border-gray-200">
                                <i class="xi-print text-[#ff6a00] text-[3.5rem]"></i>
                            </div>
                            <div class="pt-[0.5rem]">
                                <h4 class="text-[#ff6a00] text-[1.6rem] font-bold mb-[1rem]">팩스</h4>
                                <p class="text-[2.2rem] text-gray-900 font-black">02-1234-5678</p>
                            </div>
                        </div>

                        {{-- 이메일 --}}
                        <div class="flex items-start py-[4rem]">
                            <div class="w-[8.5rem] h-[8.5rem] bg-[#f4f5f7] rounded-[2rem] flex items-center justify-center mr-[3.5rem] shrink-0 border border-gray-200">
                                <i class="xi-envelope-o text-[#ff6a00] text-[3.5rem]"></i>
                            </div>
                            <div class="pt-[0.5rem]">
                                <h4 class="text-[#ff6a00] text-[1.6rem] font-bold mb-[1rem]">이메일</h4>
                                <p class="text-[2.2rem] text-gray-900 font-black">info@foex.co.kr</p>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- [B-2] 오른쪽: 사옥 전경 및 업무시간 --}}
                <div class="lg:pl-[6rem]" data-aos="fade-left">
                    <h3 class="text-[#ff6a00] text-[2rem] font-black uppercase tracking-tight mb-[2rem]">사옥 전경</h3>
                    
                    <div class="border-t-[2px] border-gray-600 pt-[4rem] space-y-[4rem]">
                        
                        {{-- 건물 외관 사진 (시안 스타일: 연회색 배경, 테두리, 둥근 모서리) --}}
                        <div class="w-full aspect-[16/10] bg-[#f4f5f7] rounded-[2rem] border border-gray-300 flex items-center justify-center overflow-hidden">
                            {{-- 사진이 없을 때 시안처럼 아이콘과 텍스트가 보이도록 처리 --}}
                            <div class="text-center text-gray-400 absolute z-0 flex flex-col items-center">
                                <i class="xi-image-o text-[6rem] mb-[1rem]"></i>
                                <p class="text-[1.4rem]">건물 외관 / 로비 사진 삽입 영역</p>
                            </div>
                            {{-- 실제 이미지가 로드되면 위 안내선을 덮습니다 --}}
                            <img src="{{ asset('images/company/rnd-exterior.jpg') }}" 
                                 alt="FOEx R&D Center" 
                                 class="w-full h-full object-cover relative z-10"
                                 onerror="this.style.display='none'">
                        </div>

                        {{-- 업무 시간 박스 (시안 스타일: 연회색 배경) --}}
                        <div class="bg-[#f4f5f7] rounded-[2rem] p-[4rem] md:p-[5rem] border border-gray-300">
                            <h4 class="text-[#ff6a00] text-[1.8rem] font-bold mb-[3.5rem]">업무 시간</h4>
                            
                            <div class="space-y-[2.5rem] text-[1.6rem]">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 font-bold">월 - 금</span>
                                    <span class="text-gray-900 font-bold">09:00 - 18:00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 font-bold">점심 시간</span>
                                    <span class="text-gray-900 font-bold">12:00 - 13:00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-500 font-bold">토 일 / 공휴일</span>
                                    <span class="text-gray-900 font-bold">휴무</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div> {{-- 그리드 끝 --}}
        </div>
    </div>

@endsection
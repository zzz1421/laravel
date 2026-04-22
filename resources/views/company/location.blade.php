@extends('layouts.foex')

@section('title', __('menu.location'))

@section('content')

    <x-page-hero 
        category="{{ __('menu.company') }}" 
        title="{{ __('company.loc_title') }}" 
        desc="{{ __('company.loc_desc') }}" 
        bg-image="images/company/hero_location.jpg" 
    />

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
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
                        <h3 class="text-[#F97316] text-[2rem] font-black uppercase tracking-tight mb-[2rem]">CONTACT & LOCATION</h3>
                        
                        {{-- 타이틀 아래 굵은 구분선 --}}
                        <div class="border-t-[2px] border-gray-600">
                            
                            {{-- 주소 --}}
                            <div class="flex items-start py-[4rem] border-b border-gray-300">
                                {{-- 요청하신 스타일 적용: 100x100px(10rem), #F3F3F3 배경, #929292 테두리, 15px(1.5rem) 라운드 --}}
                                <div class="w-[10rem] h-[10rem] bg-[#F3F3F3] border border-[#929292] rounded-[1.5rem] flex items-center justify-center mr-[3.5rem] shrink-0">
                                    <x-icons.location.address class="text-[#F9B417] w-[4rem] h-[4rem]" />
                                </div>
                                <div class="pt-[1.5rem]">
                                    <h4 class="text-[#F97316] text-[1.6rem] font-bold mb-[1rem]">주소</h4>
                                    <p class="text-[2rem] text-gray-900 font-bold leading-[1.4] break-keep">
                                        {!! __('company.rnd_addr') !!}
                                    </p>
                                </div>
                            </div>

                            {{-- 전화 --}}
                            <div class="flex items-start py-[4rem] border-b border-gray-300">
                                <div class="w-[10rem] h-[10rem] bg-[#F3F3F3] border border-[#929292] rounded-[1.5rem] flex items-center justify-center mr-[3.5rem] shrink-0">
                                    <x-icons.location.phone_call class="text-[#F9B417] w-[4rem] h-[4rem]" />
                                </div>
                                <div class="pt-[1.5rem]">
                                    <h4 class="text-[#F97316] text-[1.6rem] font-bold mb-[1rem]">전화</h4>
                                    <p class="text-[2.2rem] text-gray-900 font-black">055-293-0521</p>
                                </div>
                            </div>

                            {{-- 팩스 --}}
                            <div class="flex items-start py-[4rem] border-b border-gray-300">
                                <div class="w-[10rem] h-[10rem] bg-[#F3F3F3] border border-[#929292] rounded-[1.5rem] flex items-center justify-center mr-[3.5rem] shrink-0">
                                    <x-icons.location.fax class="text-[#F9B417] w-[4rem] h-[4rem]" />
                                </div>
                                <div class="pt-[1.5rem]">
                                    <h4 class="text-[#F97316] text-[1.6rem] font-bold mb-[1rem]">팩스</h4>
                                    <p class="text-[2.2rem] text-gray-900 font-black">02-1234-5678</p>
                                </div>
                            </div>

                            {{-- 이메일 --}}
                            <div class="flex items-start py-[4rem]">
                                <div class="w-[10rem] h-[10rem] bg-[#F3F3F3] border border-[#929292] rounded-[1.5rem] flex items-center justify-center mr-[3.5rem] shrink-0">
                                    <x-icons.location.email class="text-[#F9B417] w-[4rem] h-[4rem]" />
                                </div>
                                <div class="pt-[1.5rem]">
                                    <h4 class="text-[#F97316] text-[1.6rem] font-bold mb-[1rem]">이메일</h4>
                                    <p class="text-[2.2rem] text-gray-900 font-black">info@foex.co.kr</p>
                                </div>
                            </div>

                        </div>
                    </div>

                {{-- [B-2] 오른쪽: 사옥 전경 및 업무시간 --}}
                <div class="lg:pl-[6rem]" data-aos="fade-left">
                    <h3 class="text-[#F97316] text-[2rem] font-black uppercase tracking-tight mb-[2rem]">업무 공간</h3>
                    
                    <div class="border-t-[2px] border-gray-600 pt-[4rem] space-y-[4rem]">
                        
                        {{-- 건물 외관 슬라이더 영역 --}}
                        <div class="w-full aspect-[16/10] bg-[#f4f5f7] rounded-[2rem] border border-gray-300 flex items-center justify-center overflow-hidden relative group">
                            
                            {{-- 1. 사진이 없을 때 안내 (맨 뒤에 깔림) --}}
                            <div class="text-center text-gray-400 absolute z-0 flex flex-col items-center">
                                <i class="xi-image-o text-[6rem] mb-[1rem]"></i>
                                <p class="text-[1.4rem]">사진 삽입 영역</p>
                            </div>

                            {{-- 2. Swiper 메인 컨테이너 --}}
                            <div class="swiper exteriorSwiper w-full h-full relative z-10">
                                <div class="swiper-wrapper">
                                    
                                    {{-- 슬라이드 1 --}}
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/company/office_image1.jpg') }}" alt="사옥 전경 1" class="w-full h-full object-cover">
                                    </div>
                                    
                                    {{-- 슬라이드 2 --}}
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/company/office_image2.jpg') }}" alt="사옥 전경 2" class="w-full h-full object-cover">
                                    </div>
                                    
                                    {{-- 슬라이드 3 --}}
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/company/office_image3.jpg') }}" alt="사옥 전경 3" class="w-full h-full object-cover">
                                    </div>

                                    {{-- 필요한 만큼 <div class="swiper-slide">...</div> 를 계속 복사해서 추가하세요 --}}
                                    
                                </div>
                                
                                {{-- 좌우 화살표 네비게이션 (마우스 올렸을 때만 보이게 group-hover 적용) --}}
                                <div class="swiper-button-next !text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-md"></div>
                                <div class="swiper-button-prev !text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 drop-shadow-md"></div>
                                
                                {{-- 하단 점(Pagination) 표시 --}}
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        {{-- 업무 시간 박스 (시안 스타일: 연회색 배경) --}}
                        <div class="bg-[#f4f5f7] rounded-[2rem] p-[4rem] md:p-[5rem] border border-gray-300">
                            <h4 class="text-[#F97316] text-[1.8rem] font-bold mb-[3.5rem]">업무 시간</h4>
                            
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

{{-- Swiper JS 및 실행 스크립트 (파일 하단에 추가) --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exteriorSwiper = new Swiper(".exteriorSwiper", {
            loop: true, // 무한 반복
            effect: "fade", // 부드럽게 겹쳐지며 넘어가는 효과 (원치 않으시면 이 줄을 지우세요)
            autoplay: {
                delay: 4000, // 4초마다 자동 넘김
                disableOnInteraction: false, // 유저가 만진 후에도 자동 넘김 유지
            },
            navigation: {
                nextEl: ".exteriorSwiper .swiper-button-next",
                prevEl: ".exteriorSwiper .swiper-button-prev",
            },
            pagination: {
                el: ".exteriorSwiper .swiper-pagination",
                clickable: true, // 점을 클릭해서 이동 가능
            },
        });
    });
</script>
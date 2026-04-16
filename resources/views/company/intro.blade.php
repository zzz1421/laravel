@extends('layouts.foex')

@section('title', __('menu.intro')) 

@section('content')

<style>
    html {
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
        scroll-padding-top: 80px; /* 헤더 높이만큼 여백 */
    }

    /* 🚨 수정 핵심: section과 함께 footer도 자석 스크롤의 목적지로 추가! */
    section, footer { 
        scroll-snap-align: start; 
        scroll-snap-stop: always; 
    }
    
    /* 높이와 정렬 설정은 section에만 적용 (footer는 고유의 높이를 유지하도록) */
    section {
        height: calc(100vh - 80px);
        min-height: calc(100vh - 80px); 
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        overflow: hidden;
    }
    
    #hero {
        height: 100vh !important;
        min-height: 100vh !important;
    }

    /* 모바일 전용 해제 */
    @media (max-width: 768px) {
        html { scroll-snap-type: none; }
        section { 
            height: auto !important; 
            min-height: calc(100vh - 80px) !important; 
            padding-top: 4rem; 
            padding-bottom: 4rem; 
            overflow: visible;
        }
    }
</style>

<div class="bg-white">

    {{-- [섹션 1] 히어로 (인트로) --}}
    {{-- 🚨 flex-col과 justify-end를 사용해 텍스트를 바닥으로 내리고, pb-[18rem]으로 메인 페이지와 동일한 하단 여백을 줍니다. 🚨 --}}
    <section id="hero" class="relative w-full h-[100vh] min-h-[70rem] bg-cover bg-center bg-no-repeat flex flex-col justify-end pb-[15rem] md:pb-[18rem]" style="background-image: url('{{ asset('images/hero-intro.png') }}');">
        
        {{-- 어두운 배경 오버레이 --}}
        <div class="absolute inset-0 bg-black/50 z-0"></div>
        
        <div class="w-full max-w-[140rem] mx-auto px-[4rem] relative z-10" data-aos="fade-right">
            <div class="flex flex-col gap-[1.5rem]">
                <p class="text-[#f9b417] text-[1.8rem] md:text-[2.2rem] font-black tracking-widest uppercase" style="font-family: 'Roboto', sans-serif;">
                    {{ __('intro.hero_subtitle') }}
                </p>
                {{-- 글자 크기와 자간(tracking-tight)을 메인 배너 느낌으로 세팅 --}}
                <h1 class="text-white text-[4rem] md:text-[6.5rem] font-black leading-[1.2] tracking-tight" style="font-family: 'Noto Sans KR', sans-serif;">
                    {!! __('intro.hero_title') !!}
                </h1>
                <p class="text-gray-200 text-[1.8rem] md:text-[2.4rem] font-medium leading-[1.6] mt-[1rem]" style="font-family: 'Noto Sans KR', sans-serif;">
                    {!! __('intro.hero_desc') !!}
                </p>
            </div>
        </div>
        
        {{-- 하단 스크롤 다운 화살표 (SVG 교체 및 스타일 최적화) --}}
        <div class="absolute bottom-[4rem] left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <a href="#business" class="text-white opacity-40 hover:opacity-100 transition-opacity flex flex-col items-center">
                <x-icons.common.down-arrow class="w-[4rem] h-[2.5rem]" />
            </a>
        </div>
        
    </section>

    {{-- [섹션] 사업 분야 (핵심 역량) --}}
    <section id="competence" class="relative bg-white flex flex-col justify-center px-[4rem] md:px-[18rem] py-[12rem]">
        <div class="w-full max-w-[140rem] mx-auto">
            
            {{-- 상단 텍스트 및 버튼 영역 (좌측 정렬) --}}
            <div class="mb-[8rem]" data-aos="fade-right">
                <p class="text-[#f9b417] font-bold text-[1.6rem] mb-[1.5rem] tracking-widest">{{ __('intro.comp_subtitle') }}</p>
                <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 mb-[2.5rem] tracking-tight leading-[1.2]">
                    {{ __('intro.comp_title') }}
                </h2>
                <p class="text-gray-500 text-[1.6rem] md:text-[1.8rem] mb-[4rem] leading-[1.6] break-keep">
                    {!! __('intro.comp_desc') !!}
                </p>
                
                {{-- 사업 소개 버튼 (시안 맞춤: 네모 반듯한 라인 버튼) --}}
                <a href="{{ route('business.education') }}" class="inline-flex items-center px-[2.5rem] py-[1.2rem] border-[0.15rem] border-gray-300 text-[1.5rem] font-bold rounded-[0.4rem] text-gray-700 bg-white hover:border-gray-500 hover:bg-gray-50 transition-colors">
                    {{ __('intro.comp_btn') }} <i class="xi-angle-right-min ml-[0.5rem] text-[1.8rem]"></i>
                </a>
            </div>

            {{-- 🚨 하단 5분할 그리드 영역 (글자와 아이콘 동시 호버 적용) 🚨 --}}
            <div class="grid grid-cols-2 md:grid-cols-5 bg-[#f8f9fa] border-y border-gray-200 divide-y md:divide-y-0 md:divide-x divide-gray-200" data-aos="fade-up">
                
                {{-- 1. 교육 --}}
                <div class="p-[5rem] lg:p-[7rem] text-center hover:bg-white hover:shadow-xl transition duration-300 group cursor-pointer" onclick="location.href='{{ route('business.education') }}'">
                    <x-icons.intro.edu class="w-[7rem] h-[7rem] mx-auto mb-[3rem] text-[#303031] group-hover:text-[#f9b417] transition-colors" />
                    {{-- 글자에도 group-hover를 추가하여 색상 변경 연동 --}}
                    <h3 class="font-bold text-[#303031] group-hover:text-[#f9b417] transition-colors text-[2rem]">{{ __('intro.biz_edu') }}</h3>
                </div>

                {{-- 2. 컨설팅 --}}
                <div class="p-[5rem] lg:p-[7rem] text-center hover:bg-white hover:shadow-xl transition duration-300 group cursor-pointer" onclick="location.href='{{ route('business.consulting') }}'">
                    <x-icons.intro.consulting class="w-[7rem] h-[7rem] mx-auto mb-[3rem] text-[#303031] group-hover:text-[#f9b417] transition-colors" />
                    <h3 class="font-bold text-[#303031] group-hover:text-[#f9b417] transition-colors text-[2rem]">{{ __('intro.biz_consulting') }}</h3>
                </div>

                {{-- 3. 기술용역 --}}
                <div class="p-[5rem] lg:p-[7rem] text-center hover:bg-white hover:shadow-xl transition duration-300 group cursor-pointer" onclick="location.href='{{ route('business.techservice') }}'">
                    <x-icons.intro.tech class="w-[7rem] h-[7rem] mx-auto mb-[3rem] text-[#303031] group-hover:text-[#f9b417] transition-colors" />
                    <h3 class="font-bold text-[#303031] group-hover:text-[#f9b417] transition-colors text-[2rem]">{{ __('intro.biz_tech') }}</h3>
                </div>

                {{-- 4. 엔지니어링 --}}
                <div class="p-[5rem] lg:p-[7rem] text-center hover:bg-white hover:shadow-xl transition duration-300 group cursor-pointer" onclick="location.href='{{ route('business.engineering') }}'">
                    <x-icons.intro.eng class="w-[7rem] h-[7rem] mx-auto mb-[3rem] text-[#303031] group-hover:text-[#f9b417] transition-colors" />
                    <h3 class="font-bold text-[#303031] group-hover:text-[#f9b417] transition-colors text-[2rem]">{{ __('intro.biz_eng') }}</h3>
                </div>

                {{-- 5. 연구개발 --}}
                <div class="p-[5rem] lg:p-[7rem] text-center hover:bg-white hover:shadow-xl transition duration-300 group cursor-pointer" onclick="location.href='{{ route('business.techservice') }}'">
                    <x-icons.intro.rnd class="w-[7rem] h-[7rem] mx-auto mb-[3rem] text-[#303031] group-hover:text-[#f9b417] transition-colors" />
                    <h3 class="font-bold text-[#303031] group-hover:text-[#f9b417] transition-colors text-[2rem]">{{ __('intro.biz_rnd') }}</h3>
                </div>

            </div>
            
        </div>
    </section>

    {{-- [섹션] 기업 개요 --}}
    <section id="overview" class="relative bg-white flex flex-col justify-center px-[4rem] md:px-[18rem] py-[12rem]">
        <div class="w-full max-w-[140rem] mx-auto">
            
            {{-- 상단 타이틀 영역 --}}
            <div class="mb-[6rem]" data-aos="fade-up">
                <p class="text-[#f9b417] font-bold text-[1.6rem] mb-[1.5rem] tracking-widest">{{ __('intro.ov_subtitle') }}</p>
                <p class="text-gray-900 text-[2.2rem] md:text-[2.6rem] font-bold leading-[1.6] tracking-tight break-keep">
                    {!! __('intro.ov_title') !!}
                </p>
            </div>
            
            {{-- 🚨 하단 정보 박스 영역 (기존 Table 제거 -> 독립된 Flex Box 구조로 변경) 🚨 --}}
            <div class="flex flex-col space-y-[1.5rem]" data-aos="fade-up" data-aos-delay="100">
                
                @php
                    $overviews = [
                        ['title' => __('intro.ov_company'), 'content' => __('intro.ov_company_val')],
                        ['title' => __('intro.ov_ceo'), 'content' => __('intro.ov_ceo_val')],
                        ['title' => __('intro.ov_est'), 'content' => __('intro.ov_est_val')],
                        ['title' => __('intro.ov_address'), 'content' => __('intro.ov_address_val')],
                    ];
                @endphp

                {{-- 일반 항목들 반복 출력 --}}
                @foreach($overviews as $item)
                <div class="flex flex-col md:flex-row gap-[1.5rem]">
                    {{-- 좌측: 노란색 제목 박스 --}}
                    <div class="w-full md:w-[25rem] bg-[#FFF9E6] border border-gray-200 rounded-[0.8rem] flex items-center justify-center py-[2.5rem] px-[2rem] shadow-sm">
                        <span class="font-bold text-gray-900 text-[1.8rem]">{{ $item['title'] }}</span>
                    </div>
                    {{-- 우측: 회색 내용 박스 --}}
                    <div class="flex-1 bg-[#f8f9fa] border border-gray-200 rounded-[0.8rem] flex items-center py-[2.5rem] px-[4rem] shadow-sm">
                        <span class="text-gray-700 text-[1.8rem] font-medium break-keep">{{ $item['content'] }}</span>
                    </div>
                </div>
                @endforeach

                {{-- 보유인증 항목 (리스트 형태이므로 별도 구성) --}}
                <div class="flex flex-col md:flex-row gap-[1.5rem]">
                    {{-- 좌측: 노란색 제목 박스 --}}
                    <div class="w-full md:w-[25rem] bg-[#FFF9E6] border border-gray-200 rounded-[0.8rem] flex items-center justify-center py-[2.5rem] px-[2rem] shadow-sm">
                        <span class="font-bold text-gray-900 text-[1.8rem]">{{ __('intro.ov_cert') }}</span>
                    </div>
                    {{-- 우측: 회색 내용 박스 (리스트) --}}
                    <div class="flex-1 bg-[#f8f9fa] border border-gray-200 rounded-[0.8rem] flex items-center py-[3rem] px-[4rem] shadow-sm">
                        <ul class="space-y-[1rem] text-gray-700 text-[1.8rem] font-medium">
                            <li class="flex items-center"><span class="w-[0.6rem] h-[0.6rem] bg-gray-500 rounded-full mr-[1.5rem]"></span> {{ __('intro.ov_cert_1') }}</li>
                            <li class="flex items-center"><span class="w-[0.6rem] h-[0.6rem] bg-gray-500 rounded-full mr-[1.5rem]"></span> {{ __('intro.ov_cert_2') }}</li>
                            <li class="flex items-center"><span class="w-[0.6rem] h-[0.6rem] bg-gray-500 rounded-full mr-[1.5rem]"></span> {{ __('intro.ov_cert_3') }}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- [신규 섹션] 보유 역량 (Capabilities) --}}
    {{-- 🚨 기업 개요(#overview)와 연혁(#history) 사이에 삽입하세요 🚨 --}}
    <section id="capabilities" class="relative bg-gray-50 flex flex-col justify-center px-[4rem] md:px-[18rem] py-[10rem]" x-data="{ capTab: 'cert' }">
        <div class="w-full max-w-[140rem] mx-auto">
            
            {{-- 상단 타이틀 영역 --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-[6rem]" data-aos="fade-up">
                <div>
                    <p class="text-[#f9b417] font-bold text-[1.6rem] mb-[1.5rem] tracking-widest uppercase">Our Capabilities</p>
                    <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 tracking-tight leading-[1.2]">
                        증명된 기술과 신뢰
                    </h2>
                </div>
                {{-- 탭 메뉴 --}}
                <div class="flex gap-[1rem] mt-[3rem] md:mt-0 overflow-x-auto no-scrollbar pb-[1rem] md:pb-0">
                    @foreach(['cert'=>'인증', 'patent'=>'특허', 'performance'=>'실적', 'mou'=>'MOU'] as $key => $label)
                    <button @click="capTab = '{{ $key }}'" 
                            :class="capTab === '{{ $key }}' ? 'bg-[#f9b417] text-white border-[#f9b417] shadow-md' : 'bg-white text-gray-500 border-gray-200 hover:bg-gray-50'"
                            class="whitespace-nowrap px-[2.5rem] py-[1.2rem] border-[0.15rem] rounded-[0.4rem] font-bold text-[1.5rem] transition-all duration-300">
                        {{ $label }}
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- 콘텐츠: 인증현황 --}}
            <div x-show="capTab === 'cert'" x-cloak class="animate-fade-in-up">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-[2.5rem]">
                    @forelse($certs ?? [] as $item)
                    <div class="bg-white border border-gray-100 rounded-[1.5rem] p-[3rem] flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="h-[18rem] flex items-center justify-center mb-[2rem]">
                            <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain" onerror="this.src='https://placehold.co/200x280?text=Certificate'">
                        </div>
                        <h3 class="text-[1.7rem] font-bold text-gray-900 line-clamp-1">{{ $item->title }}</h3>
                        <p class="text-[1.4rem] text-gray-400 mt-[0.5rem]">{{ $item->agency }}</p>
                    </div>
                    @empty
                    <div class="col-span-full py-[10rem] text-center text-gray-400">등록된 인증 정보가 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- 콘텐츠: 지식재산권(특허) --}}
            <div x-show="capTab === 'patent'" x-cloak class="animate-fade-in-up">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-[2.5rem]">
                    @forelse($patents ?? [] as $item)
                    <div class="bg-white border border-gray-100 rounded-[1.5rem] p-[3rem] flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="h-[18rem] flex items-center justify-center mb-[2rem]">
                            <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain" onerror="this.src='https://placehold.co/200x280?text=Patent'">
                        </div>
                        <h3 class="text-[1.7rem] font-bold text-gray-900 line-clamp-1">{{ $item->title }}</h3>
                        <p class="text-[1.4rem] text-gray-400 mt-[0.5rem]">{{ $item->date ? $item->date->format('Y.m.d') : '' }}</p>
                    </div>
                    @empty
                    <div class="col-span-full py-[10rem] text-center text-gray-400">등록된 특허 정보가 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- 콘텐츠: 사업실적 (미니 테이블 스타일) --}}
            <div x-show="capTab === 'performance'" x-cloak class="animate-fade-in-up">
                <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
                    <table class="w-full text-left">
                        <tbody class="text-[1.6rem] divide-y divide-gray-50">
                            @forelse($performances ?? [] as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="py-[2rem] px-[4rem] w-[15rem] font-bold text-[#f9b417]">{{ $item->date ? $item->date->format('Y.m') : '' }}</td>
                                <td class="py-[2rem] px-[4rem] font-medium text-gray-800">{{ $item->title }}</td>
                                <td class="py-[2rem] px-[4rem] text-right text-gray-400">{{ $item->agency }}</td>
                            </tr>
                            @empty
                            <tr><td class="py-[10rem] text-center text-gray-400">등록된 실적이 없습니다.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 콘텐츠: MOU --}}
            <div x-show="capTab === 'mou'" x-cloak class="animate-fade-in-up">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-[2.5rem]">
                    @forelse($mous ?? [] as $item)
                    <div class="bg-white border border-gray-100 rounded-[1.5rem] p-[3rem] flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
                        <div class="h-[12rem] flex items-center justify-center mb-[2rem]">
                            <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain mix-blend-multiply" onerror="this.src='https://placehold.co/300x150?text=Partner+Logo'">
                        </div>
                        <h3 class="text-[1.7rem] font-bold text-gray-900">{{ $item->title }}</h3>
                    </div>
                    @empty
                    <div class="col-span-full py-[10rem] text-center text-gray-400">등록된 MOU 정보가 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- 하단 링크 (독립 페이지로 이동) --}}
            <div class="mt-[6rem] text-center">
                 <p class="text-gray-400 text-[1.5rem] mb-[2rem]">※ 위 자료는 포엑스의 주요 자산 중 일부를 발췌한 것입니다.</p>
                 {{-- 🚨 여기서 기존에 만들었던 독립된 '보유역량' 페이지로 링크를 연결해 줍니다. --}}
                 <a href="{{ route('company.capability') }}" class="inline-flex items-center text-[#303031] font-bold text-[1.6rem] hover:text-[#f9b417] transition-colors group">
                    전체 역량 자세히 보기 <i class="xi-arrow-right ml-[0.8rem] group-hover:translate-x-2 transition-transform"></i>
                 </a>
            </div>

        </div>
    </section>

    {{-- [섹션] 연혁 (걸어온 길) --}}
    <section id="history" class="relative w-full flex flex-col justify-center py-[15rem] bg-cover bg-center" style="background-image: url('{{ asset('images/intro-oil.jpg') }}');">
        
        {{-- 🚨 배경 그라데이션 오버레이 🚨 --}}
        {{-- 시안처럼 글자가 있는 좌측은 하얗게 덮어 가독성을 높이고, 우측으로 갈수록 투명해지며 은은한 노란빛이 돌도록 처리했습니다. --}}
        <div class="absolute inset-0 bg-[linear-gradient(99deg,#FFF_53.43%,#FFFBC7_75.57%)] opacity-60 z-0"></div>
        
        <div class="w-full max-w-[140rem] mx-auto px-[4rem] relative z-10" data-aos="fade-right">
            
            {{-- 타이틀 --}}
            <h2 class="text-[3.6rem] md:text-[5rem] font-black text-gray-900 mb-[2.5rem] tracking-tight">
                {{ __('intro.hist_title') }}
            </h2>
            
            {{-- 서브 텍스트 (시안에 맞춰 폰트 굵기를 굵게 조정) --}}
            <p class="text-gray-800 text-[1.6rem] md:text-[1.8rem] font-bold mb-[5rem] leading-[1.6] break-keep">
                {!! __('intro.hist_desc') !!}
            </p>
            
            {{-- 🚨 연혁 자세히 보기 버튼 🚨 --}}
            {{-- route('company.history') 적용 완료 / 시안처럼 흰색 사각형에 그림자 적용 --}}
            <a href="{{ route('company.history') }}" class="inline-flex items-center justify-center bg-white text-gray-900 font-bold text-[1.5rem] py-[1.5rem] px-[3rem] border border-gray-200 rounded-[0.4rem] shadow-[0_0.5rem_1.5rem_rgba(0,0,0,0.05)] hover:bg-[#f9b417] hover:text-white hover:border-[#f9b417] transition-colors duration-300">
                {{ __('intro.hist_btn') }} <i class="xi-angle-right-min ml-[0.5rem] text-[1.8rem]"></i>
            </a>
            
        </div>
    </section>

</div>

@endsection
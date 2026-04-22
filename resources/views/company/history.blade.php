@extends('layouts.foex')

@section('title', __('menu.history'))

@section('content')
@php
    $historyYears = __('history.years');
    $latestYear = !empty($historyYears) ? $historyYears[0]['year'] : '';
@endphp

<x-page-hero 
    category="{{ __('menu.company') }}" 
    title="{{ __('menu.history') }}" 
    desc="{{ __('history.desc') }}" 
    bg-image="images/company/hero_history.jpg" 
/>

{{-- 메인 연혁 섹션 (액션 로직 유지) --}}
<section x-data="{ 
        activeYear: '{{ $latestYear }}',
        scrollPercent: 0,
        updateScroll() {
            const container = this.$refs.historyContainer;
            const rect = container.getBoundingClientRect();
            const windowHeight = window.innerHeight;
            const scrollTop = -rect.top;
            const scrollHeight = rect.height - windowHeight;
            let progress = (scrollTop / scrollHeight) * 100;
            this.scrollPercent = Math.min(Math.max(progress, 0), 100);
        }
    }" 
    x-init="window.addEventListener('scroll', () => updateScroll())"
    x-ref="historyContainer"
    class="relative bg-[#fafafa] pb-[20rem]">
    
    {{-- [1] 좌측 픽스 내비게이션 (시안 반영: 파란색 / 회색 텍스트 폰트 위주) --}}
    <nav class="fixed left-[5rem] top-[30%] z-40 hidden xl:flex flex-col gap-4">
        @foreach($historyYears as $item)
        <a href="#year-{{ $item['year'] }}" 
           @click.prevent="document.getElementById('year-{{ $item['year'] }}').scrollIntoView({behavior: 'smooth'})"
           class="text-[1.6rem] font-bold transition-colors duration-300"
           :class="activeYear === '{{ $item['year'] }}' ? 'text-[#0088cc]' : 'text-gray-300 hover:text-gray-500'">
            {{ $item['year'] }}
        </a>
        @endforeach
    </nav>

    {{-- [2] 메인 타임라인 컨테이너 --}}
    <div class="max-w-[150rem] w-full mx-auto px-[4rem] pt-[15rem] pb-[15rem] relative">
        
        {{-- ★ [핵심 구조] 선이 어긋나지 않도록 '마커부터 마커까지만' 감싸는 전용 구역 --}}
        <div class="relative w-full flex flex-col">

            {{-- 중앙 뼈대 기준선: 무조건 부모의 top-[2rem](첫 마커 중앙) 부터 bottom-[2rem](끝 마커 중앙) 까지만 뻗음 --}}
            <div class="absolute left-1/2 top-[2rem] bottom-[2rem] w-[2px] bg-gray-200 -translate-x-1/2 hidden md:block z-0"></div>
            
            {{-- 중앙 프로그레스 선 --}}
            <div class="absolute left-1/2 top-[2rem] bottom-[2rem] w-[2px] bg-[#F97316] -translate-x-1/2 origin-top transition-transform duration-100 ease-out hidden md:block z-10"
                 :style="{ transform: `scaleY(${scrollPercent / 100})` }"></div>

            {{-- 1. 연도별 리스트 영역 --}}
            <div class="flex flex-col gap-[15rem] relative z-20 w-full">
                @foreach($historyYears as $index => $item)
                    @php
                        $isEven = $index % 2 === 0;
                    @endphp
                    
                    <div id="year-{{ $item['year'] }}" 
                         class="scroll-mt-[17rem] relative flex flex-col md:flex-row w-full items-start justify-center"
                         x-intersect:enter.margin.-40%="activeYear = '{{ $item['year'] }}'">
                        
                        {{-- 타임라인 중앙 동그라미 마커 (첫 번째 아이템의 top-[2rem]이 선의 시작점과 정확히 일치함) --}}
                        <div class="absolute left-1/2 top-[2rem] -translate-x-1/2 w-[4rem] h-[4rem] rounded-full z-10 transition-all duration-300 hidden md:flex items-center justify-center"
                             :class="activeYear === '{{ $item['year'] }}' ? 'ring-[6px] ring-[#F97316]/20' : ''">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none" class="w-full h-full">
                                <ellipse cx="20.0002" cy="19.9999" rx="20.0002" ry="19.9999" 
                                         :fill="activeYear === '{{ $item['year'] }}' ? '#F97316' : '#9CA3AF'" 
                                         style="transition: fill 0.3s ease;" />
                                <ellipse cx="19.9995" cy="19.9994" rx="8.61669" ry="8.61655" fill="#F9FAFB" />
                            </svg>
                        </div>

                        @if($isEven)
                            {{-- [A] 짝수 해 (기존 코드와 동일) --}}
                            <div class="w-full md:w-1/2 flex flex-col items-end md:pr-[11rem] mb-[4rem] md:mb-0">
                                <h2 class="{{ $index === 0 ? 'text-[#303031]' : 'text-[#929292]' }} text-[12rem] font-black font-['Noto_Sans_KR'] leading-none mb-[4.5rem] text-right">
                                    {{ $item['year'] }}
                                </h2>
                                <div class="w-full max-w-[60rem] aspect-[3/4] md:h-[80rem] bg-[#F5F4EC] rounded-[2.5rem] border border-black overflow-hidden flex items-center justify-center shrink-0">
                                    <img src="{{ asset('images/history/' . $item['year'] . '.jpg') }}" alt="{{ $item['year'] }} 연혁" class="w-full h-full object-cover" onerror="this.style.display='none'">
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 md:pl-[11rem] pt-[2rem]">
                                <ul class="space-y-[3.5rem]">
                                    @foreach($item['events'] as $event)
                                        <li class="flex gap-[2.5rem] items-start">
                                            <span class="text-[#303031] text-[3rem] font-semibold font-['Noto_Sans_KR'] leading-none pt-[0.5rem] shrink-0">{{ $event['month'] }}</span>
                                            <span class="text-[#626263] text-[3rem] font-medium font-['Noto_Sans_KR'] leading-tight break-keep w-full max-w-[47.4rem]">{{ $event['content'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            {{-- [B] 홀수 해 (기존 코드와 동일) --}}
                            <div class="w-full md:w-1/2 flex flex-col items-end md:pr-[11rem] pt-[2rem] order-2 md:order-1 mt-[4rem] md:mt-0">
                                <ul class="space-y-[3.5rem] w-full flex flex-col items-end">
                                    @foreach($item['events'] as $event)
                                        <li class="flex gap-[2.5rem] items-start justify-end w-full">
                                            <span class="text-[#626263] text-[3rem] font-medium font-['Noto_Sans_KR'] leading-tight break-keep text-right w-full max-w-[47.4rem] order-2 md:order-1">{{ $event['content'] }}</span>
                                            <span class="text-[#303031] text-[3rem] font-semibold font-['Noto_Sans_KR'] leading-none pt-[0.5rem] shrink-0 order-1 md:order-2">{{ $event['month'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="w-full md:w-1/2 flex flex-col items-start md:pl-[11rem] order-1 md:order-2">
                                <h2 class="{{ $index === 0 ? 'text-[#303031]' : 'text-[#929292]' }} text-[12rem] font-black font-['Noto_Sans_KR'] leading-none mb-[4.5rem] text-left">
                                    {{ $item['year'] }}
                                </h2>
                                <div class="w-full max-w-[60rem] aspect-[3/4] md:h-[80rem] bg-[#F5F4EC] rounded-[2.5rem] border border-black overflow-hidden flex items-center justify-center shrink-0">
                                    <img src="{{ asset('images/history/' . $item['year'] . '.jpg') }}" alt="{{ $item['year'] }} 연혁" class="w-full h-full object-cover" onerror="this.style.display='none'">
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- 2. 종단 마커 (타임라인 전용 구역의 맨 끝바닥에 위치) --}}
            <div class="relative w-full flex justify-center mt-[20rem] z-20">
                <div class="w-[4rem] h-[4rem] rounded-full bg-[#fafafa] flex items-center justify-center transition-all duration-500"
                     :class="scrollPercent >= 98 ? 'ring-[6px] ring-[#F97316]/20' : ''">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" fill="none" class="w-full h-full">
                        <ellipse cx="20.0002" cy="19.9999" rx="20.0002" ry="19.9999" 
                                 :fill="scrollPercent >= 98 ? '#F97316' : '#9CA3AF'" 
                                 style="transition: fill 0.3s ease;" />
                        <ellipse cx="19.9995" cy="19.9994" rx="8.61669" ry="8.61655" fill="#F9FAFB" />
                    </svg>
                </div>
            </div>

        </div> {{-- // 타임라인 전용 구역 끝 --}}
            
            {{-- 3. 타임라인 밖: 설립과 시작 (선이 절대 침범할 수 없는 독립 영역) --}}
        <div class="relative w-full flex flex-col items-center justify-center mt-[4rem]">
            <span class="relative z-10 text-[#303031] text-[3rem] font-semibold font-['Noto_Sans_KR'] leading-normal text-center">
                설립과 시작
            </span>
            <div class="absolute top-[2rem] left-1/2 -translate-x-1/2 -translate-y-1/2 w-[67.2rem] h-[15.8rem] bg-[rgba(255,227,144,0.8)] blur-[102px] rounded-full pointer-events-none z-0"></div>
        </div>

    </div>
</section>
@endsection
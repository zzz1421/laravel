@extends('layouts.foex')

@section('title', __('menu.history'))

@section('content')
@php
    $historyYears = __('history.years');
    $latestYear = !empty($historyYears) ? $historyYears[0]['year'] : '';
@endphp

{{-- [1] Hero 섹션 (생략 가능) --}}
<section class="relative h-[450px] flex items-center justify-center overflow-hidden bg-slate-900">
    <img src="{{ asset('images/history/hero_bg.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-50" alt="History Hero">
    <div class="relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 uppercase tracking-tighter">{{ __('history.title') }}</h1>
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">{{ __('history.desc') }}</p>
    </div>
    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
</section>

{{-- 
    [2] 메인 연혁 섹션 
    Sticky가 작동하려면 부모 요소에 overflow-hidden이 있으면 안 됩니다. (필요 시 제거)
--}}
<section x-data="{ 
        activeYear: '{{ $latestYear }}',
        scrollPercent: 0,
        updateScroll() {
            const container = this.$refs.historyContainer;
            const rect = container.getBoundingClientRect();
            const windowHeight = window.innerHeight;

            // 핵심 수정: 섹션 상단이 화면 상단에 닿을 때 0%, 섹션 하단이 화면 하단에 닿을 때 100%
            // scrollTop: 섹션이 화면 상단에서 위로 넘어간 거리
            const scrollTop = -rect.top;
            // scrollHeight: 섹션 전체 높이에서 화면 높이를 뺀 '실제 스크롤 가능 거리'
            const scrollHeight = rect.height - windowHeight;

            let progress = (scrollTop / scrollHeight) * 100;
            
            // 0% ~ 100% 사이로 제한
            this.scrollPercent = Math.min(Math.max(progress, 0), 100);
        }
    }" 
    x-init="window.addEventListener('scroll', () => updateScroll())"
    x-ref="historyContainer"
    class="relative bg-white">
    
    {{-- [3] 좌측 고정 퀵 메뉴 (Clips) --}}
    <nav class="fixed left-10 top-1/2 -translate-y-1/2 z-40 hidden xl:flex flex-col gap-6">
        @foreach($historyYears as $item)
        <a href="#year-{{ $item['year'] }}" 
           @click.prevent="document.getElementById('year-{{ $item['year'] }}').scrollIntoView({behavior: 'smooth'})"
           class="group flex items-center gap-4 transition-all">
            <span class="relative w-10 h-[2px] transition-all duration-500"
                  :class="activeYear === '{{ $item['year'] }}' ? 'w-16 bg-[#f9b417]' : 'bg-gray-200 group-hover:bg-gray-400 group-hover:w-16'">
            </span>
            <span class="text-[1.4rem] font-bold transition-all duration-300"
                  :class="activeYear === '{{ $item['year'] }}' ? 'text-[#f9b417] opacity-100' : 'text-gray-300 opacity-0 group-hover:opacity-100'">
                {{ $item['year'] }}
            </span>
        </a>
        @endforeach
    </nav>

    <div class="max-w-[140rem] mx-auto flex flex-col lg:flex-row px-[4rem] md:px-[18rem] py-[10rem] gap-[10rem] relative">
        
        {{-- [4] 왼쪽: Sticky 이미지 영역 (고정 유지) --}}
        {{-- h-fit과 self-start가 있어야 부모 높이를 다 차지하지 않고 고정(Sticky)이 정상 작동합니다. --}}
        <div class="lg:w-1/2 lg:sticky lg:top-[15rem] h-fit self-start order-2 lg:order-1">
            <div class="relative overflow-hidden rounded-[2rem] shadow-2xl aspect-[4/3] bg-gray-100">
                @foreach($historyYears as $item)
                    <div x-show="activeYear === '{{ $item['year'] }}'" 
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 scale-105"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="absolute inset-0">
                        
                        <img src="{{ asset('images/history/' . $item['year'] . '.jpg') }}" 
                            class="w-full h-full object-cover"
                            onerror="this.src='{{ asset('images/common/no-image.jpg') }}'">
                        
                        <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                            <h2 class="text-white text-[10rem] font-black tracking-tighter opacity-80">{{ $item['year'] }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- [5] 가운데: 흐르는 세로 라인 (FOEx 색상) --}}
        <div class="hidden lg:block absolute left-[calc(50%-1px)] top-[10rem] bottom-[20rem] w-[2px] bg-gray-100 overflow-hidden">
            {{-- scrollPercent에 맞춰 높이가 실시간으로 변함 --}}
            <div class="w-full bg-[#f9b417] shadow-[0_0_15px_rgba(249,180,23,0.6)] transition-all duration-150 ease-out"
                 :style="'height: ' + scrollPercent + '%'">
            </div>
        </div>

        {{-- [6] 오른쪽: 연혁 텍스트 내용 --}}
        <div class="lg:w-1/2 flex flex-col gap-[20rem] pb-[40rem] order-1 lg:order-2">
            @foreach($historyYears as $item)
                <div id="year-{{ $item['year'] }}"
                     x-intersect:enter.margin.-40%="activeYear = '{{ $item['year'] }}'" 
                     class="min-h-[40rem] flex flex-col justify-center pl-[6rem] relative scroll-mt-60">
                    
                    {{-- 타임라인 포인트 (가운데 선과 일치) --}}
                    <div class="absolute left-[-1.1rem] lg:left-[-5.1rem] top-[1.2rem] w-[2.2rem] h-[2.2rem] rounded-full border-4 border-white z-10 transition-all duration-500"
                         :class="activeYear === '{{ $item['year'] }}' ? 'bg-[#f9b417] scale-125 shadow-[0_0_10px_rgba(249,180,23,0.8)]' : 'bg-gray-200'">
                    </div>

                    <span class="text-[#f9b417] text-[2.8rem] font-black mb-[1rem] inline-block tracking-tighter">{{ $item['year'] }}</span>
                    @if(!empty($item['slogan']))
                        <h3 class="text-[3.6rem] font-extrabold text-gray-900 mb-[5rem] tracking-tight leading-tight">{{ $item['slogan'] }}</h3>
                    @endif
                    
                    <ul class="space-y-[3.5rem]">
                        @foreach($item['events'] as $event)
                            <li class="flex gap-[3rem] items-start text-[2rem] text-gray-600">
                                <span class="font-bold text-gray-900 shrink-0 w-[6rem] pt-1">{{ $event['month'] }}</span>
                                <span class="leading-relaxed font-medium">{{ $event['content'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@extends('layouts.foex')

@section('title', __('menu.schedule'))

@section('content')
    <style>
        [x-cloak] { display: none !important; }
        /* 달력 셀 높이 및 반응형 조정 */
        .calendar-cell { min-height: 15rem; }
        @media (max-width: 768px) {
            .calendar-cell { min-height: 10rem; }
        }
        
        /* 스크롤바 숨기기 (이벤트가 많을 때용) */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* 애니메이션 */
        .fade-enter { animation: fadeIn 0.4s ease-out forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(1rem); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        <img src="{{ asset('images/pr/schedule_hero.jpg') }}" alt="FOEx Schedule" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/calendar,planner'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                PR Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('pr.schedule_title') }}</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">{{ __('pr.schedule_desc') }}</p>
        </div>
    </section>

    {{-- [2] 달력 영역 --}}
    <div class="py-[10rem] bg-white" x-data='calendarData(@json($events))' x-cloak>
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
            
            {{-- 1. 색깔별 범례 (Legend) - 디자인 업그레이드 --}}
            <div class="flex flex-wrap justify-center gap-[1.5rem] md:gap-[2.5rem] mb-[6rem] pb-[4rem] border-b border-gray-100">
                @php
                    $legends = [
                        ['key' => 'I', 'color' => '#ffbb00', 'label' => __('schedule.legend_iecex')],
                        ['key' => 'P', 'color' => '#A855F7', 'label' => __('schedule.legend_explosion')],
                        ['key' => 'M', 'color' => '#3B82F6', 'label' => __('schedule.legend_motor')],
                        ['key' => 'H', 'color' => '#EF4444', 'label' => __('schedule.legend_hydrogen')],
                        ['key' => 'S', 'color' => '#06B6D4', 'label' => __('schedule.legend_sil')],
                        ['key' => 'N', 'color' => '#22C55E', 'label' => __('schedule.legend_notice')],
                        ['key' => 'E', 'color' => '#9D174D', 'label' => __('schedule.legend_etc')],
                    ];
                @endphp

                @foreach($legends as $lg)
                <div class="flex items-center group cursor-default">
                    <span class="w-[3.5rem] h-[3.5rem] rounded-[0.8rem] flex items-center justify-center text-white text-[1.6rem] font-black shadow-sm transition-transform group-hover:scale-110" style="background-color: {{ $lg['color'] }}">
                        {{ $lg['key'] }}
                    </span>
                    <span class="ml-[1rem] text-[1.5rem] text-gray-600 font-bold group-hover:text-gray-900 transition-colors">{{ $lg['label'] }}</span>
                </div>
                @endforeach
            </div>

            {{-- 2. 달력 헤더 (년/월 컨트롤러) --}}
            <div class="flex items-center justify-center gap-[4rem] mb-[6rem]">
                <button @click="prevMonth()" class="w-[6rem] h-[6rem] rounded-full bg-white border border-gray-200 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 text-gray-400 shadow-sm flex items-center justify-center transition-all">
                    <i class="xi-angle-left text-[2.4rem]"></i>
                </button>
                <h2 class="text-[3.5rem] md:text-[5rem] font-black text-gray-900 tracking-[0.2rem] min-w-[28rem] text-center select-none flex items-center justify-center gap-[1.5rem]">
                    <span x-text="year"></span>.<span x-text="String(month + 1).padStart(2, '0')" class="text-blue-600"></span>
                </h2>
                <button @click="nextMonth()" class="w-[6rem] h-[6rem] rounded-full bg-white border border-gray-200 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 text-gray-400 shadow-sm flex items-center justify-center transition-all">
                    <i class="xi-angle-right text-[2.4rem]"></i>
                </button>
            </div>

            {{-- 3. 메인 달력 그리드 --}}
            <div class="bg-white border border-gray-200 rounded-[2.5rem] shadow-[0_2rem_5rem_rgba(0,0,0,0.04)] overflow-hidden">
                {{-- 요일 헤더 --}}
                <div class="grid grid-cols-7 text-center bg-gray-50 border-b border-gray-200">
                    <div class="py-[2rem] text-red-500 font-black text-[1.8rem]">{{ __('common.sun') }}</div>
                    <div class="py-[2rem] text-gray-700 font-black text-[1.8rem]">{{ __('common.mon') }}</div>
                    <div class="py-[2rem] text-gray-700 font-black text-[1.8rem]">{{ __('common.tue') }}</div>
                    <div class="py-[2rem] text-gray-700 font-black text-[1.8rem]">{{ __('common.wed') }}</div>
                    <div class="py-[2rem] text-gray-700 font-black text-[1.8rem]">{{ __('common.thu') }}</div>
                    <div class="py-[2rem] text-gray-700 font-black text-[1.8rem]">{{ __('common.fri') }}</div>
                    <div class="py-[2rem] text-blue-600 font-black text-[1.8rem]">{{ __('common.sat') }}</div>
                </div>

                {{-- 날짜 그리드 --}}
                <div class="grid grid-cols-7 bg-white">
                    {{-- 요일 밀림 방지 빈칸 --}}
                    <template x-for="blank in blanks">
                        <div class="border-b border-r border-gray-100 calendar-cell bg-gray-50/40"></div>
                    </template>

                    {{-- 실제 날짜 --}}
                    <template x-for="(date, index) in daysInMonth" :key="index">
                        <div class="border-b border-r border-gray-100 calendar-cell p-[1.5rem] relative group hover:bg-blue-50/30 transition-colors">
                            {{-- 날짜 숫자 --}}
                            <span x-text="date" class="text-[1.6rem] font-black block mb-[1rem]" 
                                  :class="{ 
                                      'text-red-500': isSunday(date), 
                                      'text-blue-600': isSaturday(date), 
                                      'text-gray-800': !isSunday(date) && !isSaturday(date) 
                                  }"></span>
                            
                            {{-- 이벤트 리스트 --}}
                            <div class="space-y-[0.6rem] overflow-y-auto no-scrollbar max-h-[10rem]">
                                <template x-for="event in getEvents(date)">
                                    <div class="px-[1rem] py-[0.5rem] rounded-[0.6rem] cursor-pointer hover:brightness-90 transition-all shadow-sm text-[1.2rem] font-bold truncate text-white fade-enter"
                                         :style="{ backgroundColor: event.color }" :title="event.title">
                                        <span x-text="event.title"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            {{-- 4. 하단 안내 텍스트 --}}
            <div class="mt-[4rem] text-center">
                <p class="text-gray-400 text-[1.5rem]">※ 교육 신청 및 상세 문의는 고객지원 메뉴를 이용해 주시기 바랍니다.</p>
            </div>
        </div>
    </div>

    {{-- Alpine.js Logic --}}
    <script>
        function calendarData(backendEvents) {
            const now = new Date();
            return {
                today: now,
                year: now.getFullYear(), 
                month: now.getMonth(),
                events: backendEvents || [],

                get blanks() {
                    const firstDay = new Date(this.year, this.month, 1).getDay();
                    return Array.from({ length: firstDay }, (_, i) => i);
                },
                get daysInMonth() {
                    return new Date(this.year, this.month + 1, 0).getDate();
                },
                getEvents(day) {
                    const y = this.year;
                    const m = String(this.month + 1).padStart(2, '0');
                    const d = String(day).padStart(2, '0');
                    const dateStr = `${y}-${m}-${d}`;
                    return this.events.filter(e => e.date_str === dateStr);
                },
                isSunday(date) { return new Date(this.year, this.month, date).getDay() === 0; },
                isSaturday(date) { return new Date(this.year, this.month, date).getDay() === 6; },
                prevMonth() { 
                    if (this.month === 0) { this.month = 11; this.year--; } 
                    else { this.month--; } 
                },
                nextMonth() { 
                    if (this.month === 11) { this.month = 0; this.year++; } 
                    else { this.month++; } 
                }
            }
        }
    </script>
@endsection
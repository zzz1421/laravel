@extends('layouts.foex')

@section('title', __('menu.schedule'))

@section('content')
    <style>
        [x-cloak] { display: none !important; }
        .calendar-cell { min-height: 120px; }
        .legend-item { @apply flex items-center gap-1.5 text-xs font-medium text-gray-600; }
        .legend-box { @apply w-4 h-4 rounded flex items-center justify-center text-[10px] text-white font-bold; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.schedule_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.schedule_desc') }}</p>
        </div>
    </div>

    <div class="py-12 bg-white" x-data='calendarData(@json($events))' x-cloak>
        <div class="max-w-7xl mx-auto px-4">
            
            {{-- 1. 색깔별 범례 (Legend) --}}
            <div class="flex flex-wrap justify-center gap-4 sm:gap-6 mb-10 pb-8 border-b border-gray-100">
                
                {{-- IECEx (I) -> #ffbb00 (신규 색상) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#ffbb00] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        I
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_iecex') }}</span>
                </div>

                {{-- 방폭 (P) -> 보라색 (유지) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#A855F7] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        P
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_explosion') }}</span>
                </div>

                {{-- 모터 (M) -> #3B82F6 (구 IECEx 파란색) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#3B82F6] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        M
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_motor') }}</span>
                </div>

                {{-- 수소 (H) -> 빨간색 (유지) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#EF4444] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        H
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_hydrogen') }}</span>
                </div>

                {{-- SIL (S) -> 하늘색 (유지) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#06B6D4] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        S
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_sil') }}</span>
                </div>

                {{-- 공지 (N) -> #22C55E (구 모터 초록색) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#22C55E] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        N
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_notice') }}</span>
                </div>

                {{-- 기타 (E) -> 자주색 (유지) --}}
                <div class="flex items-center group">
                    <span class="w-10 h-10 rounded-lg bg-[#9D174D] text-white flex items-center justify-center shadow-sm text-lg font-bold group-hover:scale-110 transition-transform duration-200">
                        E
                    </span>
                    <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('schedule.legend_etc') }}</span>
                </div>

            </div>

            {{-- 2. 달력 헤더 (년/월 선택) --}}
            <div class="flex items-center justify-center gap-6 mb-10">
                <button @click="prevMonth()" class="w-12 h-12 rounded-full bg-white border border-gray-300 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 text-gray-500 shadow-sm flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                </button>
                <h2 class="text-4xl font-bold text-gray-800 tracking-widest min-w-[220px] text-center select-none flex items-center justify-center gap-2">
                    <span x-text="year"></span>.<span x-text="String(month + 1).padStart(2, '0')" class="text-blue-700"></span>
                </h2>
                <button @click="nextMonth()" class="w-12 h-12 rounded-full bg-white border border-gray-300 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 text-gray-500 shadow-sm flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                </button>
            </div>

            {{-- 3. 달력 그리드 --}}
            <div class="border-t border-l border-gray-200 shadow-sm overflow-hidden rounded-lg">
                <div class="grid grid-cols-7 text-center bg-gray-50 border-b border-gray-200">
                    <div class="py-3 text-red-500 font-bold">{{ __('common.sun') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('common.mon') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('common.tue') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('common.wed') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('common.thu') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('common.fri') }}</div>
                    <div class="py-3 text-blue-600 font-bold">{{ __('common.sat') }}</div>
                </div>

                <div class="grid grid-cols-7 bg-white">
                    {{-- 요일 밀림 방지 빈칸 --}}
                    <template x-for="blank in blanks">
                        <div class="border-b border-r border-gray-200 calendar-cell bg-gray-50/30"></div>
                    </template>

                    {{-- 실제 날짜 --}}
                    <template x-for="(date, index) in daysInMonth" :key="index">
                        <div class="border-b border-r border-gray-200 calendar-cell p-2 relative group hover:bg-gray-50 transition">
                            <span x-text="date" class="text-sm font-bold block mb-2" 
                                  :class="{ 'text-red-500': isSunday(date), 'text-blue-600': isSaturday(date), 'text-gray-700': !isSunday(date) && !isSaturday(date) }"></span>
                            
                            <div class="space-y-1 mt-1">
                                <template x-for="event in getEvents(date)">
                                    <div class="px-2 py-1 rounded cursor-pointer hover:opacity-80 transition shadow-sm mb-1 text-[10px] md:text-xs font-medium truncate text-white"
                                         :style="{ backgroundColor: event.color }" :title="event.title">
                                        <span x-text="event.title"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

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
                prevMonth() { if (this.month === 0) { this.month = 11; this.year--; } else { this.month--; } },
                nextMonth() { if (this.month === 11) { this.month = 0; this.year++; } else { this.month++; } }
            }
        }
    </script>
@endsection
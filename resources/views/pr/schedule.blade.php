@extends('layouts.foex')

@section('title', __('menu.schedule'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .calendar-cell { min-height: 120px; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.schedule_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.schedule_desc') }}</p>
        </div>
    </div>

    <div class="py-16 bg-white" x-data="calendarData()">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex items-center justify-center gap-6 mb-10">
                <button @click="prevMonth()" class="w-12 h-12 rounded-full bg-white border border-gray-300 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 text-gray-500 shadow-sm flex items-center justify-center transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 group-hover:-translate-x-0.5 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
                
                <h2 class="text-4xl font-bold text-gray-800 tracking-widest min-w-[220px] text-center select-none flex items-center justify-center gap-2">
                    <span x-text="year"></span>.<span x-text="String(month + 1).padStart(2, '0')" class="text-blue-700"></span>
                </h2>
                
                <button @click="nextMonth()" class="w-12 h-12 rounded-full bg-white border border-gray-300 hover:border-blue-500 hover:bg-blue-50 hover:text-blue-600 text-gray-500 shadow-sm flex items-center justify-center transition-all duration-200 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6 group-hover:translate-x-0.5 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-wrap gap-4 mb-6 text-xs font-medium text-gray-600 border-t border-b border-gray-100 py-4 justify-center md:justify-start">
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-blue-500 rounded-sm"></span> {{ __('pr.cat_copc') }}</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-purple-500 rounded-sm"></span> {{ __('pr.cat_ex') }}</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-green-500 rounded-sm"></span> {{ __('pr.cat_motor') }}</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-orange-500 rounded-sm"></span> {{ __('pr.cat_hydro') }}</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-cyan-400 rounded-sm"></span> {{ __('pr.cat_sil') }}</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-lime-500 rounded-sm"></span> {{ __('pr.cat_notice') }}</div>
                <div class="flex items-center gap-1"><span class="w-3 h-3 bg-rose-800 rounded-sm"></span> {{ __('pr.cat_etc') }}</div>
            </div>

            <div class="border-t border-l border-gray-200 shadow-sm">
                <div class="grid grid-cols-7 text-center bg-gray-50 border-b border-gray-200">
                    <div class="py-3 text-red-500 font-bold">{{ __('pr.day_sun') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('pr.day_mon') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('pr.day_tue') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('pr.day_wed') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('pr.day_thu') }}</div>
                    <div class="py-3 text-gray-700 font-bold">{{ __('pr.day_fri') }}</div>
                    <div class="py-3 text-blue-600 font-bold">{{ __('pr.day_sat') }}</div>
                </div>

                <div class="grid grid-cols-7 bg-white">
                    <template x-for="blank in blanks">
                        <div class="border-b border-r border-gray-200 calendar-cell bg-gray-50/30"></div>
                    </template>

                    <template x-for="(date, index) in daysInMonth" :key="index">
                        <div class="border-b border-r border-gray-200 calendar-cell p-2 relative group hover:bg-gray-50 transition">
                            <span x-text="date" 
                                  class="text-sm font-bold block mb-2"
                                  :class="{
                                      'text-red-500': isSunday(date),
                                      'text-blue-600': isSaturday(date),
                                      'text-gray-700': !isSunday(date) && !isSaturday(date)
                                  }">
                            </span>

                            <div class="space-y-1">
                                <template x-for="event in getEvents(date)">
                                    <div class="text-[10px] md:text-xs px-2 py-1 rounded truncate cursor-pointer hover:opacity-80 transition text-white font-medium"
                                         :class="event.color">
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
        function calendarData() {
            return {
                today: new Date(),
                year: 2026, 
                month: 0, 

                // Dummy Events (나중에 DB 연동 시 이 부분을 Controller에서 주입받아야 함)
                events: [
                    { date: 6, title: '[Schedule] CES 2026', type: 'notice', color: 'bg-lime-600' },
                    { date: 7, title: '[Schedule] CES 2026', type: 'notice', color: 'bg-lime-600' },
                    { date: 8, title: '[Schedule] CES 2026', type: 'notice', color: 'bg-lime-600' },
                    { date: 9, title: '[Schedule] CES 2026', type: 'notice', color: 'bg-lime-600' },
                    { date: 12, title: 'IECEx Training Start', type: 'edu', color: 'bg-blue-500' },
                    { date: 24, title: 'Lunar New Year', type: 'etc', color: 'bg-rose-800' }
                ],

                get blanks() {
                    const firstDay = new Date(this.year, this.month, 1).getDay();
                    return Array(firstDay);
                },
                get daysInMonth() {
                    return new Date(this.year, this.month + 1, 0).getDate();
                },
                getEvents(date) {
                    return this.events.filter(e => e.date === date);
                },
                isSunday(date) { return new Date(this.year, this.month, date).getDay() === 0; },
                isSaturday(date) { return new Date(this.year, this.month, date).getDay() === 6; },
                prevMonth() { if (this.month === 0) { this.month = 11; this.year--; } else { this.month--; } },
                nextMonth() { if (this.month === 11) { this.month = 0; this.year++; } else { this.month++; } }
            }
        }
    </script>

@endsection
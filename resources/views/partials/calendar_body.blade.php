@php
    $startOfMonth = $currentDate->copy()->startOfMonth();
    $daysInMonth = $currentDate->daysInMonth;
    $startDayOfWeek = $startOfMonth->dayOfWeek; 
    $totalCells = 42; 
    $today = \Carbon\Carbon::now();
@endphp

<div class="w-full h-full flex flex-col bg-white">
    
    {{-- 네비게이션 (시안 추출 SVG 적용) --}}
    <div class="flex items-center justify-center gap-[6rem] py-[3rem] border-b border-gray-200 bg-white">
        
        {{-- 이전달 버튼 --}}
        <button @click.prevent="changeMonth({{ $prevDate->year }}, {{ $prevDate->month }})" 
                class="text-gray-400 hover:text-[#f9b417] transition-colors p-[1rem] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[1.8rem] h-[2.5rem]" viewBox="0 0 13 19" fill="none">
                {{-- stroke를 currentColor로 바꿔서 hover 시 색상이 변하게 합니다 --}}
                <path d="M10.9953 16.6475L2 9.32388L10.9953 2.0003" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        {{-- 현재 연도.월 --}}
        <span class="text-[2.8rem] font-black text-gray-900 tracking-tight w-[18rem] text-center">
            {{ $currentDate->format('Y. m') }}
        </span>

        {{-- 다음달 버튼 --}}
        <button @click.prevent="changeMonth({{ $nextDate->year }}, {{ $nextDate->month }})" 
                class="text-gray-400 hover:text-[#f9b417] transition-colors p-[1rem] flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[1.8rem] h-[2.5rem]" viewBox="0 0 13 19" fill="none">
                {{-- stroke를 currentColor로 바꿔서 hover 시 색상이 변하게 합니다 --}}
                <path d="M2.00003 2L10.9954 9.32358L2.00003 16.6472" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    {{-- 그리드 영역: h-full을 통해 부모의 95rem을 꽉 채웁니다. --}}
    <div class="flex-1 grid grid-cols-7 grid-rows-[auto_repeat(6,1fr)] bg-white border-l border-gray-200 min-h-0">
        
        {{-- 요일 헤더 --}}
        @foreach(['일', '월', '화', '수', '목', '금', '토'] as $index => $day)
            <div class="py-[1.5rem] border-r border-b border-gray-200 text-[1.6rem] font-bold text-center bg-[#f8f9fa] {{ $index == 0 ? 'text-red-500' : ($index == 6 ? 'text-blue-500' : 'text-gray-800') }}">
                {{ $day }}
            </div>
        @endforeach

        @for($i = 0; $i < $totalCells; $i++)
            @php
                $dayNumber = $i - $startDayOfWeek + 1;
                $loopDate = ($dayNumber > 0 && $dayNumber <= $daysInMonth) ? $currentDate->copy()->day($dayNumber) : null;
            @endphp

            <div class="h-full border-r border-b border-gray-200 p-[1.5rem] flex flex-col items-end relative overflow-hidden group {{ !$loopDate ? 'bg-gray-50/30' : 'hover:bg-gray-50' }} transition-colors">
                
                @if($loopDate)
                    @php
                        $isSunday = $loopDate->isSunday();
                        $isSaturday = $loopDate->isSaturday();
                        $isToday = $loopDate->isToday();
                    @endphp

                    {{-- 날짜 숫자 (다시 크게!) --}}
                    @if($isToday)
                        <span class="rounded-full bg-[#f9b417] text-gray-900 flex items-center justify-center h-[3.5rem] w-[3.5rem] font-bold text-[1.6rem] shadow-sm mb-[0.8rem]">
                            {{ $dayNumber }}
                        </span>
                    @else
                        <span class="text-[1.6rem] font-bold mb-[0.8rem] {{ $isSunday ? 'text-red-500' : ($isSaturday ? 'text-blue-500' : 'text-gray-800') }}">
                            {{ $dayNumber }}
                        </span>
                    @endif

                    {{-- 일정 리스트 (간격 여유 있게) --}}
                    <div class="w-full flex-1 flex flex-col gap-[0.5rem] text-left overflow-y-auto no-scrollbar">
                        @if(isset($schedules[$dayNumber]))
                            @foreach($schedules[$dayNumber] as $item)
                                <span class="rounded-[0.4rem] font-bold text-[1.3rem] px-[1rem] py-[0.5rem] w-full leading-tight text-white truncate shadow-sm transition-transform hover:scale-[1.02]" 
                                      style="background-color: {{ $item->color ?? '#f39c12' }}" 
                                      title="{{ $item->title }}">
                                    {{ $item->title }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                @endif
            </div>
        @endfor
    </div>
</div>
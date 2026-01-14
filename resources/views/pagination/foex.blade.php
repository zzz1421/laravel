@if ($paginator->hasPages())
    @php
        $link_limit = 5; // 블록 당 페이지 수
        $current_page = $paginator->currentPage();
        $last_page = $paginator->lastPage();
        
        // 현재 블록의 시작과 끝 계산
        // 예: 현재 3페이지 -> start: 1, end: 5
        $start = (ceil($current_page / $link_limit) - 1) * $link_limit + 1;
        $end = $start + $link_limit - 1;
        
        if ($end > $last_page) {
            $end = $last_page;
        }

        // 이전 블록의 마지막 페이지 (예: 현재 6페이지면 5페이지로 이동)
        $prev_block_page = $start - 1;
        
        // 다음 블록의 시작 페이지 (예: 현재 3페이지면 6페이지로 이동)
        $next_block_page = $end + 1;
    @endphp

    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center gap-1">
        
        {{-- [<<] 맨 처음 페이지로 --}}
        @if ($current_page > 1)
            <a href="{{ $paginator->url(1) }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 transition" title="처음">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>
            </a>
        @else
            <span class="w-8 h-8 flex items-center justify-center border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                </svg>
            </span>
        @endif

        {{-- [<] 이전 블록으로 이동 (예: 6~10에서 누르면 5로 이동) --}}
        @if ($start > 1)
            <a href="{{ $paginator->url($prev_block_page) }}" rel="prev" class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 transition" title="이전 블록">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
        @else
            <span class="w-8 h-8 flex items-center justify-center border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
        @endif

        {{-- [1]~[5] 숫자 표시 --}}
        @for ($i = $start; $i <= $end; $i++)
            @if ($current_page == $i)
                <span aria-current="page" class="w-8 h-8 flex items-center justify-center border border-gray-900 bg-gray-900 text-white font-bold text-sm">
                    {{ $i }}
                </span>
            @else
                <a href="{{ $paginator->url($i) }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 transition text-sm">
                    {{ $i }}
                </a>
            @endif
        @endfor

        {{-- [>] 다음 블록으로 이동 (예: 1~5에서 누르면 6으로 이동) --}}
        @if ($end < $last_page)
            <a href="{{ $paginator->url($next_block_page) }}" rel="next" class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 transition" title="다음 블록">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        @else
            <span class="w-8 h-8 flex items-center justify-center border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        @endif

        {{-- [>>] 맨 끝 페이지로 --}}
        @if ($current_page < $last_page)
            <a href="{{ $paginator->url($last_page) }}" class="w-8 h-8 flex items-center justify-center border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 transition" title="마지막">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        @else
            <span class="w-8 h-8 flex items-center justify-center border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        @endif

    </nav>
@endif
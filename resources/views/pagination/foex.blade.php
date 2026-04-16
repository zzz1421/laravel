@if ($paginator->hasPages())
    <nav class="flex items-center justify-center gap-[1.5rem]" aria-label="Pagination">
        
        {{-- [1] 이전 페이지 (Previous) 버튼 --}}
        @if ($paginator->onFirstPage())
            <span class="flex items-center justify-center w-[6.5rem] h-[6.5rem] rounded-full bg-gray-50 text-gray-300 cursor-not-allowed text-[2.4rem]">
                <i class="xi-angle-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center w-[6.5rem] h-[6.5rem] rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900 hover:shadow-md transition-all duration-300 text-[2.4rem]">
                <i class="xi-angle-left"></i>
            </a>
        @endif

        {{-- [2] 페이지 번호 (Page Numbers) --}}
        @foreach ($elements as $element)
            {{-- "..." 생략 기호 --}}
            @if (is_string($element))
                <span class="flex items-center justify-center w-[6.5rem] h-[6.5rem] text-gray-400 text-[2.2rem] font-bold">
                    {{ $element }}
                </span>
            @endif

            {{-- 번호 링크 배열 --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- 현재 활성화된 페이지 (블랙 테마 포인트) --}}
                        <span class="flex items-center justify-center w-[6.5rem] h-[6.5rem] rounded-full bg-gray-900 text-white font-bold text-[2.2rem] shadow-[0_0.5rem_1.5rem_rgba(0,0,0,0.2)] transform scale-110 transition-transform">
                            {{ $page }}
                        </span>
                    @else
                        {{-- 다른 페이지 번호 --}}
                        <a href="{{ $url }}" class="flex items-center justify-center w-[6.5rem] h-[6.5rem] rounded-full bg-white border border-gray-200 text-gray-500 font-medium hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300 transition-all duration-300 text-[2.2rem]">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- [3] 다음 페이지 (Next) 버튼 --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center w-[6.5rem] h-[6.5rem] rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-gray-900 hover:shadow-md transition-all duration-300 text-[2.4rem]">
                <i class="xi-angle-right"></i>
            </a>
        @else
            <span class="flex items-center justify-center w-[6.5rem] h-[6.5rem] rounded-full bg-gray-50 text-gray-300 cursor-not-allowed text-[2.4rem]">
                <i class="xi-angle-right"></i>
            </span>
        @endif
        
    </nav>
@endif
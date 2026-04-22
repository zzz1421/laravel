{{-- [섹션 1] 히어로 --}}
<section id="hero" class="relative w-full bg-white" style="height: 200vh;">
    {{-- 자석 포인트는 유지하되 위치를 정확히 맞춤 --}}
    <div class="absolute top-0 w-full h-[1px]" style="scroll-snap-align: start;"></div>
    <div class="absolute top-[100vh] w-full h-[1px]" style="scroll-snap-align: start;"></div>

    {{-- 고정 영역: 헤더(80px) 바로 아래 붙임 --}}
    <div class="sticky top-0 w-full h-screen overflow-hidden bg-white">
        
        {{-- [텍스트 레이어] --}}
        <div class="absolute inset-0 z-30 flex flex-col items-center pointer-events-none">
            {{-- 🚨 pt를 25vh -> 12vh로 줄여서 타이틀을 위로 올렸습니다 --}}
            <div class="w-full max-w-[140rem] mx-auto px-[4rem] pt-[12vh] md:pl-[10rem]">
                <div class="flex flex-col text-left w-full">
                    <p class="font-['Roboto'] font-[900]" style="color: #F97316; font-size: clamp(1.8rem, 1.25vw, 2.4rem);">포엑스 소개</p>
                    
                    <h1 class="w-full font-['Noto_Sans_KR'] font-[900] leading-tight mt-[1.5vh] transition-colors duration-500 break-keep" 
                        style="font-size: clamp(3.5rem, 3.125vw, 6rem);"
                        :class="progress > 0.9 ? 'text-white' : 'text-[#303031]'">
                        {!! __('intro.hero_title') !!}
                    </h1>

                    <p class="font-['Noto_Sans_KR'] font-[600] leading-relaxed mt-[2vh] transition-colors duration-500 break-keep" 
                       style="font-size: clamp(1.8rem, 1.56vw, 3rem);"
                       :class="progress > 0.9 ? 'text-gray-200' : 'text-[#303031]'">
                        {!! __('intro.hero_desc') !!}
                    </p>
                </div>
            </div>
        </div>

        {{-- [이미지 레이어] --}}
        <div class="absolute inset-0 z-20 will-change-transform"
             :style="`transform: translateY(${(1 - progress) * 65}vh);`"
             style="transform: translateY(vh);">
            <div class="w-full h-full relative overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center" 
                     style="background-image: url('{{ asset('images/hero-intro.png') }}');">
                    <div class="absolute inset-0 bg-black/40" :style="`opacity: ${progress}`"></div>
                </div>
            </div>
        </div>

        <div class="absolute inset-0 bg-white z-10"></div>
    </div>
</section>
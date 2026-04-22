{{-- resources/views/components/page-hero.blade.php --}}
@props([
    'category' => '',
    'title' => '',
    'desc' => '',
    'bgImage' => 'images/business/default_hero.jpg' // 기본 배경 이미지 경로
])

<section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
    
    {{-- 배경 이미지 --}}
    <img src="{{ asset($bgImage) }}" 
        alt="{{ strip_tags($title) }}" 
        class="absolute inset-0 w-full h-full object-cover opacity-50"
        onerror="this.src='https://loremflickr.com/1920/1080/architecture,office,building'">

    {{-- 그라데이션 오버레이 --}}
    <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-[#1a1c1e] pointer-events-none z-0"></div>

    {{-- 텍스트 컨텐츠 --}}
    <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
        
        {{-- 카테고리 (값이 있을 때만 렌더링) --}}
        @if($category)
        <span class="inline-block px-[2rem] py-[0.8rem] bg-[#f9b417]/10 border border-[#f9b417]/20 rounded-full text-[#f9b417] text-[1.4rem] font-bold tracking-widest uppercase mb-[2rem] backdrop-blur-sm">
            {{ $category }}
        </span>
        @endif

        {{-- 메인 타이틀 --}}
        <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">
            {!! $title !!}
        </h1>

        {{-- 설명 텍스트 (값이 있을 때만 렌더링) --}}
        @if($desc)
        <p class="text-[1.8rem] md:text-[2.2rem] text-gray-200 font-medium break-keep opacity-90">
            {!! $desc !!}
        </p>
        @endif

    </div>
</section>
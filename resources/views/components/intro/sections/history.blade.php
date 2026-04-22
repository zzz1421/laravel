{{-- [섹션 5] 연혁 (걸어온 길) --}}
<section id="history" class="relative w-full flex flex-col justify-center py-[15rem] bg-cover bg-center" 
         style="background-image: url('{{ asset('images/intro-oil.jpg') }}');">
    
    {{-- 🚨 배경 그라데이션 오버레이 🚨 --}}
    {{-- 시안의 수치를 그대로 반영: 좌측은 하얗게, 우측은 은은한 노란빛이 돌도록 처리 --}}
    <div class="absolute inset-0 bg-[linear-gradient(99deg,#FFF_53.43%,#FFFBC7_75.57%)] opacity-60 z-0"></div>
    
    <div class="w-full max-w-[140rem] mx-auto px-[4rem] relative z-10" data-aos="fade-right">
        
        {{-- 타이틀 --}}
        <h2 class="text-[3.6rem] md:text-[5rem] font-black text-gray-900 mb-[2.5rem] tracking-tight">
            {{ __('intro.hist_title') }}
        </h2>
        
        {{-- 서브 텍스트 (폰트 굵기 700 이상 유지) --}}
        <p class="text-gray-800 text-[1.6rem] md:text-[1.8rem] font-bold mb-[5rem] leading-[1.6] break-keep">
            {!! __('intro.hist_desc') !!}
        </p>
        
        {{-- 연혁 자세히 보기 버튼 --}}
        <a href="{{ route('company.history') }}" 
           class="inline-flex items-center justify-center bg-white text-gray-900 font-bold text-[1.5rem] py-[1.5rem] px-[3rem] border border-gray-200 rounded-[0.4rem] shadow-[0_0.5rem_1.5rem_rgba(0,0,0,0.05)] hover:bg-[#f9b417] hover:text-white hover:border-[#f9b417] transition-colors duration-300 group">
            {{ __('intro.hist_btn') }} 
            {{-- 기존 폰트 아이콘(xi-) 대신 제작한 화살표 컴포넌트 적용 --}}
            <x-icons.common.right-arrow class="ml-[0.8rem] w-[0.7rem] h-[1.1rem] transition-transform group-hover:translate-x-1" />
        </a>
        
    </div>
</section>
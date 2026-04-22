@php
    // 기업 개요 항목 데이터 정의
    $overviews = [
        ['title' => __('intro.ov_company'), 'content' => __('intro.ov_company_val')],
        ['title' => __('intro.ov_ceo'),     'content' => __('intro.ov_ceo_val')],
        ['title' => __('intro.ov_est'),     'content' => __('intro.ov_est_val')],
        ['title' => __('intro.ov_address'), 'content' => __('intro.ov_address_val')],
    ];
@endphp

{{-- [섹션 3] 기업 개요 --}}
<section id="overview" class="relative bg-white flex flex-col justify-center px-[4rem] md:px-[18rem] py-[12rem]">
    <div class="w-full max-w-[140rem] mx-auto">
        
        {{-- 상단 타이틀 영역 --}}
        <div class="mb-[6rem]" data-aos="fade-up">
            <p class="text-[#f9b417] font-bold text-[1.6rem] mb-[1.5rem] tracking-widest">
                {{ __('intro.ov_subtitle') }}
            </p>
            <p class="text-gray-900 text-[2.2rem] md:text-[2.6rem] font-bold leading-[1.6] tracking-tight break-keep">
                {!! __('intro.ov_title') !!}
            </p>
        </div>
        
        {{-- 하단 정보 박스 영역 (독립된 Flex Box 구조) --}}
        <div class="flex flex-col space-y-[1.5rem]" data-aos="fade-up" data-aos-delay="100">
            
            {{-- 1. 일반 항목들 반복 출력 --}}
            @foreach($overviews as $item)
                <div class="flex flex-col md:flex-row gap-[1.5rem]">
                    {{-- 좌측: 제목 박스 --}}
                    <div class="w-full md:w-[25rem] bg-[#FFF9E6] border border-gray-200 rounded-[0.8rem] flex items-center justify-center py-[2.5rem] px-[2rem] shadow-sm">
                        <span class="font-bold text-gray-900 text-[1.8rem]">{{ $item['title'] }}</span>
                    </div>
                    {{-- 우측: 내용 박스 --}}
                    <div class="flex-1 bg-[#f8f9fa] border border-gray-200 rounded-[0.8rem] flex items-center py-[2.5rem] px-[4rem] shadow-sm">
                        <span class="text-gray-700 text-[1.8rem] font-medium break-keep">{{ $item['content'] }}</span>
                    </div>
                </div>
            @endforeach

            {{-- 2. 보유인증 항목 (리스트 형태 - 별도 구성) --}}
            <div class="flex flex-col md:flex-row gap-[1.5rem]">
                {{-- 좌측: 제목 박스 --}}
                <div class="w-full md:w-[25rem] bg-[#FFF9E6] border border-gray-200 rounded-[0.8rem] flex items-center justify-center py-[2.5rem] px-[2rem] shadow-sm">
                    <span class="font-bold text-gray-900 text-[1.8rem]">{{ __('intro.ov_cert') }}</span>
                </div>
                {{-- 우측: 내용 박스 (불렛 리스트) --}}
                <div class="flex-1 bg-[#f8f9fa] border border-gray-200 rounded-[0.8rem] flex items-center py-[3rem] px-[4rem] shadow-sm">
                    <ul class="space-y-[1rem] text-gray-700 text-[1.8rem] font-medium">
                        {{-- 📝 참고: 인증 항목이 더 많아질 경우 이 부분도 별도 배열로 빼서 루프 돌릴 수 있습니다. --}}
                        <li class="flex items-center">
                            <span class="w-[0.6rem] h-[0.6rem] bg-gray-500 rounded-full mr-[1.5rem]"></span> 
                            {{ __('intro.ov_cert_1') }}
                        </li>
                        <li class="flex items-center">
                            <span class="w-[0.6rem] h-[0.6rem] bg-gray-500 rounded-full mr-[1.5rem]"></span> 
                            {{ __('intro.ov_cert_2') }}
                        </li>
                        <li class="flex items-center">
                            <span class="w-[0.6rem] h-[0.6rem] bg-gray-500 rounded-full mr-[1.5rem]"></span> 
                            {{ __('intro.ov_cert_3') }}
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
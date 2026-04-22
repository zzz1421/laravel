@php
    // 반복되는 그리드 아이템 데이터를 배열로 정리하여 관리를 편하게 합니다.
    $bizItems = [
        ['route' => 'business.education',   'icon' => 'edu',        'lang' => 'biz_edu'],
        ['route' => 'business.consulting',  'icon' => 'consulting', 'lang' => 'biz_consulting'],
        ['route' => 'business.techservice', 'icon' => 'tech',       'lang' => 'biz_tech'],
        ['route' => 'business.engineering', 'icon' => 'eng',        'lang' => 'biz_eng'],
        ['route' => 'business.techservice', 'icon' => 'rnd',        'lang' => 'biz_rnd'],
    ];
@endphp

{{-- [섹션 2] 사업 분야 (핵심 역량) --}}
<section id="competence" class="relative bg-white flex flex-col justify-center px-[4rem] md:px-[18rem] py-[12rem]">
    <div class="w-full max-w-[140rem] mx-auto">
        
        {{-- 상단 텍스트 및 버튼 영역 --}}
        <div class="mb-[8rem]" data-aos="fade-right">
            <p class="text-[#f9b417] font-bold text-[1.6rem] mb-[1.5rem] tracking-widest">
                {{ __('intro.comp_subtitle') }}
            </p>
            <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 mb-[2.5rem] tracking-tight leading-[1.2]">
                {{ __('intro.comp_title') }}
            </h2>
            <div class="max-w-[80rem]"> {{-- 가독성을 위해 너비 제한 추가 가능 --}}
                <p class="text-gray-500 text-[1.6rem] md:text-[1.8rem] mb-[4rem] leading-[1.6] break-keep">
                    {!! __('intro.comp_desc') !!}
                </p>
            </div>
            
            {{-- 사업 소개 버튼 --}}
            <a href="{{ route('business.education') }}" 
               class="inline-flex items-center px-[2.5rem] py-[1.2rem] border-[0.15rem] border-gray-300 text-[1.5rem] font-bold rounded-[0.4rem] text-gray-700 bg-white hover:border-gray-500 hover:bg-gray-50 transition-colors">
                {{ __('intro.comp_btn') }} 
                {{-- 앞서 만든 아이콘 컴포넌트가 있다면 교체 가능, 여기선 기존 xi-아이콘 유지 --}}
                <i class="xi-angle-right-min ml-[0.5rem] text-[1.8rem]"></i>
            </a>
        </div>

        {{-- 하단 5분할 그리드 영역 --}}
        <div class="grid grid-cols-2 md:grid-cols-5 bg-[#f8f9fa] border-y border-gray-200 divide-y md:divide-y-0 md:divide-x divide-gray-200" data-aos="fade-up">
            
            @foreach($bizItems as $item)
                {{-- 각 아이템 카드 --}}
                <div class="p-[5rem] lg:p-[7rem] text-center hover:bg-white hover:shadow-xl transition duration-300 group cursor-pointer" 
                     onclick="location.href='{{ route($item['route']) }}'">
                    
                    <x-dynamic-component 
                        :component="'icons.intro.' . $item['icon']" 
                        class="w-[7rem] h-[7rem] mx-auto mb-[3rem] text-[#303031] group-hover:text-[#f9b417] transition-colors" 
                    />  

                    <h3 class="font-bold text-[#303031] group-hover:text-[#f9b417] transition-colors text-[2rem]">
                        {{ __("intro.{$item['lang']}") }}
                    </h3>
                </div>
            @endforeach

        </div>
        
    </div>
</section>
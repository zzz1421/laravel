@extends('layouts.foex')

@section('title', __('menu.brochure'))

@section('content')

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        {{-- 서재/문서/비즈니스 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/pr/brochure_hero.jpg') }}" alt="FOEx Brochure" class="absolute inset-0 w-full h-full object-cover opacity-50" onerror="this.src='https://loremflickr.com/1920/1080/library,document'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                PR Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('pr.brochure_title') }}</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">{{ __('pr.brochure_desc') }}</p>
        </div>
    </section>

    {{-- [2] 브로슈어 리스트 영역 --}}
    <div class="py-[10rem] bg-white">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
            
            @if($brochures->count() > 0)
                {{-- 4단 그리드 갤러리 뷰 --}}
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-[4rem]">
                    @foreach($brochures as $brochure)
                        <div class="group bg-white rounded-[2rem] border border-gray-200 overflow-hidden hover:shadow-[0_2rem_4rem_rgba(0,0,0,0.08)] hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-[0.5rem] flex flex-col">
                            
                            {{-- 썸네일 영역 (비율 1:1.414, A4 비율 근사치) --}}
                            <div class="aspect-[1/1.4] bg-gray-50 relative overflow-hidden flex-shrink-0">
                                @if($brochure->image_path)
                                    <img src="{{ asset('storage/' . $brochure->image_path) }}" alt="{{ $brochure->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-300">
                                        <i class="xi-book-o text-[6rem]"></i>
                                    </div>
                                @endif
                                
                                {{-- 호버 시 나타나는 다운로드 오버레이 --}}
                                <a href="{{ asset('storage/' . $brochure->pdf_path) }}" download class="absolute inset-0 bg-blue-900/80 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 text-white backdrop-blur-sm z-10">
                                    <div class="w-[6rem] h-[6rem] bg-white text-blue-600 rounded-full flex items-center justify-center mb-[1.5rem] transform translate-y-[2rem] group-hover:translate-y-0 transition-transform duration-300 delay-100">
                                        <i class="xi-download text-[2.4rem]"></i>
                                    </div>
                                    <span class="font-bold text-[1.6rem] tracking-wider transform translate-y-[2rem] group-hover:translate-y-0 transition-transform duration-300 delay-150">PDF 다운로드</span>
                                    <span class="text-blue-200 text-[1.3rem] mt-[0.5rem]">클릭하여 파일 저장</span>
                                </a>
                            </div>

                            {{-- 정보 텍스트 영역 --}}
                            <div class="p-[3rem] flex flex-col flex-grow">
                                <h3 class="font-bold text-gray-900 text-[2rem] mb-[1rem] leading-[1.4] line-clamp-2" title="{{ $brochure->title }}">
                                    {{ $brochure->title }}
                                </h3>
                                <p class="text-[1.4rem] text-gray-400 mb-[2rem] font-medium flex items-center">
                                    <i class="xi-calendar-check mr-[0.5rem]"></i> {{ $brochure->created_at->format('Y.m.d') }}
                                </p>
                                
                                {{-- 하단 고정 버튼 --}}
                                <div class="mt-auto pt-[2rem] border-t border-gray-100">
                                    <a href="{{ asset('storage/' . $brochure->pdf_path) }}" target="_blank" class="flex items-center justify-center w-full py-[1.2rem] bg-gray-50 text-gray-600 hover:bg-blue-600 hover:text-white rounded-[1rem] transition-colors font-bold text-[1.6rem]">
                                        {{ __('common.view_pdf') }} <i class="xi-search ml-[0.5rem]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- 페이지네이션 영역 --}}
                <div class="mt-[8rem]">
                    {{ $brochures->links('pagination.foex') }}
                </div>

            @else
                {{-- 데이터가 없을 때의 Empty State --}}
                <div class="text-center py-[15rem] bg-gray-50 rounded-[2rem] border border-gray-200 border-dashed">
                    <div class="w-[10rem] h-[10rem] bg-white rounded-full flex items-center justify-center mx-auto mb-[3rem] shadow-sm">
                        <i class="xi-book-o text-[4rem] text-gray-300"></i>
                    </div>
                    <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem]">등록된 브로슈어가 없습니다.</h3>
                    <p class="text-[1.6rem] text-gray-500">곧 새로운 홍보 자료가 업데이트될 예정입니다.</p>
                </div>
            @endif

        </div>
    </div>

@endsection
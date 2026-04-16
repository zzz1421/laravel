@extends('layouts.foex')

{{-- 1. 페이지 타이틀 교체 --}}
@section('title', __('education.page_title'))

@section('content')

    {{-- [1] 페이지 헤더 (교육/아카데미 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        {{-- 교육/컨퍼런스/학습 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/service/edu_hero.jpg') }}" alt="FOEx Academy" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/training,classroom'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                FOEX Academy
            </span>
            <h2 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('education.title') }}</h2>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">{{ __('education.subtitle') ?? '실무 중심의 전문가 교육 프로그램을 확인하세요.' }}</p>
        </div>
    </section>

    <div class="py-[10rem] bg-white">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">

            {{-- 알림 메시지 --}}
            @if(session('success'))
                <div class="mb-[4rem] p-[2rem] bg-green-50 border-l-[0.5rem] border-green-500 text-green-700 text-[1.6rem] rounded-r-[1rem] flex items-center shadow-sm">
                    <i class="xi-check-circle mr-[1rem] text-[2rem]"></i> {{ session('success') }}
                </div>
            @endif

            {{-- 교육 카드 그리드 --}}
            <div class="grid gap-[4rem] md:grid-cols-2 lg:grid-cols-3">
                @forelse($educations as $edu)
                    <div class="group bg-white rounded-[2.5rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.05)] hover:shadow-[0_2rem_6rem_rgba(37,99,235,0.1)] transition-all duration-500 overflow-hidden border border-gray-100 flex flex-col h-full transform hover:-translate-y-[1rem]">
                        
                        {{-- 카드 상단 (상태 뱃지 및 배경) --}}
                        <div class="relative h-[12rem] bg-gradient-to-br from-blue-600 to-indigo-700 p-[3rem] overflow-hidden flex-shrink-0">
                            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
                            
                            <div class="relative z-10">
                                {{-- 3. 상태 뱃지 스타일 업그레이드 --}}
                                @if($edu->status == 'recruiting')
                                    <span class="bg-white text-blue-600 text-[1.3rem] font-black px-[1.5rem] py-[0.5rem] rounded-full shadow-sm uppercase tracking-wider">
                                        <i class="xi-radio-button-on animate-pulse mr-1"></i> {{ __('education.status.recruiting') }}
                                    </span>
                                @elseif($edu->status == 'waiting')
                                    <span class="bg-white/20 text-white border border-white/30 text-[1.3rem] font-black px-[1.5rem] py-[0.5rem] rounded-full backdrop-blur-md uppercase tracking-wider">
                                        {{ __('education.status.waiting') }}
                                    </span>
                                @else
                                    <span class="bg-gray-900/40 text-gray-200 border border-white/10 text-[1.3rem] font-black px-[1.5rem] py-[0.5rem] rounded-full backdrop-blur-md uppercase tracking-wider">
                                        {{ __('education.status.closed') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 카드 바디 --}}
                        <div class="p-[4rem] flex-grow flex flex-col">
                            <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[2rem] leading-[1.4] group-hover:text-blue-600 transition-colors">
                                <a href="{{ route('service.edu.show', $edu->id) }}">
                                    {{ $edu->title }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-500 text-[1.6rem] mb-[3rem] leading-[1.7] break-keep line-clamp-3">
                                {{ Str::limit(strip_tags($edu->content), 120) }}
                            </p>

                            <div class="mt-auto space-y-[1.2rem] text-[1.5rem] text-gray-600 font-medium border-t border-gray-50 pt-[2.5rem]">
                                {{-- 4. 라벨 및 아이콘 최적화 --}}
                                <div class="flex items-center">
                                    <div class="w-[3rem] h-[3rem] bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mr-[1.2rem] flex-shrink-0">
                                        <i class="xi-calendar"></i>
                                    </div>
                                    <span class="text-gray-400 mr-[1rem]">{{ __('education.label.period') }}</span>
                                    <span class="text-gray-900">{{ $edu->edu_start->format('Y.m.d') }} ~ {{ $edu->edu_end->format('Y.m.d') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-[3rem] h-[3rem] bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mr-[1.2rem] flex-shrink-0">
                                        <i class="xi-map-marker"></i>
                                    </div>
                                    <span class="text-gray-400 mr-[1rem]">{{ __('education.label.place') }}</span>
                                    <span class="text-gray-900">{{ $edu->place ?? __('education.label.tba') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- 카드 하단 버튼 --}}
                        <div class="px-[4rem] pb-[4rem]">
                            {{-- 5. 버튼 텍스트 및 프리미엄 스타일 --}}
                            <a href="{{ route('service.edu.show', $edu->id) }}" class="flex items-center justify-center w-full bg-gray-900 hover:bg-blue-600 text-white font-bold py-[1.8rem] rounded-[1.2rem] transition-all duration-300 text-[1.6rem] shadow-lg hover:shadow-blue-500/30">
                                {{ __('education.button.details') }} <i class="xi-arrow-right ml-[1rem]"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    {{-- 6. 데이터 없음 메시지 프리미엄 스타일 --}}
                    <div class="col-span-full py-[15rem] text-center bg-gray-50 rounded-[3rem] border border-dashed border-gray-200">
                        <div class="w-[10rem] h-[10rem] bg-white rounded-full flex items-center justify-center mx-auto mb-[3rem] shadow-sm">
                            <i class="xi-info-o text-[4rem] text-gray-300"></i>
                        </div>
                        <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem]">{{ __('education.empty') }}</h3>
                        <p class="text-[1.6rem] text-gray-500">곧 새로운 전문가 교육 과정이 업데이트될 예정입니다.</p>
                    </div>
                @endforelse
            </div>

            {{-- 페이지네이션 (우리가 만든 프리미엄 스타일 적용) --}}
            <div class="mt-[8rem] flex justify-center">
                {{ $educations->links('pagination.foex') }}
            </div>
        </div>
    </div>

@endsection
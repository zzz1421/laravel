@extends('layouts.foex')

{{-- 브라우저 탭 제목 설정 --}}
@section('title', $education->title)

@section('content')

    {{-- [1] 페이지 헤더 (교육/아카데미 블루 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        <img src="{{ asset('images/service/edu_hero.jpg') }}" alt="FOEx Academy" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/training,seminar'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            {{-- 1. 상태 배지 스타일 업그레이드 --}}
            <div class="mb-[3rem]">
                @if($education->status == 'recruiting')
                    <span class="inline-block px-[2.5rem] py-[0.8rem] bg-blue-600 text-white font-black text-[1.4rem] rounded-full shadow-lg uppercase tracking-widest animate-pulse">
                        <i class="xi-radio-button-on mr-1"></i> {{ __('education.status.recruiting') }}
                    </span>
                @elseif($education->status == 'waiting')
                    <span class="inline-block px-[2.5rem] py-[0.8rem] bg-white/20 text-white border border-white/30 font-black text-[1.4rem] rounded-full backdrop-blur-md uppercase tracking-widest">
                        {{ __('education.status.waiting') }}
                    </span>
                @else
                    <span class="inline-block px-[2.5rem] py-[0.8rem] bg-gray-900/60 text-gray-300 border border-white/10 font-black text-[1.4rem] rounded-full backdrop-blur-md uppercase tracking-widest">
                        {{ __('education.status.closed') }}
                    </span>
                @endif
            </div>

            <h1 class="text-[3.5rem] md:text-[5.5rem] font-black text-white mb-[2.5rem] tracking-tight leading-[1.2] break-keep">
                {{ $education->title }}
            </h1>
        </div>
    </section>

    {{-- [2] 메인 콘텐츠 영역 --}}
    <div class="py-[10rem] bg-gray-50">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
            
            <div class="grid lg:grid-cols-12 gap-[6rem] items-start">
                
                {{-- [좌측: 교육 상세 내용 - 8칸] --}}
                <div class="lg:col-span-8 space-y-[6rem]">
                    
                    {{-- 교육 핵심 정보 카드 --}}
                    <div class="bg-white rounded-[2.5rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-up">
                        <h3 class="text-[2.6rem] font-black text-gray-900 mb-[4rem] flex items-center">
                            <span class="w-[0.6rem] h-[2.5rem] bg-blue-600 mr-[1.5rem] rounded-full"></span> {{ __('education.show.info_title') }}
                        </h3>
                        
                        <div class="grid md:grid-cols-2 gap-[3rem]">
                            @php
                                $infoItems = [
                                    ['icon' => 'xi-calendar', 'label' => __('education.label.period'), 'val' => $education->edu_start->format('Y.m.d').' ~ '.$education->edu_end->format('Y.m.d')],
                                    ['icon' => 'xi-time', 'label' => __('education.label.register_period'), 'val' => $education->register_start->format('Y.m.d').' ~ '.$education->register_end->format('Y.m.d')],
                                    ['icon' => 'xi-map-marker', 'label' => __('education.label.place'), 'val' => $education->place ?? __('education.label.tba')],
                                    ['icon' => 'xi-users', 'label' => __('education.label.capacity'), 'val' => number_format($education->capacity).' '.__('education.label.person')],
                                    ['icon' => 'xi-money', 'label' => __('education.label.price'), 'val' => number_format($education->price).' '.__('education.unit.won')],
                                ];
                            @endphp

                            @foreach($infoItems as $item)
                            <div class="flex items-center p-[2.5rem] bg-gray-50 rounded-[2rem] border border-gray-100">
                                <div class="w-[5.5rem] h-[5.5rem] bg-white rounded-[1.5rem] flex items-center justify-center text-blue-600 shadow-sm mr-[2rem] flex-shrink-0">
                                    <i class="{{ $item['icon'] }} text-[2.4rem]"></i>
                                </div>
                                <div>
                                    <p class="text-[1.4rem] text-gray-400 font-bold mb-[0.3rem]">{{ $item['label'] }}</p>
                                    <p class="text-[1.7rem] text-gray-900 font-black">{{ $item['val'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- 교육 상세 본문 --}}
                    <div class="bg-white rounded-[2.5rem] p-[4rem] md:p-[6rem] shadow-[0_1rem_4rem_rgba(0,0,0,0.03)] border border-gray-100" data-aos="fade-up">
                        <h3 class="text-[2.6rem] font-black text-gray-900 mb-[4rem] flex items-center">
                            <span class="w-[0.6rem] h-[2.5rem] bg-blue-600 mr-[1.5rem] rounded-full"></span> {{ __('education.show.details_title') }}
                        </h3>
                        <div class="content-body text-[1.8rem] text-gray-700 leading-[2.0] break-keep min-h-[30rem]">
                            {!! $education->content !!}
                        </div>
                    </div>

                    {{-- 하단 목록으로 버튼 --}}
                    <div class="text-center pt-[2rem]">
                        <a href="{{ route('service.edu.apply') }}" class="inline-flex items-center text-gray-400 hover:text-blue-600 font-bold text-[1.8rem] transition-colors group">
                            <i class="xi-arrow-left mr-[1rem] group-hover:-translate-x-2 transition-transform"></i> {{ __('education.button.back') }}
                        </a>
                    </div>
                </div>

                {{-- [우측: 신청 폼 카드 - 4칸 / Sticky] --}}
                <div class="lg:col-span-4 sticky top-[12rem]">
                    <div class="bg-white rounded-[3rem] p-[4rem] shadow-[0_2rem_6rem_rgba(0,0,0,0.08)] border border-blue-100 relative overflow-hidden">
                        {{-- 장식용 포인트 --}}
                        <div class="absolute top-0 right-0 w-[10rem] h-[10rem] bg-blue-600/5 rounded-full -mr-[5rem] -mt-[5rem]"></div>
                        
                        <h3 class="text-[2.2rem] font-black text-gray-900 mb-[3.5rem] flex items-center">
                            <i class="xi-pen text-blue-600 mr-[1rem]"></i> {{ __('education.show.apply_title') }}
                        </h3>

                        @if(session('error'))
                            <div class="mb-[3rem] p-[2rem] bg-red-50 text-red-600 text-[1.4rem] font-bold rounded-[1rem] border-l-[0.4rem] border-red-500">
                                {{ session('error') }}
                            </div>
                        @endif

                        @auth
                            @if($education->status == 'recruiting')
                                <form action="{{ route('service.edu.store', $education->id) }}" method="POST" class="space-y-[2.5rem]">
                                    @csrf
                                    <div class="space-y-[2rem]">
                                        <div class="space-y-[0.8rem]">
                                            <label class="block text-[1.5rem] font-bold text-gray-700 ml-[0.5rem]">{{ __('education.form.name') }} <span class="text-blue-600">*</span></label>
                                            <input type="text" name="applicant_name" value="{{ old('applicant_name', $user->name) }}" class="w-full px-[2rem] py-[1.5rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none" required>
                                        </div>
                                        <div class="space-y-[0.8rem]">
                                            <label class="block text-[1.5rem] font-bold text-gray-700 ml-[0.5rem]">{{ __('education.form.phone') }} <span class="text-blue-600">*</span></label>
                                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-[2rem] py-[1.5rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none" required>
                                        </div>
                                        <div class="space-y-[0.8rem]">
                                            <label class="block text-[1.5rem] font-bold text-gray-700 ml-[0.5rem]">{{ __('education.form.email') }} <span class="text-blue-600">*</span></label>
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-[2rem] py-[1.5rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none" required>
                                        </div>
                                        <div class="grid grid-cols-2 gap-[1.5rem]">
                                            <div class="space-y-[0.8rem]">
                                                <label class="block text-[1.5rem] font-bold text-gray-700 ml-[0.5rem]">{{ __('education.form.company') }}</label>
                                                <input type="text" name="company_name" class="w-full px-[2rem] py-[1.5rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none">
                                            </div>
                                            <div class="space-y-[0.8rem]">
                                                <label class="block text-[1.5rem] font-bold text-gray-700 ml-[0.5rem]">{{ __('education.form.position') }}</label>
                                                <input type="text" name="position" class="w-full px-[2rem] py-[1.5rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none">
                                            </div>
                                        </div>
                                        <div class="space-y-[0.8rem]">
                                            <label class="block text-[1.5rem] font-bold text-gray-700 ml-[0.5rem]">{{ __('education.form.memo') }}</label>
                                            <textarea name="memo" rows="3" class="w-full px-[2rem] py-[1.5rem] bg-gray-50 border border-gray-200 rounded-[1.2rem] text-[1.6rem] focus:border-blue-500 transition-all outline-none resize-none"></textarea>
                                        </div>
                                    </div>

                                    <label class="flex items-start group cursor-pointer py-[1rem]">
                                        <input id="agree" name="agree_privacy" type="checkbox" class="w-[2rem] h-[2rem] text-blue-600 border-gray-300 rounded-[0.5rem] focus:ring-blue-500 cursor-pointer mt-[0.2rem]" required>
                                        <span class="ml-[1.2rem] text-[1.4rem] text-gray-600 group-hover:text-blue-600 transition-colors font-medium">
                                            {{ __('education.form.agree') }} <span class="text-blue-600 font-bold">(필수)</span>
                                        </span>
                                    </label>

                                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-[2.2rem] rounded-[1.5rem] text-[1.8rem] transition-all duration-300 shadow-[0_1.5rem_3rem_rgba(37,99,235,0.3)] hover:-translate-y-[0.5rem]">
                                        {{ __('education.button.submit') }}
                                    </button>
                                </form>
                            @else
                                <div class="text-center py-[6rem] bg-gray-50 rounded-[2rem] border border-gray-100">
                                    <i class="xi-calendar-cancle text-[4rem] text-gray-300 mb-[2rem] block"></i>
                                    <p class="text-[1.8rem] text-gray-700 font-black mb-[1rem]">{{ __('education.message.not_period') }}</p>
                                    <p class="text-[1.4rem] text-gray-400 font-medium">
                                        모집 기간: {{ $education->register_start->format('Y-m-d') }} ~ {{ $education->register_end->format('Y-m-d') }}
                                    </p>
                                </div>
                            @endif
                        @else
                            {{-- 로그인 미실시 --}}
                            <div class="text-center py-[6rem] bg-gray-50 rounded-[2rem] border border-gray-100">
                                <i class="xi-lock text-[4rem] text-gray-300 mb-[2rem] block"></i>
                                <p class="text-[1.7rem] text-gray-600 font-bold mb-[3rem] break-keep px-[2rem] leading-[1.6]">
                                    {{ __('education.message.login_required') }}
                                </p>
                                <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-[80%] bg-gray-900 text-white font-black py-[1.8rem] rounded-[1.2rem] text-[1.6rem] hover:bg-blue-600 transition-colors shadow-lg">
                                    {{ __('education.button.login') }}
                                </a>
                            </div>
                        @endauth
                        
                        <div class="mt-[3rem] text-center">
                            <p class="text-gray-400 text-[1.3rem]">문의: 055-xxx-xxxx / help@foex.co.kr</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    {{-- 본문 스타일 최적화 --}}
    <style>
        .content-body h4 { font-size: 2.2rem; font-weight: 800; color: #111; margin: 4rem 0 2rem; }
        .content-body p { margin-bottom: 2rem; }
        .content-body ul { list-style-type: disc; margin-left: 2.5rem; margin-bottom: 3rem; }
        .content-body li { margin-bottom: 1rem; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>

@endsection
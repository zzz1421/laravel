@extends('layouts.foex')

@section('title', 'Global Safety Partner')

@section('content')

<style>
    /* 1. 완벽한 가로 비율 스케일링 (동일) */
    html { font-size: 16px; }
    @media (min-width: 768px) and (max-width: 1920px) {
        html { font-size: calc(100vw / 120); }
    }
    @media (min-width: 1921px) {
        html { font-size: 16px; }
    }

    /* 🚨 2. 자석 스크롤: 무조건 화면에 딱! 맞게 강제(mandatory) 🚨 */
    html {
        scroll-snap-type: y mandatory; /* proximity를 버리고 무조건 맞물리게 강제! */
        scroll-behavior: smooth;
        scroll-padding-top: 80px; /* 헤더 높이만큼 정확히 여백 */
    }
    section, footer { 
        scroll-snap-align: start; 
        scroll-snap-stop: always; /* 스크롤 한 번에 한 섹션씩만 이동하도록 브레이크 */
    }

    section {
        height: calc(100vh - 80px);
        min-height: calc(100vh - 80px); 
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center; 
        overflow: hidden;
    }

    /* 🚨 4. 일정 섹션 예외 처리: 달력이 커질 수 있도록 높이 제한 해제 🚨 */
    #schedule {
        /* 고정 높이를 해제하고 내용물에 맞게 늘어나도록 설정 */
        height: auto !important; 
        /* 95rem의 달력과 상하 패딩, 타이틀을 모두 포함할 수 있는 넉넉한 최소 높이 */
        min-height: 130rem !important; 
        overflow: visible !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-top: 12rem;
        padding-bottom: 12rem;
    }
    
    #hero {
        height: 100vh !important;
        min-height: 100vh !important;
    }

    footer { background-color: #1a1c1e; }

    /* 모바일 전용 해제 */
    @media (max-width: 768px) {
        html { scroll-snap-type: none; }
        section, #schedule { 
            height: auto; 
            min-height: calc(100vh - 80px); 
            padding-top: 4rem; 
            padding-bottom: 4rem; 
            overflow: visible;
        }
    }
</style>

<div class="bg-gray-950 text-gray-200">

    {{-- [섹션 1] 히어로 배너 --}}
    <section id="hero" class="relative px-[4rem] md:px-[18rem] pb-[8rem] md:pb-[18rem] flex flex-col justify-end">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/main/main-hero.png') }}" alt="Background" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-950/90 via-gray-950/20 to-transparent"></div>
        </div>

        <div class="relative z-10 text-left w-full max-w-[80rem] space-y-[1.5rem]" data-aos="fade-up">
            <h2 class="text-[1.6rem] md:text-[2rem] font-bold text-[#f9b417] tracking-tight uppercase">
                {{ __('main.hero_subtitle') }}
            </h2>
            <h1 class="text-[4.5rem] md:text-[7.5rem] font-black text-white leading-[1] tracking-tighter">
                {{ __('main.hero_title') }}
            </h1>
            <p class="text-[1.5rem] md:text-[1.8rem] font-light text-white tracking-wide leading-[1.6] break-keep pt-[0.5rem]">
                {!! __('main.hero_desc') !!}
            </p>
            <div class="pt-[1.5rem]">
                <a href="#business" class="inline-flex items-center gap-[1rem] bg-[#f9b417] text-black hover:bg-white font-bold py-[1.6rem] px-[3.5rem] rounded-[0.8rem] transition duration-300 group shadow-lg text-[1.5rem] md:text-[1.6rem]">
                    {{ __('main.hero_btn') }}
                    <i class="xi-angle-right-min text-[2.2rem] group-hover:translate-x-[0.5rem] transition font-bold"></i>
                </a>
            </div>
        </div>
        
        <div class="absolute bottom-[4rem] left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <a href="#business" class="text-white opacity-40 hover:opacity-100 transition-opacity flex flex-col items-center">
                <x-icons.common.down-arrow class="w-[4rem] h-[2.5rem]" />
            </a>
        </div>
    </section>

    {{-- [섹션 2] 기업 소개 (사업 분야) --}}
    <section id="business" class="bg-white px-[4rem] md:px-[18rem] pt-[10rem] pb-[15rem]">
        <div class="w-full max-w-[140rem] mx-auto h-[0.1rem] bg-gray-300 mb-[6rem]"></div>

        <div class="text-center mb-[6rem]" data-aos="fade-down">
            <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 mb-[1.5rem] tracking-tight">{{ __('main.biz_title') }}</h2>
            <p class="text-gray-500 text-[1.6rem] md:text-[1.8rem] font-medium">{{ __('main.biz_subtitle') }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 max-w-[140rem] mx-auto w-full border border-gray-200 divide-y md:divide-y-0 md:divide-x divide-gray-200 bg-white">
            @foreach([
                ['img' => 'main-tech1.jpg', 'title' => 'biz_1_title', 'desc' => 'biz_1_desc', 'route' => 'business.education', 'delay' => '0'],
                ['img' => 'main-tech2.jpg', 'title' => 'biz_2_title', 'desc' => 'biz_2_desc', 'route' => 'business.consulting', 'delay' => '100'],
                ['img' => 'main-tech3.jpg', 'title' => 'biz_4_title', 'desc' => 'biz_4_desc', 'route' => 'business.engineering', 'delay' => '200'],
                ['img' => 'main-tech4.jpg', 'title' => 'biz_5_title', 'desc' => 'biz_5_desc', 'route' => 'rnd.ai', 'delay' => '300']
            ] as $biz)
            <div class="flex flex-col group overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $biz['delay'] }}">
                <div class="w-full h-[25rem] lg:h-[35rem] overflow-hidden relative bg-gray-100">
                    <img src="{{ asset('images/main/' . $biz['img']) }}" alt="{{ __('main.'.$biz['title']) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                </div>
                <div class="flex flex-col flex-grow p-[3rem] lg:p-[4rem]">
                    <h3 class="text-[2rem] lg:text-[2.4rem] font-bold text-gray-900 mb-[1.5rem]">{{ __('main.'.$biz['title']) }}</h3>
                    <p class="text-gray-500 text-[1.4rem] lg:text-[1.5rem] leading-[1.6] mb-[4rem] line-clamp-2 break-keep">{!! __('main.'.$biz['desc']) !!}</p>
                    <a href="{{ route($biz['route']) }}" class="mt-auto inline-flex items-center text-[1.3rem] lg:text-[1.4rem] font-bold text-gray-900 hover:text-[#f9b417] transition-colors group/btn w-fit">
                        {{ __('main.view_more') }} <i class="xi-angle-right-min ml-[0.6rem] text-[1.6rem] group-hover/btn:translate-x-[0.4rem] transition-transform"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- [섹션 3] 기대 효과 --}}
    <section id="effects" class="relative bg-white flex flex-col justify-center items-center px-[4rem] md:px-[18rem] py-[10rem]">
        <div class="w-full max-w-[140rem] mx-auto relative z-10">
            <div class="w-full h-[0.1rem] bg-gray-300 mb-[8rem]"></div>

            <div class="text-center mb-[8rem]" data-aos="fade-down">
                <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 mb-[1.5rem] tracking-tight">{{ __('main.effect_title') }}</h2>
                <p class="text-gray-500 text-[1.6rem] md:text-[1.8rem] font-medium">{{ __('main.effect_subtitle') }}</p>
            </div>

            <div class="relative w-full py-[4rem]">
                <div class="absolute inset-0 flex justify-center items-center pointer-events-none z-0">
                    <div class="w-[140rem] h-[35rem] bg-[#f9b417]/30 blur-[8rem] rounded-[100%]"></div>
                </div>

                <div class="relative z-10 grid grid-cols-2 md:grid-cols-4 gap-[4rem] text-center">
                    @foreach([
                        ['title' => __('main.effect_1_name'), 'value' => 98, 'delay' => '0'],
                        ['title' => __('main.effect_2_name'), 'value' => 33, 'delay' => '100'],
                        ['title' => __('main.effect_3_name'), 'value' => 86, 'delay' => '200'],
                        ['title' => __('main.effect_4_name'), 'value' => 50, 'delay' => '300']
                    ] as $effect)
                    <div class="flex flex-col items-center justify-center" data-aos="fade-up" data-aos-delay="{{ $effect['delay'] }}">
                        <div x-data="numberCounter({{ $effect['value'] }})" class="text-[7rem] md:text-[11rem] font-black text-[#303031] leading-none mb-[2rem] tracking-tighter flex items-baseline justify-center">
                            <span x-text="current">0</span>
                            <span class="text-[5rem] md:text-[8rem] ml-[0.5rem]">%</span>
                        </div>
                        <h3 class="text-[1.8rem] md:text-[2rem] font-bold text-gray-800">{{ $effect['title'] }}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full h-[0.1rem] bg-gray-300 mt-[8rem]"></div>
        </div>
    </section>

    {{-- [섹션 4] 홍보 영상 --}}
    <section id="promo-video" class="relative bg-white flex flex-col justify-center items-center px-[4rem] md:px-[18rem] py-[10rem]">
        <div class="w-full max-w-[140rem] mx-auto z-10">
            <div class="text-center mb-[6rem]" data-aos="fade-down">
                <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 mb-[1.5rem] tracking-tight">{{ __('main.video_title') }}</h2>
                <p class="text-gray-500 text-[1.6rem] md:text-[1.8rem] font-medium">{{ __('main.video_subtitle') }}</p>
            </div>
            <div class="max-w-[90rem] mx-auto w-full aspect-video bg-gray-200 rounded-[2rem] md:rounded-[3rem] shadow-[0_2rem_4rem_rgba(0,0,0,0.1)] overflow-hidden group" data-aos="zoom-in">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/xLd7W01jNw8?rel=0&modestbranding=1" title="FOEx 홍보 영상" frameborder="0" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
    </section>

    {{-- [섹션 5] 최신 소식 & 고객센터 --}}
    <section id="contact-pr" class="relative bg-white flex flex-col justify-center items-center px-[4rem] md:px-[18rem] py-[10rem]">
        <div class="w-full max-w-[110rem] mx-auto space-y-[6rem]">
            <div data-aos="fade-up">
                <div class="flex justify-between items-end mb-[2.5rem] border-b-[0.15rem] border-gray-300 pb-[1.5rem]">
                    <h2 class="text-[2.8rem] md:text-[3.2rem] font-black text-gray-900 tracking-tight">{{ __('main.news_title') }}</h2>
                    <a href="{{ route('pr.notice.index') }}" class="text-gray-500 hover:text-[#f9b417] text-[1.4rem] font-bold flex items-center transition-colors">
                        {{ __('main.view_all') }} <i class="xi-plus-min ml-[0.5rem]"></i>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-[2.5rem]">
                    @forelse($notices->take(3) as $notice)
                        <div class="group cursor-pointer p-[3rem] bg-[#f8f9fa] rounded-[1rem] border border-gray-200 hover:border-gray-400 hover:shadow-lg transition duration-300 flex flex-col h-[20rem]" onclick="location.href='{{ route('pr.notice.show', $notice->id) }}'">
                            <h4 class="text-[1.7rem] font-bold text-gray-900 mb-[1.2rem] line-clamp-1 group-hover:text-blue-700 transition-colors">{{ $notice->title }}</h4>
                            <p class="text-gray-500 text-[1.4rem] mb-auto line-clamp-2 leading-[1.6] break-keep">{{ Str::limit(strip_tags($notice->content), 100) }}</p>
                            <span class="text-gray-400 text-[1.2rem] font-medium mt-[1.5rem]">{{ $notice->created_at->format('Y.m.d') }}</span>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-[8rem] text-gray-400 text-[1.5rem]">{{ __('main.no_news') }}</div>
                    @endforelse
                </div>
            </div>

            <div class="flex flex-col md:flex-row rounded-[2rem] overflow-hidden shadow-[0_1rem_3rem_rgba(0,0,0,0.08)] border border-gray-200" data-aos="zoom-in">
                <div class="w-full md:w-2/3 bg-[#2A3143] text-white p-[5rem] lg:p-[7rem] flex flex-col justify-center">
                    <h3 class="text-[3rem] lg:text-[4rem] font-bold leading-[1.2] mb-[2.5rem] tracking-tight">{!! __('main.safety_slogan') !!}</h3>
                    <p class="text-[1.4rem] lg:text-[1.6rem] text-white font-medium break-keep opacity-90">{{ __('main.safety_desc') }}</p>
                </div>
                <div class="w-full md:w-1/3 bg-white p-[4rem] lg:p-[5rem] flex flex-col justify-center border-l border-gray-100">
                    <h4 class="text-[1.8rem] lg:text-[2rem] font-bold text-gray-900 mb-[1rem]">{{ __('main.cs_title') }}</h4>
                    <p class="text-[3.6rem] lg:text-[4rem] font-black text-gray-900 mb-[1.5rem] tracking-tighter leading-none whitespace-nowrap">055-293-0521</p>
                    <div class="text-[1.3rem] lg:text-[1.4rem] text-gray-500 space-y-[0.5rem] mb-[3rem] break-keep">
                        <p>{!! __('main.cs_time') !!}</p>
                        <p>{{ __('main.cs_holiday') }}</p>
                    </div>
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center bg-[#f9b417] text-gray-900 font-bold text-[1.4rem] lg:text-[1.5rem] py-[1.2rem] px-[3rem] rounded-[0.4rem] transition hover:bg-gray-900 hover:text-white w-fit">
                        {{ __('main.inquiry_btn') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- [섹션 6] 포엑스 일정 --}}
    <section id="schedule" class="relative bg-white flex flex-col justify-center items-center px-[4rem] md:px-[18rem] py-[12rem] border-t border-gray-100" x-data="calendarHandler()">
        <div class="w-full max-w-[140rem] mx-auto z-10 flex flex-col items-center">
            <div class="text-center mb-[6rem]" data-aos="fade-down">
                <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 mb-[1.5rem] tracking-tight">{{ __('main.schedule_title') }}</h2>
                <p class="text-gray-500 text-[1.8rem] font-medium">{{ __('main.schedule_subtitle') }}</p>
            </div>
            <div id="calendar-container" class="w-full max-w-[120rem] h-[95rem] bg-white rounded-[2rem] shadow-[0_2rem_5rem_rgba(0,0,0,0.08)] border border-gray-200 overflow-hidden" data-aos="zoom-in">
                @include('partials.calendar_body')
            </div>
        </div>
    </section>

</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const aosElements = entry.target.querySelectorAll('[data-aos]');
                if (entry.isIntersecting) {
                    aosElements.forEach(el => {
                        el.classList.remove('aos-animate');
                        setTimeout(() => el.classList.add('aos-animate'), 50);
                    });
                    if (entry.target.hasAttribute('data-aos')) {
                        entry.target.classList.remove('aos-animate');
                        setTimeout(() => entry.target.classList.add('aos-animate'), 50);
                    }
                } else {
                    aosElements.forEach(el => el.classList.remove('aos-animate'));
                    if (entry.target.hasAttribute('data-aos')) {
                        entry.target.classList.remove('aos-animate');
                    }
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('section').forEach(section => observer.observe(section));
    });

    function calendarHandler() {
        return {
            async changeMonth(year, month) {
                const container = document.getElementById('calendar-container');
                container.style.opacity = '0.5';

                try {
                    // 🚨 route('home') 대신 route('main')으로 되어있는지 확인!
                    const response = await axios.get(`{{ route('home') }}`, {
                        params: { year, month },
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });
                    
                    container.innerHTML = response.data;
                    container.style.opacity = '1';

                    // AOS 재실행
                    if (window.AOS) {
                        AOS.refresh();
                    }
                } catch (error) {
                    console.error('달력 로드 실패:', error);
                    container.style.opacity = '1';
                }
            }
        }
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('numberCounter', (targetValue, duration = 2000) => ({
            current: 0,
            target: targetValue,
            started: false,
            init() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            // 1. 화면에 들어오면 애니메이션 시작
                            if (!this.started) {
                                this.started = true;
                                this.animate();
                            }
                        } else {
                            // 2. 🚨 [추가된 로직] 화면에서 완전히 사라지면 상태 초기화 🚨
                            // 다시 이 섹션으로 돌아왔을 때 애니메이션이 재실행되도록 만듭니다.
                            this.started = false;
                            this.current = 0;
                        }
                    });
                }, { 
                    threshold: 0.1 // 섹션이 10%만 보여도 초기화 준비, 10% 이상 보이면 실행
                });
                
                observer.observe(this.$el);
            },
            animate() {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!this.started) return; // 초기화되었으면 애니메이션 중단
                    
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    
                    // Ease-out 효과 (점점 천천히)
                    const ease = 1 - Math.pow(1 - progress, 4);
                    this.current = Math.floor(ease * this.target);
                    
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        this.current = this.target;
                    }
                };
                window.requestAnimationFrame(step);
            }
        }));
    });
</script>
@endsection
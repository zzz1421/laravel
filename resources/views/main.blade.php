@extends('layouts.foex')

@section('title', 'Global Safety Partner')

@section('content')

<style>
    /* 1. 브라우저 최상단에 자석 효과 적용 */
    html {
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
        scroll-padding-top: 80px;
    }

    section, footer {
        scroll-snap-align: start;
        scroll-snap-stop: always;
    }

    /* 2. 모든 섹션 높이를 화면 높이(헤더 제외)에 100% 맞춤 */
    section {
        height: calc(100vh - 5rem); /* 헤더 5rem 제외한 전체 높이 */
        scroll-snap-align: start;
        scroll-snap-stop: always;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center; /* 내용물을 세로 중앙에 배치 */
    }
    footer {
        /* 푸터는 내용에 따라 높이가 다르므로 height를 고정하지 않고 자석만 걸어줍니다. */
        background-color: #1a1c1e; /* 레이아웃의 푸터 색상과 맞춤 */
    }

    /* 모바일 대응: 모바일은 스냅을 끄는 것이 사용성이 좋습니다 */
    @media (max-width: 768px) {
        html { scroll-snap-type: none; }
        section { height: auto; min-height: calc(100vh - 5rem); }
    }
</style>

<div class="bg-gray-950 text-gray-200">

    {{-- [섹션 1] 히로 배너 - 좌측 하단 1/4 구역 집중 --}}
    {{-- justify-end를 사용하여 내용물을 하단으로 밀착 --}}
    <section id="hero" class="!justify-end pb-24 md:pb-32 px-6 md:px-20 lg:px-32">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1581094288338-2314dddb7ece?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Background" fetchpriority="high" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-950/90 via-gray-950/20 to-transparent"></div>
        </div>

        {{-- 좌측 하단 1/4 구역 박스 (가로폭 제한으로 콤팩트하게 유지) --}}
        <div class="relative z-10 text-left w-full md:w-[40%] space-y-4" data-aos="fade-up">
            <h2 class="text-lg md:text-xl lg:text-2xl font-bold text-[#f9b417] tracking-tight uppercase">
                A GLOBAL EXPLOSION SAFETY PARTNER
            </h2>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tighter">
                For Explosion Proof
            </h1>
            <p class="text-sm md:text-lg font-light text-white tracking-wide leading-relaxed break-keep pb-2">
                포엑스는 국제 표준 기반의 방폭 토탈 솔루션을<br class="hidden sm:block">
                제공하여 가장 안전한 산업 현장을 만들어갑니다.
            </p>
            <div>
                <a href="#intro" class="inline-flex items-center gap-2 bg-[#f9b417] text-black hover:bg-white font-bold py-3 px-8 rounded-lg transition duration-300 group shadow-lg">
                    포엑스 소개 바로가기 
                    <i class="xi-angle-right-min text-xl group-hover:translate-x-1 transition font-bold"></i>
                </a>
            </div>
        </div>
        
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 animate-bounce">
            <a href="#intro" class="text-white text-4xl opacity-30 hover:opacity-100 transition"><i class="xi-angle-down-min"></i></a>
        </div>
    </section>

    {{-- [섹션 2] 기업 소개 --}}
    <section id="business" class="bg-white px-6 md:px-20 lg:px-32">
        {{-- 1. 상단 헤더 (Center Align) --}}
        <div class="text-center mb-16" data-aos="fade-down">
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4">사업 분야</h2>
            <p class="text-gray-500 text-lg md:text-xl font-medium">
                포엑스는 전문적인 기술력과 최적의 서비스를 제공합니다.
            </p>
        </div>

        {{-- 2. 사업 카드 그리드 (이미지 -> 제목 -> 설명 -> 버튼 순차 배치) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 max-w-7xl mx-auto w-full">
            
            {{-- 교육 사업 --}}
            <div class="flex flex-col items-start text-left group" data-aos="fade-up" data-aos-delay="0">
                <div class="w-full aspect-[4/3] overflow-hidden rounded-lg mb-6 shadow-md">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80" alt="Education" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('main.biz_1_title') }}</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">
                    {!! __('main.biz_1_desc') !!}
                </p>
                <a href="{{ route('business.education') }}" class="inline-flex items-center text-sm font-bold text-gray-900 hover:text-[#f9b417] transition group/btn">
                    자세히 보기 <i class="xi-angle-right-min ml-1 group-hover/btn:translate-x-1 transition"></i>
                </a>
            </div>

            {{-- 컨설팅 사업 --}}
            <div class="flex flex-col items-start text-left group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-full aspect-[4/3] overflow-hidden rounded-lg mb-6 shadow-md">
                    <img src="https://images.unsplash.com/photo-1454165833767-0266b19677c8?auto=format&fit=crop&w=800&q=80" alt="Consulting" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('main.biz_2_title') }}</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">
                    {!! __('main.biz_2_desc') !!}
                </p>
                <a href="{{ route('business.consulting') }}" class="inline-flex items-center text-sm font-bold text-gray-900 hover:text-[#f9b417] transition group/btn">
                    자세히 보기 <i class="xi-angle-right-min ml-1 group-hover/btn:translate-x-1 transition"></i>
                </a>
            </div>

            {{-- 엔지니어링 사업 --}}
            <div class="flex flex-col items-start text-left group" data-aos="fade-up" data-aos-delay="200">
                <div class="w-full aspect-[4/3] overflow-hidden rounded-lg mb-6 shadow-md">
                    <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?auto=format&fit=crop&w=800&q=80" alt="Engineering" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('main.biz_4_title') }}</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">
                    {!! __('main.biz_4_desc') !!}
                </p>
                <a href="{{ route('business.engineering') }}" class="inline-flex items-center text-sm font-bold text-gray-900 hover:text-[#f9b417] transition group/btn">
                    자세히 보기 <i class="xi-angle-right-min ml-1 group-hover/btn:translate-x-1 transition"></i>
                </a>
            </div>

            {{-- 연구개발 사업 --}}
            <div class="flex flex-col items-start text-left group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-full aspect-[4/3] overflow-hidden rounded-lg mb-6 shadow-md">
                    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80" alt="R&D" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ __('main.biz_5_title') }}</h3>
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">
                    {!! __('main.biz_5_desc') !!}
                </p>
                <a href="{{ route('business.rnd') }}" class="inline-flex items-center text-sm font-bold text-gray-900 hover:text-[#f9b417] transition group/btn">
                    자세히 보기 <i class="xi-angle-right-min ml-1 group-hover/btn:translate-x-1 transition"></i>
                </a>
            </div>

        </div>
    </section>

    {{-- [섹션 3] 기대 효과 --}}
    <section id="effects" class="bg-white px-6 md:px-20 lg:px-32 border-t border-gray-100">
        {{-- 1. 상단 헤더 (Center Align) --}}
        <div class="text-center mb-16" data-aos="fade-down">
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-6">기대효과</h2>
            <p class="text-gray-500 text-lg md:text-xl font-medium max-w-4xl mx-auto break-keep leading-relaxed">
                포엑스는 시간을 절약하고 현장안전을 강화하여 높은 투자 대비 효과(ROI)를 제공합니다.
            </p>
        </div>

        {{-- 2. 기대 수치 그리드 (수직 스택 카드) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto w-full">
            
            {{-- 문서화 효율증대 --}}
            <div class="flex flex-col items-center text-center p-12 bg-gray-50 rounded-3xl border border-gray-100 group hover:bg-white hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="0">
                <h3 class="text-xl font-bold text-gray-900 mb-6">문서화 효율증대</h3>
                <span class="text-6xl md:text-7xl font-black text-gray-950 mb-8 group-hover:text-[#f9b417] transition duration-500">98%</span>
                <div class="w-12 h-1.5 bg-[#f9b417] rounded-full"></div>
            </div>

            {{-- 검사 정확도 증가 --}}
            <div class="flex flex-col items-center text-center p-12 bg-gray-50 rounded-3xl border border-gray-100 group hover:bg-white hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="text-xl font-bold text-gray-900 mb-6">검사 정확도 증가</h3>
                <span class="text-6xl md:text-7xl font-black text-gray-950 mb-8 group-hover:text-[#f9b417] transition duration-500">33%</span>
                <div class="w-12 h-1.5 bg-[#f9b417] rounded-full"></div>
            </div>

            {{-- 준비시간 감축 --}}
            <div class="flex flex-col items-center text-center p-12 bg-gray-50 rounded-3xl border border-gray-100 group hover:bg-white hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="200">
                <h3 class="text-xl font-bold text-gray-900 mb-6">준비시간 감축</h3>
                <span class="text-6xl md:text-7xl font-black text-gray-950 mb-8 group-hover:text-[#f9b417] transition duration-500">86%</span>
                <div class="w-12 h-1.5 bg-[#f9b417] rounded-full"></div>
            </div>

            {{-- 검사시간 단축 --}}
            <div class="flex flex-col items-center text-center p-12 bg-gray-50 rounded-3xl border border-gray-100 group hover:bg-white hover:shadow-2xl transition duration-500" data-aos="zoom-in" data-aos-delay="300">
                <h3 class="text-xl font-bold text-gray-900 mb-6">검사시간 단축</h3>
                <span class="text-6xl md:text-7xl font-black text-gray-950 mb-8 group-hover:text-[#f9b417] transition duration-500">50%</span>
                <div class="w-12 h-1.5 bg-[#f9b417] rounded-full"></div>
            </div>

        </div>
    </section>

    {{-- [섹션 4] 홍보 영상 (PROMOTIONAL VIDEO) - 신규 추가 ⭐ --}}
    <section id="promo-video" class="bg-white px-6 md:px-20 lg:px-32 border-t border-gray-100">
        {{-- 1. 상단 헤더 (Center Align) --}}
        <div class="text-center mb-12" data-aos="fade-down">
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4">홍보 영상</h2>
            <p class="text-gray-500 text-lg md:text-xl font-medium">
                포엑스가 만들어가는 안전한 산업 현장을 영상으로 만나보세요.
            </p>
        </div>

        {{-- 2. 유튜브 플레이어 박스 --}}
        <div class="max-w-6xl mx-auto w-full aspect-video bg-black rounded-3xl shadow-2xl overflow-hidden border border-gray-100 group" data-aos="zoom-in">
            {{-- 유튜브 링크 입력 (src의 마지막 ID 부분을 실제 영상 ID로 교체하세요) --}}
            <iframe 
                class="w-full h-full" 
                src="https://www.youtube.com/embed/xLd7W01jNw8?rel=0&modestbranding=1"
                title="FOEx 홍보 영상" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen
                loading="lazy">
            </iframe>
        </div>
    </section>

    {{-- [섹션 5] 최신 소식 & 고객센터 (PR & CUSTOMER SERVICE) --}}
    <section id="contact-pr" class="bg-white px-6 md:px-20 lg:px-32 border-t border-gray-100 flex flex-col justify-center">
        <div class="max-w-7xl mx-auto w-full space-y-16">
            
            {{-- 상단: 최신 소식 (News & Notice) --}}
            <div data-aos="fade-up">
                <div class="flex justify-between items-end mb-8 border-b-2 border-gray-900 pb-4">
                    <div>
                        <h2 class="text-[#f9b417] text-sm font-bold tracking-widest mb-2 uppercase">PR Center</h2>
                        <h3 class="text-3xl md:text-4xl font-black text-gray-900">최신 소식</h3>
                    </div>
                    <a href="{{ route('pr.notice.index') }}" class="text-gray-500 hover:text-[#f9b417] text-sm flex items-center transition font-bold">
                        전체보기 <i class="xi-plus-min ml-1"></i>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($notices->take(3) as $notice)
                        <div class="group cursor-pointer p-6 bg-gray-50 rounded-2xl border border-gray-100 hover:bg-white hover:shadow-xl transition duration-300" onclick="location.href='{{ route('pr.notice.show', $notice->id) }}'">
                            <span class="text-[#f9b417] text-xs font-bold uppercase mb-3 block">Notice</span>
                            <h4 class="text-lg font-bold text-gray-900 mb-4 line-clamp-1 group-hover:text-blue-900 transition">{{ $notice->title }}</h4>
                            <p class="text-gray-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                                {{ Str::limit(strip_tags($notice->content), 100) }}
                            </p>
                            <span class="text-gray-400 text-xs">{{ $notice->created_at->format('Y.m.d') }}</span>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-10 text-gray-400">등록된 최신 소식이 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- 하단: 고객센터 (CS Card) --}}
            <div class="flex flex-col md:flex-row rounded-3xl overflow-hidden shadow-2xl border border-gray-100" data-aos="zoom-in">
                {{-- 왼쪽: 슬로건 --}}
                <div class="w-full md:w-1/2 bg-blue-950 text-white p-10 md:p-12 flex flex-col justify-center">
                    <h3 class="text-2xl md:text-4xl font-black leading-tight mb-4">
                        Safety isn't optional.<br>It's a <span class="text-[#f9b417]">necessity</span>.
                    </h3>
                    <p class="text-xs md:text-sm text-gray-400 mb-8 break-keep">안전은 선택이 아니라 필수입니다. 포엑스가 더 안전한 현장을 만듭니다.</p>
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center justify-center gap-2 bg-[#f9b417] text-black font-bold py-3 px-8 rounded-lg transition hover:bg-white w-fit text-sm">
                        문의하기 <i class="xi-angle-right-min"></i>
                    </a>
                </div>
                {{-- 오른쪽: 연락처 --}}
                <div class="w-full md:w-1/2 bg-gray-50 p-10 md:p-12 flex flex-col justify-center">
                    <h4 class="text-lg font-bold text-gray-900 mb-4">고객센터</h4>
                    <p class="text-3xl md:text-5xl font-black text-gray-950 mb-6 tracking-tight">055-293-0521</p>
                    <div class="text-xs text-gray-500 space-y-1">
                        <p>평일 09:00 ~ 18:00 (점심시간 12:00 ~ 13:00)</p>
                        <p>주말 및 공휴일 휴무</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- [섹션 5] 포엑스 일정 (SCHEDULE) - 한 화면 맞춤(Full-Fit) 최적화 --}}
    <section id="schedule" class="bg-white px-6 md:px-20 lg:px-32 border-t border-gray-100 flex flex-col items-center justify-center">
        <div class="w-full max-w-7xl mx-auto h-full flex flex-col py-8 md:py-12">
            
            {{-- 1. 상단 타이틀 구역 (간격 축소) --}}
            <div class="text-center mb-6 md:mb-10" data-aos="fade-down">
                <h2 class="text-2xl md:text-4xl font-black text-gray-900 mb-2 tracking-tighter">포엑스 일정</h2>
                <p class="text-gray-500 text-sm md:text-base font-medium">교육 및 행사 일정을 확인하세요.</p>
            </div>

            {{-- 2. 달력 영역 (높이 유연화) --}}
            <div class="flex-1 flex flex-col min-h-0 w-full rounded-3xl overflow-hidden bg-[#f4f4f4] shadow-lg border border-gray-100" data-aos="fade-up">
                
                {{-- 달력 네비게이션 (패딩 축소) --}}
                <div class="flex items-center justify-center gap-6 py-4 border-b border-gray-200 bg-[#f4f4f4]">
                    <a href="#" class="text-gray-400 hover:text-blue-700 text-xl"><i class="xi-angle-left"></i></a>
                    <span class="text-xl font-black text-gray-900 tracking-tight">2026. 03</span>
                    <a href="#" class="text-gray-400 hover:text-blue-700 text-xl"><i class="xi-angle-right"></i></a>
                </div>

                {{-- 달력 그리드 (flex-1로 남은 공간 모두 차지) --}}
                <div class="flex-1 grid grid-cols-7 bg-[#f4f4f4] min-h-0">
                    
                    {{-- 요일 헤더 --}}
                    @php $days = ['일', '월', '화', '수', '목', '금', '토']; @endphp
                    @foreach($days as $index => $day)
                        <div class="py-2 border-r border-gray-200 text-xs font-bold bg-gray-50 {{ $index == 0 ? 'text-red-500' : ($index == 6 ? 'text-blue-500' : 'text-gray-800') }}">
                            {{ $day }}
                        </div>
                    @endforeach

                    {{-- 날짜 그리드 --}}
                    @for($i=1; $i<=31; $i++)
                        @php
                            $dayOfWeek = ($i - 1) % 7;
                            $dateColorClass = $dayOfWeek == 0 ? 'text-red-500' : ($dayOfWeek == 6 ? 'text-blue-500' : 'text-gray-800');
                        @endphp

                        {{-- [핵심] min-h를 없애고 flex-1을 주어 화면 크기에 따라 높이가 자동 조절되게 함 --}}
                        <div class="border-r border-t border-gray-200 p-1.5 md:p-2 text-right flex flex-col justify-start items-end gap-1 relative overflow-hidden h-full">
                            
                            {{-- 날짜 숫자 (사이즈 축소) --}}
                            @if($i == 26)
                                <span class="rounded-full bg-orange-500 text-white flex items-center justify-center h-6 w-6 md:h-7 md:w-7 font-bold text-[11px] md:text-xs">
                                    26
                                </span>
                            @else
                                <span class="text-[11px] md:text-xs font-medium {{ $dateColorClass }}">
                                    {{ $i }}
                                </span>
                            @endif

                            {{-- 일정 배지 (폰트 및 간격 축소) --}}
                            <div class="flex flex-col gap-1 w-full text-left overflow-y-auto no-scrollbar">
                                @if($i == 1)
                                    <span class="rounded bg-[#f39c12] text-white font-bold text-[9px] px-1.5 py-0.5 w-fit leading-tight">IECEx CoPC</span>
                                    <span class="rounded bg-[#a55eea] text-white font-bold text-[9px] px-1.5 py-0.5 w-fit leading-tight">방폭교육</span>
                                @endif
                                @if($i == 2)
                                    <span class="rounded bg-[#4b7bec] text-white font-bold text-[9px] px-1.5 py-0.5 w-fit leading-tight">모터기술교육</span>
                                    <span class="rounded bg-[#eb4d4b] text-white font-bold text-[9px] px-1.5 py-0.5 w-full truncate leading-tight">수소안전교육...</span>
                                @endif
                                @if($i == 10)
                                    <span class="rounded bg-[#2bcbba] text-white font-bold text-[9px] px-1.5 py-0.5 w-fit leading-tight">SIL 교육</span>
                                @endif
                                @if($i == 12)
                                    <span class="rounded bg-[#ec407a] text-white font-bold text-[9px] px-1.5 py-0.5 w-fit leading-tight">기타</span>
                                @endif
                            </div>
                        </div>
                    @endfor
                    
                    {{-- 마지막 주 빈 칸 채우기 --}}
                    @for($j=0; $j<4; $j++)
                        <div class="border-t border-gray-200 border-r bg-gray-50/50"></div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if(typeof AOS !== 'undefined') {
            AOS.init({
                once: false,
                offset: 50,
                duration: 800
            });
        }
    });
</script>
@endsection
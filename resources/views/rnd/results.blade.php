@extends('layouts.foex')

@section('title', '연구 실적')

@section('content')

    {{-- [1] 히어로 배너 (R&D 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#0f172a] overflow-hidden">
        <img src="{{ asset('images/rnd/rnd_results_hero.jpg') }}" alt="R&D Results" class="absolute inset-0 w-full h-full object-cover opacity-40" onerror="this.src='https://loremflickr.com/1920/1080/science,data'">
        <div class="absolute inset-0 bg-gradient-to-r from-[#1a1c1e]/60 via-[#1a1c1e]/10 to-transparent pointer-events-none z-0"></div>
        <div class="relative z-10 max-w-[140rem] mx-auto text-center">
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">연구 개발 실적</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-indigo-200 font-medium">산업 안전의 기준을 높이는 포엑스의 학술 및 연구 성과입니다.</p>
        </div>
    </section>

    {{-- [2] 탭 콘텐츠 영역 --}}
    <div class="py-[10rem] bg-white" x-data="{ tab: 'project' }">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">
            
            {{-- 탭 메뉴 --}}
            <div class="flex justify-center gap-[1.5rem] mb-[8rem]">
                <button @click="tab = 'project'" :class="tab === 'project' ? 'bg-indigo-600 text-white shadow-lg' : 'bg-white text-gray-500 border-gray-200'" class="px-[4rem] py-[1.8rem] rounded-full border-[0.2rem] font-bold text-[1.7rem] transition-all">연구 과제</button>
                <button @click="tab = 'paper'" :class="tab === 'paper' ? 'bg-indigo-600 text-white shadow-lg' : 'bg-white text-gray-500 border-gray-200'" class="px-[4rem] py-[1.8rem] rounded-full border-[0.2rem] font-bold text-[1.7rem] transition-all">학술 논문</button>
            </div>

            {{-- 연구 과제 / 학술 논문 리스트 (앞서 만든 프리미엄 리스트 스타일 적용) --}}
            {{-- 2. 콘텐츠 영역 --}}
            
            {{-- [TAB 1: 연구 과제] - 프리미엄 테이블형 --}}
            <div x-show="tab === 'project'" x-cloak class="animate-fade-in-up">
                <div class="bg-white border border-gray-200 rounded-[2rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.02)] overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left min-w-[90rem]">
                            <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-[1.5rem] font-bold uppercase tracking-wider">
                                <tr>
                                    <th class="py-[2.5rem] px-[4rem] w-[20rem] text-center border-r border-gray-100">수행 기간</th>
                                    <th class="py-[2.5rem] px-[4rem]">연구 과제명</th>
                                    <th class="py-[2.5rem] px-[4rem] w-[25rem] text-center border-l border-gray-100">주관 기관</th>
                                </tr>
                            </thead>
                            <tbody class="text-[1.6rem] divide-y divide-gray-100">
                                {{-- 컨트롤러에서 보낸 $projects 변수 사용 --}}
                                @forelse($projects ?? [] as $item)
                                <tr class="hover:bg-indigo-50/30 transition-colors">
                                    <td class="py-[2.5rem] px-[4rem] text-center font-bold text-indigo-600 border-r border-gray-100">
                                        {{ $item->date ? $item->date->format('Y.m') : '-' }}
                                    </td>
                                    <td class="py-[2.5rem] px-[4rem] font-medium text-gray-900 leading-[1.5]">
                                        {{ $item->title }}
                                    </td>
                                    <td class="py-[2.5rem] px-[4rem] text-center text-gray-600 border-l border-gray-100">
                                        {{ $item->agency }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="py-[10rem] text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="xi-folder-open text-[5rem] text-gray-300 mb-[2rem]"></i>
                                            <p class="text-[1.8rem] text-gray-500 font-bold">등록된 연구 과제가 없습니다.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- [TAB 2: 학술 논문] - 프리미엄 아이콘 리스트형 --}}
            <div x-show="tab === 'paper'" x-cloak class="animate-fade-in-up">
                <div class="bg-white border border-gray-200 rounded-[2rem] shadow-[0_1rem_3rem_rgba(0,0,0,0.02)] overflow-hidden">
                    <div class="divide-y divide-gray-100">
                        {{-- 컨트롤러에서 보낸 $papers 변수 사용 --}}
                        @forelse($papers ?? [] as $item)
                        <div class="flex flex-col md:flex-row gap-[3rem] p-[4rem] hover:bg-indigo-50/30 transition-colors items-center group">
                            {{-- 논문 아이콘 --}}
                            <div class="w-[8rem] h-[8rem] bg-indigo-50 text-indigo-600 rounded-[1.5rem] flex items-center justify-center flex-shrink-0 group-hover:bg-indigo-600 group-hover:text-white transition-colors shadow-sm">
                                <i class="xi-paper text-[3rem]"></i>
                            </div>
                            
                            {{-- 논문 정보 --}}
                            <div class="flex-grow text-center md:text-left">
                                <span class="inline-block px-[1.2rem] py-[0.4rem] bg-gray-100 text-gray-500 text-[1.3rem] font-bold rounded-full mb-[1.5rem] group-hover:bg-indigo-100 group-hover:text-indigo-600 transition-colors">
                                    ACADEMIC PAPER
                                </span>
                                <h3 class="text-[2.2rem] font-bold text-gray-900 mb-[1rem] group-hover:text-indigo-600 transition-colors leading-[1.4]">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-[1.6rem] text-gray-500 font-medium">
                                    <span class="text-indigo-600 font-bold">{{ $item->agency }}</span> 
                                    @if($item->date) 
                                        <span class="mx-[1rem] text-gray-300">|</span> 
                                        <span class="text-gray-400">{{ $item->date->format('Y.m') }}</span>
                                    @endif
                                </p>
                            </div>

                            {{-- 원문 보기 버튼 --}}
                            @if($item->file_path)
                            <div class="mt-[2rem] md:mt-0 flex-shrink-0">
                                <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" class="inline-flex items-center px-[3.5rem] py-[1.8rem] bg-white border-[0.2rem] border-gray-200 text-gray-700 font-bold rounded-[1.2rem] hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition-all text-[1.6rem] shadow-sm">
                                    원문 보기 <i class="xi-external-link ml-[1rem]"></i>
                                </a>
                            </div>
                            @endif
                        </div>
                        @empty
                        <div class="py-[15rem] text-center">
                            <i class="xi-paper-o text-[6rem] text-gray-200 mb-[2.5rem] block"></i>
                            <p class="text-[2rem] text-gray-400 font-bold">등록된 학술 논문이 없습니다.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
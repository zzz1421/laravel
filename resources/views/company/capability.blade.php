@extends('layouts.foex')

@section('title', '보유 역량')

@section('content')

    {{-- [1] 히어로 배너 (비즈니스 신뢰 테마) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        <img src="{{ asset('images/company/capability_hero.jpg') }}" alt="Capability" class="absolute inset-0 w-full h-full object-cover opacity-50" onerror="this.src='https://loremflickr.com/1920/1080/business,trust'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/30 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        <div class="relative z-10 max-w-[140rem] mx-auto text-center">
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">보유 역량</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium">검증된 기술력과 풍부한 실적으로 증명하는 포엑스의 신뢰도입니다.</p>
        </div>
    </section>

    {{-- [2] 탭 콘텐츠 영역 --}}
    <div class="py-[10rem] bg-white" x-data="{ tab: 'cert' }">
        <div class="max-w-[140rem] mx-auto px-[4rem] md:px-[18rem]">

            {{-- 탭 메뉴 --}}
            <div class="flex flex-wrap justify-center gap-[1.5rem] mb-[8rem]">
                @foreach(['cert'=>'인증현황', 'performance'=>'사업실적', 'mou'=>'MOU 체결', 'patent'=>'지식재산권'] as $key => $label)
                <button @click="tab = '{{ $key }}'" 
                        :class="tab === '{{ $key }}' ? 'bg-blue-600 text-white border-blue-600 shadow-lg' : 'bg-white text-gray-500 border-gray-200 hover:bg-gray-50'"
                        class="px-[3.5rem] py-[1.8rem] rounded-full border-[0.2rem] font-bold text-[1.7rem] transition-all duration-300 outline-none">
                    {{ $label }}
                </button>
                @endforeach
            </div>

            {{-- 콘텐츠: 인증현황 --}}
            <div x-show="tab === 'cert'" class="animate-fade-in-up">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[4rem]">
                    @forelse($certs ?? [] as $item)
                    <div class="group border border-gray-200 rounded-[2rem] overflow-hidden hover:shadow-xl transition-all bg-white flex flex-col">
                        <div class="h-[32rem] bg-gray-50 flex items-center justify-center p-[3rem]">
                            @if($item->file_path)
                                <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain group-hover:scale-105 transition duration-500">
                            @else
                                <i class="xi-award text-[6rem] text-gray-200"></i>
                            @endif
                        </div>
                        <div class="p-[3rem] text-center border-t border-gray-100 flex-grow flex flex-col justify-center">
                            <h3 class="font-bold text-gray-900 text-[1.8rem] mb-[1rem] leading-[1.4]">{{ $item->title }}</h3>
                            <p class="text-[1.5rem] text-blue-600 font-semibold">{{ $item->agency }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-[10rem] text-center text-gray-400 bg-gray-50 rounded-[2rem] border border-dashed border-gray-200">등록된 인증이 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- 콘텐츠: 사업실적 (테이블형) --}}
            <div x-show="tab === 'performance'" x-cloak class="animate-fade-in-up">
                <div class="bg-white border border-gray-200 rounded-[2.5rem] shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-200 text-gray-500 text-[1.6rem] font-bold">
                            <tr>
                                <th class="py-[2.5rem] px-[4rem] w-[20rem] text-center">기간</th>
                                <th class="py-[2.5rem] px-[4rem]">사업명/내용</th>
                                <th class="py-[2.5rem] px-[4rem] w-[25rem] text-center">발주처</th>
                            </tr>
                        </thead>
                        <tbody class="text-[1.7rem] divide-y divide-gray-100">
                            @forelse($performances ?? [] as $item)
                            <tr class="hover:bg-blue-50/30 transition">
                                <td class="px-[4rem] py-[2.5rem] text-center font-bold text-blue-600">{{ $item->date ? $item->date->format('Y.m') : '-' }}</td>
                                <td class="px-[4rem] py-[2.5rem] font-bold text-gray-900">{{ $item->title }}</td>
                                <td class="px-[4rem] py-[2.5rem] text-center text-gray-600">{{ $item->agency }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="px-[4rem] py-[10rem] text-center text-gray-400">등록된 실적이 없습니다.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 콘텐츠: MOU / 특허 등 나머지 탭들도 동일한 프리미엄 스타일로 구성 --}}
            {{-- ... (생략 - 위와 같은 스타일 적용) ... --}}
            
        </div>
    </div>
@endsection
{{-- [섹션 4] 보유 역량 (Capabilities) --}}
{{-- 🚨 Alpine.js를 통해 탭 상태(capTab)를 관리합니다. 🚨 --}}
<section id="capabilities" 
         class="relative bg-gray-50 flex flex-col justify-center px-[4rem] md:px-[18rem] py-[10rem]" 
         x-data="{ capTab: 'cert' }">
    
    <div class="w-full max-w-[140rem] mx-auto">
        
        {{-- 상단 타이틀 및 탭 메뉴 영역 --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-[6rem]" data-aos="fade-up">
            <div>
                <p class="text-[#f9b417] font-bold text-[1.6rem] mb-[1.5rem] tracking-widest uppercase">Our Capabilities</p>
                <h2 class="text-[3.2rem] md:text-[4.5rem] font-black text-gray-900 tracking-tight leading-[1.2]">
                    증명된 기술과 신뢰
                </h2>
            </div>

            {{-- 탭 메뉴 (루프를 통해 중복 코드 최적화) --}}
            <div class="flex gap-[1rem] mt-[3rem] md:mt-0 overflow-x-auto no-scrollbar pb-[1rem] md:pb-0">
                @foreach(['cert'=>'인증', 'patent'=>'특허', 'performance'=>'실적', 'mou'=>'MOU'] as $key => $label)
                <button @click="capTab = '{{ $key }}'" 
                        :class="capTab === '{{ $key }}' ? 'bg-[#f9b417] text-white border-[#f9b417] shadow-md' : 'bg-white text-gray-500 border-gray-200 hover:bg-gray-50'"
                        class="whitespace-nowrap px-[2.5rem] py-[1.2rem] border-[0.15rem] rounded-[0.4rem] font-bold text-[1.5rem] transition-all duration-300">
                    {{ $label }}
                </button>
                @endforeach
            </div>
        </div>

        {{-- [콘텐츠 영역] 탭에 따라 각기 다른 레이아웃 출력 --}}
        
        {{-- 1. 인증현황 (Grid) --}}
        <div x-show="capTab === 'cert'" x-cloak class="animate-fade-in-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-[2.5rem]">
                @forelse($certs ?? [] as $item)
                <div class="bg-white border border-gray-100 rounded-[1.5rem] p-[3rem] flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-[18rem] flex items-center justify-center mb-[2rem]">
                        <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain" onerror="this.src='https://placehold.co/200x280?text=Certificate'">
                    </div>
                    <h3 class="text-[1.7rem] font-bold text-gray-900 line-clamp-1">{{ $item->title }}</h3>
                    <p class="text-[1.4rem] text-gray-400 mt-[0.5rem]">{{ $item->agency }}</p>
                </div>
                @empty
                <div class="col-span-full py-[10rem] text-center text-gray-400">등록된 인증 정보가 없습니다.</div>
                @endforelse
            </div>
        </div>

        {{-- 2. 지식재산권/특허 (Grid) --}}
        <div x-show="capTab === 'patent'" x-cloak class="animate-fade-in-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-[2.5rem]">
                @forelse($patents ?? [] as $item)
                <div class="bg-white border border-gray-100 rounded-[1.5rem] p-[3rem] flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-[18rem] flex items-center justify-center mb-[2rem]">
                        <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain" onerror="this.src='https://placehold.co/200x280?text=Patent'">
                    </div>
                    <h3 class="text-[1.7rem] font-bold text-gray-900 line-clamp-1">{{ $item->title }}</h3>
                    <p class="text-[1.4rem] text-gray-400 mt-[0.5rem]">{{ $item->date ? $item->date->format('Y.m.d') : '' }}</p>
                </div>
                @empty
                <div class="col-span-full py-[10rem] text-center text-gray-400">등록된 특허 정보가 없습니다.</div>
                @endforelse
            </div>
        </div>

        {{-- 3. 사업실적 (Table) --}}
        <div x-show="capTab === 'performance'" x-cloak class="animate-fade-in-up">
            <div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <tbody class="text-[1.6rem] divide-y divide-gray-50">
                        @forelse($performances ?? [] as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-[2rem] px-[4rem] w-[15rem] font-bold text-[#f9b417]">{{ $item->date ? $item->date->format('Y.m') : '' }}</td>
                            <td class="py-[2rem] px-[4rem] font-medium text-gray-800">{{ $item->title }}</td>
                            <td class="py-[2rem] px-[4rem] text-right text-gray-400">{{ $item->agency }}</td>
                        </tr>
                        @empty
                        <tr><td class="py-[10rem] text-center text-gray-400">등록된 실적이 없습니다.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 4. MOU (Grid) --}}
        <div x-show="capTab === 'mou'" x-cloak class="animate-fade-in-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-[2.5rem]">
                @forelse($mous ?? [] as $item)
                <div class="bg-white border border-gray-100 rounded-[1.5rem] p-[3rem] flex flex-col items-center text-center shadow-sm hover:shadow-md transition-shadow">
                    <div class="h-[12rem] flex items-center justify-center mb-[2rem]">
                        <img src="{{ asset('storage/'.$item->file_path) }}" class="max-w-full max-h-full object-contain mix-blend-multiply" onerror="this.src='https://placehold.co/300x150?text=Partner+Logo'">
                    </div>
                    <h3 class="text-[1.7rem] font-bold text-gray-900">{{ $item->title }}</h3>
                </div>
                @empty
                <div class="col-span-full py-[10rem] text-center text-gray-400">등록된 MOU 정보가 없습니다.</div>
                @endforelse
            </div>
        </div>

        {{-- 하단 페이지 링크 --}}
        <div class="mt-[6rem] text-center">
             <p class="text-gray-400 text-[1.5rem] mb-[2rem]">※ 위 자료는 포엑스의 주요 자산 중 일부를 발췌한 것입니다.</p>
             <a href="{{ route('company.capability') }}" 
                class="inline-flex items-center text-[#303031] font-bold text-[1.6rem] hover:text-[#f9b417] transition-colors group">
                전체 역량 자세히 보기 
                {{-- 앞서 생성한 화살표 아이콘 컴포넌트 적용 --}}
                <x-icons.common.right-arrow class="ml-[1rem] w-[0.8rem] h-[1.2rem] transition-transform group-hover:translate-x-2" />
             </a>
        </div>

    </div>
</section>
cat > /volume1/web/foex_new/resources/views/pr/brochure.blade.php <<'EOF'
@extends('layouts.foex')

@section('title', '홍보자료')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">홍보자료</h1>
            <p class="text-gray-600">포엑스의 브로슈어와 카탈로그를 확인하세요.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            
            {{-- 검색 및 통계 --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4 border-b border-gray-200 pb-4">
                <span class="text-sm text-gray-600 font-medium">
                    전체 <b class="text-amber-600">{{ $brochures->total() }}</b> 건 / 현재 {{ $brochures->currentPage() }} 페이지
                </span>
                <form action="{{ route('pr.brochure') }}" method="GET" class="flex gap-0 w-full md:w-auto">
                    <input type="text" name="search" value="{{ request('search') }}" class="border border-gray-300 px-3 py-2 text-sm w-full md:w-48 focus:outline-none focus:border-amber-500" placeholder="검색어 입력">
                    <button type="submit" class="bg-amber-500 text-white px-3 py-2 hover:bg-amber-600 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            {{-- 브로슈어 그리드 (4열) --}}
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                
                @forelse($brochures as $brochure)
                <div class="group cursor-pointer">
                    <div class="relative bg-gray-100 rounded-lg overflow-hidden border border-gray-200 aspect-[1/1.4] flex items-center justify-center group-hover:shadow-lg transition duration-300">
                        
                        {{-- 썸네일 이미지가 있으면 이미지 출력, 없으면 기본 디자인 출력 --}}
                        @if($brochure->thumbnail && file_exists(public_path('storage/'.$brochure->thumbnail)))
                            <img src="{{ asset('storage/' . $brochure->thumbnail) }}" alt="{{ $brochure->title }}" class="w-full h-full object-cover">
                        @else
                            {{-- 사용자님 디자인: 기본 썸네일 --}}
                            <div class="w-3/4 h-3/4 bg-white shadow-md flex flex-col items-center justify-center text-center p-4 relative z-0">
                                <i class="xi-shield-checked text-4xl text-amber-500 mb-2"></i>
                                <span class="font-bold text-gray-800">FOEX</span>
                                <span class="text-xs text-gray-500 mt-1">Brochure</span>
                            </div>
                        @endif

                        {{-- 호버 시 나타나는 오버레이 --}}
                        <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-10">
                            @if($brochure->file_path)
                                {{-- 파일이 있을 경우 다운로드/미리보기 버튼 활성화 --}}
                                <a href="{{ asset('storage/' . $brochure->file_path) }}" download class="bg-amber-500 text-white text-sm font-bold py-2 px-6 rounded-full hover:bg-amber-600 transition mb-2">
                                    <i class="xi-download mr-1"></i> PDF 다운로드
                                </a>
                                <a href="{{ asset('storage/' . $brochure->file_path) }}" target="_blank" class="bg-white text-gray-800 text-sm font-bold py-2 px-6 rounded-full hover:bg-gray-100 transition">
                                    <i class="xi-eye mr-1"></i> 미리보기
                                </a>
                            @else
                                <span class="text-white font-medium border border-white px-4 py-2 rounded-full">파일 준비중</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition truncate">
                            {{ $brochure->title }}
                        </h3>
                        <div class="flex justify-between items-center mt-1">
                            <p class="text-sm text-gray-400">{{ $brochure->created_at->format('Y.m.d') }}</p>
                            <span class="text-xs text-gray-400"><i class="xi-eye"></i> {{ number_format($brochure->hit) }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center text-gray-400 border-2 border-dashed border-gray-100 rounded-lg">
                    등록된 홍보자료가 없습니다.
                </div>
                @endforelse

            </div>

            {{-- 페이지네이션 --}}
            <div class="mt-12 flex justify-center">
                 {{ $brochures->appends(request()->input())->links('pagination.foex') }}
            </div>
        </div>
    </div>

@endsection
EOF
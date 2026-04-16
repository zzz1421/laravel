@extends('layouts.foex')

{{-- 브라우저 탭 제목 설정 --}}
@section('title', $notice->title)

@section('content')

    {{-- [1] 페이지 헤더 (홍보센터 블루 테마 - 목록과 통일) --}}
    <section class="relative pt-[14rem] pb-[14rem] px-[4rem] md:px-[18rem] bg-[#1a1c1e] overflow-hidden">
        {{-- 뉴스/공지사항/비즈니스 느낌의 배경 이미지 --}}
        <img src="{{ asset('images/pr/notice_hero.jpg') }}" alt="FOEx Notice" class="absolute inset-0 w-full h-full object-cover opacity-50" onerror="this.src='https://loremflickr.com/1920/1080/news,announcement'">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-900/40 to-[#1a1c1e]/90 pointer-events-none z-0"></div>
        
        <div class="relative z-10 max-w-[140rem] mx-auto text-center" data-aos="fade-up">
            <span class="inline-block px-[1.5rem] py-[0.5rem] bg-blue-500/20 border border-blue-400/30 text-blue-300 font-bold tracking-widest text-[1.4rem] uppercase mb-[2rem] rounded-full">
                PR Center
            </span>
            <h1 class="text-[4rem] md:text-[6rem] font-black text-white mb-[2.5rem] tracking-tight">{{ __('pr.notice_title') }}</h1>
            <p class="text-[1.8rem] md:text-[2.2rem] text-gray-300 font-medium break-keep">{{ __('pr.notice_desc') }}</p>
        </div>
    </section>

    {{-- [2] 본문 영역 --}}
    <div class="py-[10rem] bg-white">
        <div class="max-w-[120rem] mx-auto px-[4rem]">
            
            <article class="bg-white">
                
                {{-- 게시글 헤더 영역 --}}
                <div class="border-b-[0.2rem] border-gray-900 pb-[5rem] mb-[6rem]">
                    {{-- 2. 뱃지 스타일 업그레이드 --}}
                    <div class="mb-[2.5rem]">
                        <span class="inline-block px-[1.2rem] py-[0.5rem] bg-blue-600 text-white font-bold text-[1.4rem] rounded-[0.5rem] shadow-sm">
                            {{ __('common.notice') }}
                        </span>
                    </div>
                    
                    <h1 class="text-[3rem] md:text-[4.5rem] font-black text-gray-900 leading-[1.3] mb-[4rem] break-keep">
                        {{ $notice->title }}
                    </h1>
                    
                    {{-- 메타 정보 (작성자, 날짜, 조회수) --}}
                    <div class="flex flex-wrap items-center justify-between gap-[2rem] pt-[3rem] border-t border-gray-100">
                        <div class="flex items-center gap-[2.5rem] text-[1.6rem] text-gray-500">
                            <div class="flex items-center">
                                <span class="font-bold text-gray-900 mr-[1rem]">{{ __('common.writer') }}</span>
                                <span>{{ $notice->writer ?? __('common.admin') }}</span>
                            </div>
                            <span class="w-[0.1rem] h-[1.5rem] bg-gray-200"></span>
                            <div class="flex items-center">
                                <i class="xi-calendar-check mr-[0.8rem]"></i>
                                <span>{{ $notice->created_at->format('Y.m.d') }}</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-[0.8rem] text-[1.6rem] text-gray-400 bg-gray-50 px-[2rem] py-[0.8rem] rounded-full">
                            <i class="xi-eye-o text-[2rem]"></i>
                            <span class="font-bold">{{ number_format($notice->hit) }}</span>
                        </div>
                    </div>
                </div>

                {{-- 게시글 본문 (Rich Text) --}}
                <div class="content-body text-[1.8rem] md:text-[2rem] text-gray-700 leading-[2.0] min-h-[40rem] break-keep">
                    {!! $notice->content !!}
                </div>
                
                {{-- 첨부파일 영역 (데이터가 있을 경우 활성화) --}}
                @if(isset($notice->file_path))
                <div class="mt-[10rem] p-[4rem] bg-gray-50 rounded-[2rem] border border-gray-100 flex flex-col md:flex-row items-center gap-[3rem]">
                    <div class="flex items-center gap-[1.5rem]">
                        <div class="w-[5rem] h-[5rem] bg-white rounded-full flex items-center justify-center shadow-sm">
                            <i class="xi-attachment text-[2.4rem] text-blue-600"></i>
                        </div>
                        <span class="font-bold text-[1.8rem] text-gray-800">{{ __('common.file') }}</span>
                    </div>
                    <a href="{{ asset('storage/' . $notice->file_path) }}" download class="text-[1.7rem] text-blue-600 hover:text-blue-800 font-medium underline underline-offset-4 decoration-2 transition-colors">
                        {{ $notice->file_name ?? '첨부파일 다운로드' }}
                    </a>
                </div>
                @endif

                {{-- 하단 버튼 (목록으로) --}}
                <div class="mt-[10rem] border-t border-gray-100 pt-[6rem] flex justify-center">
                    <a href="{{ route('pr.notice.index') }}" class="inline-flex items-center justify-center bg-gray-900 hover:bg-blue-600 text-white font-bold py-[2rem] px-[8rem] rounded-full text-[1.8rem] transition-all duration-300 shadow-lg hover:shadow-blue-500/20">
                        <i class="xi-list-ul mr-[1rem]"></i> {{ __('common.list') }}
                    </a>
                </div>

            </article>

        </div>
    </div>

    {{-- 본문 스타일 최적화 --}}
    <style>
        .content-body p { margin-bottom: 2rem; }
        .content-body img { max-width: 100%; height: auto; border-radius: 2rem; margin: 4rem auto; box-shadow: 0 2rem 5rem rgba(0,0,0,0.05); }
        .content-body ul { list-style-type: disc; margin-left: 2.5rem; margin-bottom: 2.5rem; }
        .content-body ol { list-style-type: decimal; margin-left: 2.5rem; margin-bottom: 2.5rem; }
        .content-body h2 { font-size: 3rem; font-weight: 800; color: #111; margin-top: 5rem; margin-bottom: 2.5rem; }
        .content-body h3 { font-size: 2.4rem; font-weight: 700; color: #222; margin-top: 4rem; margin-bottom: 2rem; }
        .content-body blockquote { border-left: 0.5rem solid #2563eb; padding-left: 3rem; font-style: italic; color: #444; margin: 4rem 0; }
    </style>

@endsection
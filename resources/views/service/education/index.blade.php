@extends('layouts.foex')

{{-- 1. 페이지 타이틀 교체 --}}
@section('title', __('education.page_title'))

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- 2. 메인 헤더 교체 --}}
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">{{ __('education.title') }}</h2>

        {{-- 알림 메시지 --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($educations as $edu)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            {{-- 3. 상태 뱃지 텍스트 교체 --}}
                            @if($edu->status == 'recruiting')
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ __('education.status.recruiting') }}
                                </span>
                            @elseif($edu->status == 'waiting')
                                <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ __('education.status.waiting') }}
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ __('education.status.closed') }}
                                </span>
                            @endif
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2 truncate">
                            <a href="{{ route('service.edu.show', $edu->id) }}" class="hover:text-blue-600">
                                {{ $edu->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-500 text-sm mb-4">
                            {{ Str::limit(strip_tags($edu->content), 80) }}
                        </p>

                        <div class="space-y-1 text-sm text-gray-600">
                            {{-- 4. 라벨 교체 (교육 기간, 장소, 추후공지) --}}
                            <p>
                                <i class="xi-calendar mr-2"></i>
                                {{ __('education.label.period') }}: 
                                {{-- 날짜 포맷팅 적용 (선택사항) --}}
                                {{ $edu->edu_start->format('Y-m-d') }} ~ {{ $edu->edu_end->format('Y-m-d') }}
                            </p>
                            <p>
                                <i class="xi-map-marker mr-2"></i>
                                {{ __('education.label.place') }}: {{ $edu->place ?? __('education.label.tba') }}
                            </p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        {{-- 5. 버튼 텍스트 교체 --}}
                        <a href="{{ route('service.edu.show', $edu->id) }}" class="block text-center w-full bg-white border border-gray-300 text-gray-700 font-bold py-2 rounded hover:bg-gray-100 transition">
                            {{ __('education.button.details') }}
                        </a>
                    </div>
                </div>
            @empty
                {{-- 6. 데이터 없음 메시지 교체 --}}
                <div class="col-span-3 text-center py-10 text-gray-500">
                    <i class="xi-info-o text-2xl mb-2 block text-gray-300"></i>
                    {{ __('education.empty') }}
                </div>
            @endforelse
        </div>

        {{-- 페이지네이션 --}}
        <div class="mt-8">
            {{ $educations->links() }}
        </div>
    </div>
</div>
@endsection
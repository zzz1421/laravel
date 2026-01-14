@extends('layouts.foex')

@section('title', '역량소개')

@section('content')

    {{-- 상단 헤더 --}}
    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">보유 역량</h1>
            <p class="text-gray-600">포엑스의 특허, 인증, 실적 등 핵심 자산을 소개합니다.</p>
        </div>
    </div>

    {{-- 탭 및 콘텐츠 영역 --}}
    <div class="py-20 bg-white" x-data="{ tab: 'patent' }">
        <div class="max-w-7xl mx-auto px-4">

            {{-- 1. 탭 메뉴 --}}
            <div class="flex flex-wrap justify-center gap-2 mb-12">
                @foreach(['patent'=>'특허', 'cert'=>'인증현황', 'paper'=>'보유논문', 'performance'=>'사업실적', 'mou'=>'MOU 체결'] as $key => $label)
                <button @click="tab = '{{ $key }}'" 
                        :class="{ 'bg-amber-500 text-white border-amber-500': tab === '{{ $key }}', 'bg-white text-gray-600 border-gray-300 hover:bg-gray-50': tab !== '{{ $key }}' }"
                        class="px-6 py-3 rounded-full border font-bold transition-all shadow-sm">
                    {{ $label }}
                </button>
                @endforeach
            </div>

            {{-- 2. 콘텐츠 영역 --}}
            
            {{-- [특허] --}}
            <div x-show="tab === 'patent'" class="animate-fade-in-up">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @forelse($patents as $item)
                    <div class="group border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition bg-white">
                        {{-- 이미지 영역 수정: object-contain 사용 --}}
                        <div class="h-64 bg-gray-50 flex items-center justify-center relative overflow-hidden p-2">
                            @if($item->file_path)
                                <img src="{{ asset('storage/'.$item->file_path) }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                            @else
                                <i class="xi-certificate xi-3x text-gray-300"></i>
                            @endif
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-bold text-gray-900 truncate text-sm md:text-base" title="{{ $item->title }}">{{ $item->title }}</h3>
                            <p class="text-xs text-gray-500 mt-1">{{ $item->agency }} | {{ $item->date ? $item->date->format('Y.m.d') : '' }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-10 text-center text-gray-400">등록된 특허가 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- [인증현황] --}}
            <div x-show="tab === 'cert'" class="animate-fade-in-up" style="display: none;">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @forelse($certs as $item)
                    <div class="group border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition bg-white">
                        {{-- 이미지 영역 수정 --}}
                        <div class="h-64 bg-gray-50 flex items-center justify-center overflow-hidden p-2">
                            @if($item->file_path)
                                <img src="{{ asset('storage/'.$item->file_path) }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                            @else
                                <i class="xi-award xi-3x text-gray-300"></i>
                            @endif
                        </div>
                        <div class="p-4 text-center border-t border-gray-100">
                            <h3 class="font-bold text-gray-900 text-sm md:text-base truncate">{{ $item->title }}</h3>
                            <p class="text-xs text-gray-500 mt-1">{{ $item->agency }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-10 text-center text-gray-400">등록된 인증이 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- [논문] - 리스트형 (이미지 없음) --}}
            <div x-show="tab === 'paper'" class="animate-fade-in-up" style="display: none;">
                <div class="border-t-2 border-gray-800">
                    @forelse($papers as $item)
                    <div class="flex flex-col md:flex-row gap-4 p-6 border-b border-gray-200 hover:bg-gray-50 transition items-center">
                        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-xl">
                            <i class="xi-paper"></i>
                        </div>
                        <div class="flex-grow">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $item->title }}</h3>
                            <p class="text-sm text-gray-600">
                                <span class="font-medium text-amber-600">{{ $item->agency }}</span> 
                                <span class="mx-2 text-gray-300">|</span> 
                                {{ $item->date ? $item->date->format('Y.m') : '' }}
                            </p>
                        </div>
                        @if($item->file_path)
                        <a href="{{ asset('storage/'.$item->file_path) }}" target="_blank" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-900 hover:text-white transition text-sm">
                            논문보기
                        </a>
                        @endif
                    </div>
                    @empty
                    <div class="py-10 text-center text-gray-400">등록된 논문이 없습니다.</div>
                    @endforelse
                </div>
            </div>

            {{-- [실적] - 리스트형 (이미지 없음) --}}
            <div x-show="tab === 'performance'" class="animate-fade-in-up" style="display: none;">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-4 w-32">기간</th>
                                <th class="px-6 py-4">사업명/내용</th>
                                <th class="px-6 py-4 w-48">발주처</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($performances as $item)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">{{ $item->date ? $item->date->format('Y.m') : '-' }}</td>
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $item->title }}</td>
                                <td class="px-6 py-4">{{ $item->agency }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="px-6 py-10 text-center">등록된 실적이 없습니다.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- [MOU] --}}
            <div x-show="tab === 'mou'" class="animate-fade-in-up" style="display: none;">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @forelse($mous as $item)
                    <div class="group border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition bg-white">
                        {{-- 이미지 영역 수정 --}}
                        <div class="h-48 bg-gray-50 flex items-center justify-center relative overflow-hidden p-2">
                            @if($item->file_path)
                                <img src="{{ asset('storage/'.$item->file_path) }}" class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                            @else
                                <i class="xi-handshake xi-3x text-gray-300"></i>
                            @endif
                        </div>
                        <div class="p-4 text-center border-t border-gray-100">
                            <h3 class="font-bold text-gray-900 text-sm truncate" title="{{ $item->title }}">{{ $item->title }}</h3>
                            <p class="text-xs text-gray-500 mt-1">{{ $item->date ? $item->date->format('Y.m.d') : '' }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-10 text-center text-gray-400">등록된 MOU가 없습니다.</div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <style>
        .animate-fade-in-up { animation: fadeInUp 0.5s ease-out; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection
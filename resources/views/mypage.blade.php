@extends('layouts.foex')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 상단 헤더 --}}
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900">{{ __('mypage.title') }}</h2>
            <p class="mt-2 text-gray-600">{{ __('mypage.subtitle') }}</p>
        </div>

        {{-- 알림 메시지 --}}
        @if (session('message') || session('status') == 'verification-link-sent')
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="xi-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 font-bold">
                            {{ __('mypage.verification.sent_title') }}
                        </p>
                        <p class="text-xs text-green-600 mt-1">
                            {{ __('mypage.verification.sent_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            
            {{-- 1. 프로필 헤더 섹션 --}}
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-8 text-white">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-gray-600 rounded-full flex items-center justify-center text-2xl font-bold text-white shadow-inner">
                        <i class="xi-user"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold">{{ $user->name }} 님</h3>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                    </div>
                    <div class="ml-auto">
                        @if($user->level >= 7)
                            <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full font-bold">{{ __('mypage.role.admin') }}</span>
                        @else
                            <span class="bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-bold">{{ __('mypage.role.user') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- 2. 상세 정보 리스트 --}}
            <div class="px-6 py-6 space-y-6">
                
                {{-- 이메일 인증 상태 --}}
                <div class="border-b border-gray-100 pb-6">
                    <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-3">{{ __('mypage.verification.security_status') }}</h4>
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                        <div>
                            <span class="text-gray-700 font-bold text-sm block mb-1">{{ __('mypage.verification.label') }}</span>
                            @if ($user->hasVerifiedEmail())
                                <p class="text-xs text-green-600 flex items-center">
                                    <i class="xi-check-circle mr-1"></i> {{ __('mypage.verification.complete') }}
                                </p>
                            @else
                                <p class="text-xs text-red-500 flex items-center">
                                    <i class="xi-warning mr-1"></i> {{ __('mypage.verification.required') }}
                                </p>
                            @endif
                        </div>

                        <div>
                            @if ($user->hasVerifiedEmail())
                                <span class="px-3 py-1.5 bg-green-100 text-green-700 rounded-lg text-sm font-bold shadow-sm">
                                    {{ __('mypage.verification.badge_complete') }}
                                </span>
                            @else
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg font-bold shadow transition flex items-center">
                                        <i class="xi-mail mr-2"></i> {{ __('mypage.verification.button_send') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- 기본 정보 --}}
                <div>
                    <h4 class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-3">{{ __('mypage.profile.title') }}</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="p-3 border rounded-lg">
                            <span class="text-xs text-gray-400 block">{{ __('mypage.profile.name') }}</span>
                            <span class="text-gray-800 font-medium">{{ $user->name }}</span>
                        </div>
                        <div class="p-3 border rounded-lg">
                            <span class="text-xs text-gray-400 block">{{ __('mypage.profile.phone') }}</span>
                            <span class="text-gray-800 font-medium">{{ $user->phone ?? __('mypage.profile.no_phone') }}</span>
                        </div>
                        <div class="p-3 border rounded-lg">
                            <span class="text-xs text-gray-400 block">{{ __('mypage.profile.joined_at') }}</span>
                            <span class="text-gray-800 font-medium">{{ $user->created_at->format('Y-m-d') }}</span>
                        </div>
                         <div class="p-3 border rounded-lg">
                            <span class="text-xs text-gray-400 block">{{ __('mypage.profile.last_login') }}</span>
                            <span class="text-gray-800 font-medium">{{ now()->format('Y-m-d H:i') }}</span>
                        </div>
                    </div>
                </div>

                {{-- 교육 신청 내역 --}}
                <div class="mt-8 bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
                    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                        <h3 class="text-lg font-bold text-gray-800">
                            <i class="xi-book-o mr-2 text-blue-600"></i>{{ __('mypage.education.title') }}
                        </h3>
                        {{-- ★ 숫자 치환: :count 자리에 변수를 넣어줍니다 --}}
                        <span class="text-xs text-gray-500">{{ __('mypage.education.total', ['count' => count($myApplications)]) }}</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                                <tr>
                                    <th class="px-6 py-3">{{ __('mypage.education.table.course_name') }}</th>
                                    <th class="px-6 py-3">{{ __('mypage.education.table.period') }}</th>
                                    <th class="px-6 py-3">{{ __('mypage.education.table.applied_at') }}</th>
                                    <th class="px-6 py-3 text-center">{{ __('mypage.education.table.status') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($myApplications as $app)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-900">
                                            @if($app->education)
                                                <a href="{{ route('service.edu.show', $app->education->id) }}" class="hover:text-blue-600 hover:underline">
                                                    {{ $app->education->title }}
                                                </a>
                                            @else
                                                <span class="text-gray-400">{{ __('mypage.education.status.deleted') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-600">
                                            @if($app->education)
                                                {{ $app->education->edu_start }} ~ {{ $app->education->edu_end }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-gray-500">
                                            {{ $app->created_at->format('Y-m-d') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @if($app->status == 'approved')
                                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">{{ __('mypage.education.status.approved') }}</span>
                                            @elseif($app->status == 'rejected')
                                                <span class="px-2 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">{{ __('mypage.education.status.rejected') }}</span>
                                            @else
                                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">{{ __('mypage.education.status.pending') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                            <i class="xi-info-o text-2xl mb-2 block text-gray-300"></i>
                                            {{ __('mypage.education.empty') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- 하단 버튼 --}}
                <div class="pt-4 flex justify-end gap-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-red-600 text-sm underline decoration-gray-300 hover:decoration-red-600 transition">
                            {{ __('mypage.logout') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
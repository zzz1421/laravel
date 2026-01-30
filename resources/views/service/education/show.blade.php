@extends('layouts.foex')

@section('title', $education->title)

@section('content')
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 상단 타이틀 --}}
        <div class="border-b pb-6 mb-10">
            <span class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-blue-100 uppercase bg-blue-600 rounded-full">
                {{-- 1. 상태값 다국어 처리 --}}
                @if($education->status == 'recruiting')
                    {{ __('education.status.recruiting') }}
                @elseif($education->status == 'waiting')
                    {{ __('education.status.waiting') }}
                @else
                    {{ __('education.status.closed') }}
                @endif
            </span>
            <h1 class="text-3xl font-bold text-gray-900">{{ $education->title }}</h1>
        </div>

        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            {{-- 왼쪽: 교육 상세 내용 --}}
            <div class="col-span-2 prose max-w-none text-gray-700">
                <h3 class="text-xl font-bold mb-4 border-l-4 border-blue-600 pl-3">{{ __('education.show.details_title') }}</h3>
                <div class="bg-gray-50 p-6 rounded-lg mb-8">
                    {!! $education->content !!}
                </div>

                <h3 class="text-xl font-bold mb-4 border-l-4 border-blue-600 pl-3">{{ __('education.show.info_title') }}</h3>
                <ul class="list-disc pl-5 space-y-2 mb-8">
                    {{-- 2. 라벨 다국어 처리 --}}
                    <li><strong>{{ __('education.label.period') }}:</strong> {{ $education->edu_start->format('Y-m-d') }} ~ {{ $education->edu_end->format('Y-m-d') }}</li>
                    <li><strong>{{ __('education.label.register_period') }}:</strong> {{ $education->register_start->format('Y-m-d') }} ~ {{ $education->register_end->format('Y-m-d') }}</li>
                    <li><strong>{{ __('education.label.place') }}:</strong> {{ $education->place ?? __('education.label.tba') }}</li>
                    <li><strong>{{ __('education.label.capacity') }}:</strong> {{ number_format($education->capacity) }} {{ __('education.label.person') }}</li>
                    <li><strong>{{ __('education.label.price') }}:</strong> {{ number_format($education->price) }} {{ __('education.unit.won') }}</li>
                </ul>
            </div>

            {{-- 오른쪽: 신청 폼 (Sticky) --}}
            <div class="mt-10 lg:mt-0">
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">{{ __('education.show.apply_title') }}</h3>

                    @if(session('error'))
                        <div class="mb-4 p-3 bg-red-100 text-red-700 text-sm rounded">{{ session('error') }}</div>
                    @endif

                    @auth
                        @if($education->status == 'recruiting')
                            <form action="{{ route('service.edu.store', $education->id) }}" method="POST">
                                @csrf
                                <div class="space-y-4">
                                    {{-- 3. 폼 라벨 다국어 처리 --}}
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">{{ __('education.form.name') }}</label>
                                        <input type="text" name="applicant_name" value="{{ old('applicant_name', $user->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">{{ __('education.form.phone') }}</label>
                                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">{{ __('education.form.email') }}</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm" required>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">{{ __('education.form.company') }}</label>
                                            <input type="text" name="company_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">{{ __('education.form.position') }}</label>
                                            <input type="text" name="position" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">{{ __('education.form.memo') }}</label>
                                        <textarea name="memo" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 sm:text-sm"></textarea>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="agree" name="agree_privacy" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" required>
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="agree" class="font-medium text-gray-700">{{ __('education.form.agree') }}</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded hover:bg-blue-700 transition">
                                        {{ __('education.button.submit') }}
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="text-center py-8 bg-gray-50 rounded">
                                <p class="text-gray-500 font-bold">{{ __('education.message.not_period') }}</p>
                                <p class="text-sm text-gray-400 mt-1">
                                    ({{ $education->register_start->format('Y-m-d') }} ~ {{ $education->register_end->format('Y-m-d') }})
                                </p>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-600 mb-4">{{ __('education.message.login_required') }}</p>
                            <a href="{{ route('login') }}" class="inline-block w-full bg-gray-800 text-white font-bold py-3 px-4 rounded hover:bg-gray-900 transition">
                                {{ __('education.button.login') }}
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
        
        <div class="mt-12 text-center">
             <a href="{{ route('service.edu.apply') }}" class="inline-block bg-white border border-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-50">
                 {{ __('education.button.back') }}
             </a>
        </div>
    </div>
</div>
@endsection
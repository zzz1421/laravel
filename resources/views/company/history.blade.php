@extends('layouts.foex')

@section('title', __('menu.history'))

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('history.title') }}</h1>
            <p class="text-gray-600">
                {{ __('history.desc') }}
            </p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            
            @foreach(__('history.years') as $yearData)
            <div class="relative pl-8 md:pl-0 {{ $loop->first ? '' : 'mt-8 md:mt-0' }}">
                
                <div class="md:absolute md:left-0 md:w-32 md:text-right md:pr-8 top-0 mb-4 md:mb-0">
                    <span class="text-4xl font-bold {{ $loop->first ? 'text-blue-600' : 'text-gray-400' }} block">
                        {{ $yearData['year'] }}
                    </span>
                    @if(!empty($yearData['slogan']))
                    <span class="text-sm text-gray-400">{{ $yearData['slogan'] }}</span>
                    @endif
                </div>
                
                <div class="hidden md:block absolute left-32 top-2 bottom-0 w-px bg-gray-200"></div>

                <div class="md:pl-40 space-y-8 pb-16">
                    @foreach($yearData['events'] as $event)
                    <div class="relative group">
                        <div class="hidden md:block absolute -left-[37px] top-2 w-4 h-4 rounded-full bg-white border-4 {{ $loop->parent->first ? 'border-blue-200 group-hover:border-blue-600' : 'border-gray-200 group-hover:border-gray-400' }} transition"></div>
                        
                        <div class="flex items-start">
                            <span class="{{ $loop->parent->first ? 'text-blue-600' : 'text-gray-500' }} font-bold mr-4 w-12 shrink-0">
                                {{ $event['month'] }}
                            </span>
                            <span class="text-gray-800 leading-relaxed">
                                {{ $event['content'] }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection
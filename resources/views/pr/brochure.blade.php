@extends('layouts.foex')

@section('title', 'FOEX - Brochure')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.brochure_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.brochure_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            
            @if($brochures->count() > 0)
                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($brochures as $brochure)
                        <div class="group bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="aspect-[3/4] bg-gray-100 relative overflow-hidden">
                                @if($brochure->image_path)
                                    <img src="{{ asset('storage/' . $brochure->image_path) }}" alt="{{ $brochure->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400">
                                        <i class="xi-image-o text-4xl"></i>
                                    </div>
                                @endif
                                
                                <a href="{{ asset('storage/' . $brochure->pdf_path) }}" download class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-white gap-2">
                                    <i class="xi-download text-4xl mb-2"></i>
                                    <span class="font-bold">Download PDF</span>
                                </a>
                            </div>

                            <div class="p-6">
                                <h3 class="font-bold text-gray-900 text-lg mb-2 truncate" title="{{ $brochure->title }}">
                                    {{ $brochure->title }}
                                </h3>
                                <p class="text-sm text-gray-500 mb-4">
                                    {{ $brochure->created_at->format('Y.m.d') }}
                                </p>
                                
                                <a href="{{ asset('storage/' . $brochure->pdf_path) }}" target="_blank" class="block w-full py-3 text-center border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition font-medium">
                                    {{ __('common.view_pdf') }} <i class="xi-external-link ml-1"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $brochures->links('pagination.foex') }}
                </div>

            @else
                <div class="text-center py-20">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="xi-file-text-o text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">등록된 브로슈어가 없습니다.</h3>
                    <p class="text-gray-500">곧 새로운 자료가 업데이트될 예정입니다.</p>
                </div>
            @endif

        </div>
    </div>

@endsection
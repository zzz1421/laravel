@extends('layouts.foex')

@section('title', __('menu.consulting'))

@section('content')

    <style>
        [x-cloak] { display: none !important; }
        .animate-fade-in { animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Process Box Style */
        .process-box { 
            @apply flex-shrink-0 w-32 h-16 flex items-center justify-center bg-white border border-gray-300 text-gray-700 font-medium text-sm shadow-sm; 
        }
        .process-arrow {
            @apply flex-shrink-0 mx-2 text-gray-400;
        }
        /* Service Table Style */
        .service-table-header { @apply bg-gray-900 text-white text-center font-bold py-3; }
        .service-table-row { @apply flex gap-4; }
        .service-table-col-left { @apply bg-gray-800 text-white text-center font-medium py-4 w-1/2 rounded-sm flex items-center justify-center; }
        .service-table-col-right { @apply bg-gray-800 text-white text-center font-medium py-4 w-1/2 rounded-sm flex items-center justify-center; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('business.cons_title') }}</h1>
            <p class="text-gray-600">{{ __('business.cons_desc') }}</p>
        </div>
    </div>

    <div x-data="{ tab: 'product' }">

        <div class="border-b border-gray-300 bg-white sticky top-20 z-30 shadow-sm">
            <div class="max-w-6xl mx-auto">
                <div class="flex w-full">
                    <button @click="tab = 'product'" 
                        :class="tab === 'product' ? 'border-b-2 border-gray-900 text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-700'"
                        class="w-1/2 py-5 text-center transition duration-200 text-lg">
                        {{ __('business.cons_tab_product') }}
                    </button>

                    <button @click="tab = 'quality'" 
                        :class="tab === 'quality' ? 'border-b-2 border-gray-900 text-gray-900 font-bold' : 'text-gray-500 hover:text-gray-700'"
                        class="w-1/2 py-5 text-center transition duration-200 text-lg">
                        {{ __('business.cons_tab_quality') }}
                    </button>
                </div>
            </div>
        </div>

        <div x-show="tab === 'product'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center mb-2">
                        <span class="w-2 h-2 bg-gray-800 mr-3"></span>
                        {{ __('business.cons_tab_product') }}
                    </h2>
                    <p class="text-gray-500 pl-5">{{ __('business.cons_prod_subtitle') }}</p>
                </div>

                <div class="mb-16 overflow-x-auto pb-4">
                    <div class="flex items-center min-w-[800px] justify-between">
                        <div class="process-box">{{ __('business.proc_develop') }}</div><i class="xi-arrow-right process-arrow"></i>
                        <div class="process-box">{{ __('business.proc_app') }}</div><i class="xi-arrow-right process-arrow"></i>
                        <div class="process-box">{{ __('business.proc_docs') }}</div><i class="xi-arrow-right process-arrow"></i>
                        <div class="process-box">{{ __('business.proc_prod') }}</div><i class="xi-arrow-right process-arrow"></i>
                        <div class="process-box">{{ __('business.proc_qs') }}</div><i class="xi-arrow-right process-arrow"></i>
                        <div class="process-box">{{ __('business.proc_test') }}</div><i class="xi-arrow-right process-arrow"></i>
                        <div class="process-box border-gray-800 text-gray-900 font-bold">{{ __('business.proc_cert') }}</div>
                    </div>
                </div>

                <div class="grid md:grid-cols-12 gap-8 mb-12">
                    <div class="md:col-span-4 bg-gray-100 rounded-xl p-8 h-full">
                        <ul class="space-y-4 text-gray-700 font-medium">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_1') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_2') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_3') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_4') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_5') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_6') }}</li>
                        </ul>
                    </div>
                    <div class="md:col-span-8 border border-gray-200 rounded-xl p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                        <ul class="space-y-6 text-gray-700 font-medium">
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_7') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_8') }}</li>
                            <li class="flex items-center"><span class="w-1.5 h-1.5 bg-gray-400 rounded-full mr-3"></span> {{ __('business.prod_list_9') }}</li>
                        </ul>
                        <div class="w-32 md:w-40 flex-shrink-0 border border-gray-100 shadow-sm p-1">
                            <img src="https://via.placeholder.com/150x200?text=Certificate" alt="IECEx Certificate" class="w-full h-auto opacity-80">
                        </div>
                    </div>
                </div>

                <div class="space-y-2 text-gray-600 text-sm">
                    <p class="flex items-start"><span class="mr-2 text-gray-400">▪</span> {{ __('business.prod_note_1') }}</p>
                    <p class="flex items-start"><span class="mr-2 text-gray-400">▪</span> {{ __('business.prod_note_2') }}</p>
                </div>

                <div class="mt-16 text-center">
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center bg-gray-900 hover:bg-black text-white font-bold py-4 px-12 rounded-lg shadow-lg transition">
                        {{ __('business.btn_cons_inquiry') }} <i class="xi-arrow-right ml-2"></i>
                    </a>
                </div>

            </div>
        </div>

        <div x-show="tab === 'quality'" x-cloak class="animate-fade-in py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4">
                
                <div class="mb-16">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center mb-4">
                        <span class="w-2 h-2 bg-gray-800 mr-3"></span>
                        {{ __('business.cons_tab_quality') }}
                    </h2>
                    <ul class="space-y-2 text-gray-600 pl-5">
                        <li class="flex items-start"><span class="mr-2 text-gray-400">▪</span> {{ __('business.qual_list_1') }}</li>
                        <li class="flex items-start ml-4"><span class="mr-2 text-gray-400">-</span> {{ __('business.qual_list_2') }}</li>
                        <li class="flex items-start ml-4"><span class="mr-2 text-gray-400">-</span> {{ __('business.qual_list_3') }}</li>
                        <li class="flex items-start ml-4"><span class="mr-2 text-gray-400">-</span> {{ __('business.qual_list_4') }}</li>
                    </ul>
                </div>

                <div class="grid md:grid-cols-2 gap-12 items-start">
                    
                    <div class="space-y-4">
                        <div class="service-table-header rounded-t-lg">IECEx Service Facility</div>
                        <div class="service-table-row">
                            <div class="service-table-col-left">IECEx 03-2</div>
                            <div class="service-table-col-right">Selection/Design</div>
                        </div>
                        <div class="service-table-row">
                            <div class="service-table-col-left">IECEx 03-3</div>
                            <div class="service-table-col-right">Installation</div>
                        </div>
                        <div class="service-table-row">
                            <div class="service-table-col-left">IECEx 03-4</div>
                            <div class="service-table-col-right">Inspection</div>
                        </div>
                        <div class="service-table-row">
                            <div class="service-table-col-left rounded-bl-lg">IECEx 03-5</div>
                            <div class="service-table-col-right rounded-br-lg">Repair/Overhaul</div>
                        </div>
                    </div>

                    <div class="rounded-xl overflow-hidden shadow-lg h-[400px]">
                        <img src="https://source.unsplash.com/800x600/?engineers,industrial,team" alt="Quality System" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="mt-16 text-center">
                    <a href="{{ route('service.inquiry') }}" class="inline-flex items-center bg-gray-900 hover:bg-black text-white font-bold py-4 px-12 rounded-lg shadow-lg transition">
                        {{ __('business.btn_qual_inquiry') }} <i class="xi-arrow-right ml-2"></i>
                    </a>
                </div>

            </div>
        </div>

    </div>

@endsection
@extends('layouts.foex')

@section('title', __('menu.intro')) @section('content')

    <div class="relative bg-white">
        <div class="max-w-7xl mx-auto px-4 py-16 md:py-24 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <p class="text-orange-500 font-bold text-lg">{{ __('company.intro_sub') }}</p>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight">
                    {{ __('company.slogan') }}<br>
                    <span class="text-gray-800">{{ __('company.slogan_kr') }}</span>
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed">
                    {!! __('company.intro_desc') !!} </p>
            </div>
            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <img src="https://loremflickr.com/800/600/industrial,engineer,valve" alt="Industrial Engineering" class="w-full h-full object-cover transform hover:scale-105 transition duration-700">
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-amber-400 rounded-full opacity-50 blur-3xl"></div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-lg transition text-center border border-gray-100 group">
                    <div class="w-16 h-16 mx-auto bg-amber-50 rounded-full flex items-center justify-center mb-4 group-hover:bg-amber-400 transition">
                        <i class="xi-book-o text-3xl text-amber-500 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('company.biz_edu') }}</h3>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-lg transition text-center border border-gray-100 group">
                    <div class="w-16 h-16 mx-auto bg-amber-50 rounded-full flex items-center justify-center mb-4 group-hover:bg-amber-400 transition">
                        <i class="xi-lightbulb-o text-3xl text-amber-500 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('company.biz_consulting') }}</h3>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-lg transition text-center border border-gray-100 group">
                    <div class="w-16 h-16 mx-auto bg-amber-50 rounded-full flex items-center justify-center mb-4 group-hover:bg-amber-400 transition">
                        <i class="xi-cog text-3xl text-amber-500 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('company.biz_tech_service') }}</h3>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-lg transition text-center border border-gray-100 group">
                    <div class="w-16 h-16 mx-auto bg-amber-50 rounded-full flex items-center justify-center mb-4 group-hover:bg-amber-400 transition">
                        <i class="xi-shield-checked-o text-3xl text-amber-500 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('company.biz_engineering') }}</h3>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-lg transition text-center border border-gray-100 group">
                    <div class="w-16 h-16 mx-auto bg-amber-50 rounded-full flex items-center justify-center mb-4 group-hover:bg-amber-400 transition">
                        <i class="xi-globus text-3xl text-amber-500 group-hover:text-white transition"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ __('company.biz_rnd') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="py-24 bg-white">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-10 border-l-4 border-amber-400 pl-4">{{ __('company.overview_title') }}</h2>
            
            <div class="border-t-2 border-gray-800">
                <table class="w-full text-left">
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <th class="py-6 px-4 md:px-8 w-1/3 md:w-1/4 bg-gray-50 text-gray-700 font-bold">{{ __('company.name_label') }}</th>
                            <td class="py-6 px-4 md:px-8 text-gray-800 font-medium">{{ __('company.name_value') }}</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <th class="py-6 px-4 md:px-8 bg-gray-50 text-gray-700 font-bold">{{ __('company.ceo_label') }}</th>
                            <td class="py-6 px-4 md:px-8 text-gray-800">{{ __('company.ceo_value') }}</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <th class="py-6 px-4 md:px-8 bg-gray-50 text-gray-700 font-bold">{{ __('company.est_label') }}</th>
                            <td class="py-6 px-4 md:px-8 text-gray-800">{{ __('company.est_value') }}</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <th class="py-6 px-4 md:px-8 bg-gray-50 text-gray-700 font-bold">{{ __('company.loc_label') }}</th>
                            <td class="py-6 px-4 md:px-8 text-gray-800">{{ __('company.loc_value') }}</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <th class="py-6 px-4 md:px-8 bg-gray-50 text-gray-700 font-bold align-top">{{ __('company.cert_label') }}</th>
                            <td class="py-6 px-4 md:px-8 text-gray-800">
                                <ul class="space-y-2 list-disc list-inside text-gray-700">
                                    <li>{{ __('company.cert_1') }}</li>
                                    <li>{{ __('company.cert_2') }}</li>
                                    <li>{{ __('company.cert_3') }}</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
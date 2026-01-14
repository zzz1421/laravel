@extends('layouts.foex')

@section('title', __('menu.organization'))

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('company.org_title') }}</h1>
            <p class="text-gray-600">{{ __('company.org_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            
            <div class="mb-24">
                <h2 class="text-2xl font-bold text-gray-900 mb-12 text-center relative">
                    <span class="relative z-10 bg-white px-4">{{ __('company.org_chart_title') }}</span>
                    <div class="absolute top-1/2 left-0 w-full h-px bg-gray-200 -z-0"></div>
                </h2>

                <div class="flex flex-col items-center">
                    
                    <div class="flex flex-col items-center relative mb-12">
                        <div class="mb-2 flex flex-col items-center">
                            <span class="text-2xl font-bold text-gray-800 tracking-tight">
                                <i class="xi-shield-checked text-yellow-500 mr-1"></i> FOEX
                            </span>
                            <span class="text-xs text-gray-500 font-bold tracking-wider">For Explosion Proof</span>
                        </div>
                        
                        <div class="w-64 bg-amber-400 text-gray-900 rounded shadow-md p-4 text-center relative z-10 border-b-4 border-amber-500">
                            <p class="text-xs font-bold opacity-70 mb-1 uppercase">{{ __('company.org_ceo') }}</p>
                            <h3 class="text-lg font-bold">{{ __('company.org_top_mgt') }}</h3>
                            <div class="absolute -bottom-12 left-1/2 w-px h-12 bg-gray-300"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-16 w-full relative">
                        <div class="absolute -top-12 left-[16.6%] right-[16.6%] h-px bg-gray-300 hidden md:block border-t border-gray-300"></div>
                        <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-px h-12 bg-gray-300 hidden md:block"></div>

                        <div class="flex flex-col items-center relative">
                            <div class="absolute -top-12 left-1/2 w-px h-12 bg-gray-300 hidden md:block"></div>
                            <div class="w-full md:w-56 bg-gray-800 text-white p-4 rounded shadow-md text-center border-b-4 border-gray-900">
                                <h3 class="font-bold">{{ __('company.org_mgt') }}</h3>
                            </div>
                        </div>

                        <div class="flex flex-col items-center relative">
                            <div class="absolute -top-12 left-1/2 w-px h-12 bg-gray-300 hidden md:block"></div>
                            <div class="w-full md:w-56 bg-gray-800 text-white p-4 rounded shadow-md text-center border-b-4 border-gray-900 relative z-10">
                                <h3 class="font-bold">{{ __('company.org_tech_group') }}</h3>
                                <div class="absolute -bottom-8 left-1/2 w-px h-8 bg-gray-300 hidden md:block"></div>
                            </div>
                            <div class="mt-8 w-full md:w-56 bg-gray-500 text-white p-4 rounded shadow-sm text-center border-b-4 border-gray-600">
                                <h3 class="font-medium">{{ __('company.org_eng_staff') }}</h3>
                            </div>
                        </div>

                        <div class="flex flex-col items-center relative">
                            <div class="absolute -top-12 left-1/2 w-px h-12 bg-gray-300 hidden md:block"></div>
                            <div class="w-full md:w-56 bg-gray-800 text-white p-4 rounded shadow-md text-center border-b-4 border-gray-900 relative z-10">
                                <h3 class="font-bold">{{ __('company.org_op_group') }}</h3>
                                <div class="absolute -bottom-8 left-1/2 w-px h-8 bg-gray-300 hidden md:block"></div>
                            </div>
                            <div class="mt-8 w-full md:w-56 bg-gray-500 text-white p-4 rounded shadow-sm text-center border-b-4 border-gray-600">
                                <h3 class="font-medium">{{ __('company.org_op_staff') }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center relative">
                    <span class="relative z-10 bg-white px-4">{{ __('company.contact_title') }}</span>
                    <div class="absolute top-1/2 left-0 w-full h-px bg-gray-200 -z-0"></div>
                </h2>

                <div class="overflow-x-auto bg-white rounded-xl shadow border border-gray-200">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 text-sm uppercase tracking-wider border-b border-gray-200">
                                <th class="p-4 font-bold text-center w-32">{{ __('company.col_name') }}</th>
                                <th class="p-4 font-bold text-center w-32">{{ __('company.col_position') }}</th>
                                <th class="p-4 font-bold text-center">{{ __('company.col_phone') }}</th>
                                <th class="p-4 font-bold text-center">{{ __('company.col_email') }}</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 divide-y divide-gray-100">
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-4 text-center font-bold text-gray-900">{{ app()->getLocale() == 'ko' ? '강규홍' : 'Kang Gyuhong' }}</td>
                                <td class="p-4 text-center">
                                    <span class="inline-block px-2 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded">{{ __('company.pos_ceo') }}</span>
                                </td>
                                <td class="p-4 text-center">
                                    <div class="text-sm">052-277-8922 ({{ __('company.dept_hq') }})</div>
                                    <div class="text-sm text-gray-500">055-293-0251 ({{ __('company.dept_direct') }})</div>
                                </td>
                                <td class="p-4 text-center text-blue-600 hover:underline"><a href="mailto:ghkang@foex.kr">ghkang@foex.kr</a></td>
                            </tr>
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-4 text-center font-bold text-gray-900">{{ app()->getLocale() == 'ko' ? '이선권' : 'Lee Seonkwon' }}</td>
                                <td class="p-4 text-center">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded">{{ __('company.pos_director') }}</span>
                                </td>
                                <td class="p-4 text-center">055-293-0252</td>
                                <td class="p-4 text-center text-blue-600 hover:underline"><a href="mailto:sklee@foex.kr">sklee@foex.kr</a></td>
                            </tr>
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-4 text-center font-bold text-gray-900">{{ app()->getLocale() == 'ko' ? '신영태' : 'Shin Youngtae' }}</td>
                                <td class="p-4 text-center">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded">{{ __('company.pos_researcher') }}</span>
                                </td>
                                <td class="p-4 text-center">055-293-0253</td>
                                <td class="p-4 text-center text-blue-600 hover:underline"><a href="mailto:ytshin@foex.kr">ytshin@foex.kr</a></td>
                            </tr>
                            <tr class="hover:bg-blue-50 transition">
                                <td class="p-4 text-center font-bold text-gray-900">{{ app()->getLocale() == 'ko' ? '신용우' : 'Shin Yongwoo' }}</td>
                                <td class="p-4 text-center">
                                    <span class="inline-block px-2 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded">{{ __('company.pos_researcher') }}</span>
                                </td>
                                <td class="p-4 text-center">055-293-0254</td>
                                <td class="p-4 text-center text-blue-600 hover:underline"><a href="mailto:ywshin@foex.kr">ywshin@foex.kr</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@endsection
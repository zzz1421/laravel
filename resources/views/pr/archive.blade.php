@extends('layouts.foex')

@section('title', '자료실')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('pr.archive_title') }}</h1>
            <p class="text-gray-600">{{ __('pr.archive_desc') }}</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-900 pb-4">
                <div class="text-sm text-gray-600 font-medium">
                    전체 <span class="text-amber-600 font-bold">0</span> 건 / 현재 1 페이지
                </div>
                
                <form class="flex gap-0 w-full md:w-auto">
                    <input type="text" class="border border-gray-300 px-4 py-2 text-sm w-full md:w-64 focus:outline-none focus:border-amber-500">
                    <button type="button" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 transition">
                        <i class="xi-search"></i>
                    </button>
                </form>
            </div>

            <div class="border-t border-gray-300 overflow-x-auto"> <table class="w-full text-sm text-gray-700 min-w-[800px]">
                    <thead class="bg-white border-b border-gray-300 text-gray-800 font-bold">
                        <tr>
                            <th class="py-4 px-4 w-20 text-center">NO</th>
                            <th class="py-4 px-4 text-center">제목</th>
                            <th class="py-4 px-4 w-24 text-center">FILE</th> <th class="py-4 px-4 w-32 text-center">등록일</th>
                            <th class="py-4 px-4 w-24 text-center">조회</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5" class="py-32 text-center text-gray-500">
                                등록된 데이터가 없습니다.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-12 flex justify-center border-t border-gray-200 pt-8">
                <div class="flex items-center gap-1">
                    <a href="#" class="w-8 h-8 flex items-center justify-center bg-gray-900 text-white font-bold text-sm border border-gray-900">1</a>
                </div>
            </div>

        </div>
    </div>

@endsection
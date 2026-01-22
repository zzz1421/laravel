@extends('layouts.admin')

@section('title', '보도자료 등록')
@section('header', '보도자료 등록')

@section('content')

    <div class="bg-white rounded-xl shadow-sm p-6 max-w-4xl mx-auto">
        <form action="{{ route('admin.press.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">제목 <span class="text-red-500">*</span></label>
                <input type="text" name="title" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border" placeholder="예: [전자신문] 포엑스, 글로벌 방폭 인증 획득">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">외부 기사 링크 (URL) <span class="text-red-500">*</span></label>
                    <input type="url" name="link_url" required placeholder="https://news.naver.com/..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                    <p class="text-xs text-gray-400 mt-1">* 클릭 시 이동할 뉴스 기사 주소를 입력하세요.</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">작성자</label>
                    <input type="text" name="writer" value="포엑스" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-amber-500 px-4 py-2 border">
                </div>
            </div>

            <div class="flex items-center gap-2 p-4 bg-gray-50 rounded-lg border border-gray-100">
                <input type="checkbox" name="is_display" id="is_display" value="1" checked class="h-4 w-4 text-amber-600 rounded border-gray-300 focus:ring-amber-500">
                <label for="is_display" class="text-sm font-medium text-gray-700 cursor-pointer">홈페이지에 즉시 노출합니다.</label>
            </div>

            <div class="flex justify-end gap-2 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.press.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2.5 rounded-md hover:bg-gray-200 font-medium transition">취소</a>
                <button type="submit" class="bg-amber-500 text-white px-6 py-2.5 rounded-md hover:bg-amber-600 font-medium transition shadow-sm">등록하기</button>
            </div>
        </form>
    </div>

@endsection
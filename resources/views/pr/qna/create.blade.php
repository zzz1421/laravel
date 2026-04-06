@extends('layouts.foex')

@section('title', 'Q&A 글쓰기')

@section('content')
<div class="py-24 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Q&A 문의하기</h2>
        
        <div class="bg-white rounded-xl shadow-sm p-8">
            <p class="text-gray-500 text-center py-20">여기에 문의 폼(Form)이 들어갈 예정입니다.</p>
            
            <div class="text-center mt-8">
                <a href="{{ route('support.qna.index') }}" class="text-blue-600 hover:underline">목록으로 돌아가기</a>
            </div>
        </div>
    </div>
</div>
@endsection
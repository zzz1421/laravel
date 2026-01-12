@extends('layouts.foex')

@section('title', 'Q&A 상세')

@section('content')

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Q&A</h1>
            <p class="text-gray-600">고객님의 문의사항에 대한 답변을 확인하세요.</p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">

            <div class="border-t-2 border-gray-900 border-b border-gray-200 mb-12">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">
                        <span class="text-amber-500 mr-2">[Q]</span>
                        [IECEx CoPC] 방폭컨설팅 견적 문의 건.
                    </h2>
                    <div class="flex gap-4 text-sm text-gray-500">
                        <span>작성자: 손**</span>
                        <span class="w-px h-3 bg-gray-300 mt-1"></span>
                        <span>등록일: 2023.09.22</span>
                        <span class="w-px h-3 bg-gray-300 mt-1"></span>
                        <span>조회: 15</span>
                    </div>
                </div>

                <div class="p-8 min-h-[200px] text-gray-700 leading-relaxed">
                    <p>안녕하세요, 포엑스 담당자님.</p>
                    <p>당사는 OO지역에서 선박 부품을 제조하는 업체입니다.</p>
                    <br>
                    <p>이번에 IECEx CoPC 관련하여 컨설팅을 받고자 하는데,</p>
                    <p>대략적인 비용과 기간이 얼마나 소요되는지 견적 부탁드립니다.</p>
                    <br>
                    <p>첨부드린 사양서를 확인해 주시면 감사하겠습니다.</p>
                </div>

                <div class="px-6 py-4 border-t border-gray-100 flex items-center gap-2 bg-gray-50/50">
                    <span class="text-xs font-bold text-gray-500 bg-white border border-gray-300 px-2 py-1 rounded">FILE</span>
                    <a href="#" class="text-sm text-gray-600 hover:text-blue-600 hover:underline flex items-center">
                        <i class="xi-diskette mr-1"></i> 사양서_v1.0.pdf
                    </a>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-xl p-8 mb-12 relative overflow-hidden">
                <i class="xi-message text-9xl text-blue-100 absolute -top-4 -right-4"></i>

                <h3 class="text-lg font-bold text-blue-800 mb-4 flex items-center relative z-10">
                    <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded mr-2">Admin</span>
                    안녕하세요, 포엑스(주) 입니다.
                </h3>
                
                <div class="text-gray-700 leading-relaxed relative z-10 space-y-2">
                    <p>문의주신 내용 잘 확인하였습니다.</p>
                    <p>IECEx CoPC 컨설팅의 경우, 기업의 규모와 현재 준비 상태에 따라 기간 및 비용이 상이합니다.</p>
                    <p>남겨주신 이메일(aaa@domain.com)로 상세 견적서를 발송해 드렸으니 확인 부탁드립니다.</p>
                    <br>
                    <p>추가로 궁금하신 사항은 055-293-0521로 연락 주시면 친절히 안내해 드리겠습니다.</p>
                    <p>감사합니다.</p>
                </div>

                <div class="mt-6 pt-6 border-t border-blue-200/50 text-sm text-blue-500 relative z-10">
                    답변일시: 2023.09.23 10:30
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex gap-2">
                    <button class="bg-gray-100 text-gray-600 px-4 py-2 text-sm hover:bg-gray-200">수정</button>
                    <button class="bg-gray-100 text-gray-600 px-4 py-2 text-sm hover:bg-gray-200">삭제</button>
                </div>

                <a href="{{ route('pr.qna') }}" class="bg-gray-900 text-white px-6 py-3 font-bold hover:bg-black transition">
                    목록으로
                </a>
            </div>

        </div>
    </div>

@endsection
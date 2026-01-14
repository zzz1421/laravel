@extends('layouts.foex')

@section('title', '상담 및 견적 문의')

@section('content')

    <style>
        /* 입력 폼 테이블 스타일 */
        .form-table { w-full border-t-2 border-gray-800 border-b border-gray-200; }
        .form-table th { @apply bg-gray-50 text-gray-800 font-bold py-4 px-6 border-b border-gray-200 w-40 md:w-48 text-left align-middle; }
        .form-table td { @apply py-4 px-6 border-b border-gray-200 text-gray-600 align-middle; }
        .form-input { @apply border border-gray-300 px-4 py-2 w-full max-w-md focus:outline-none focus:border-amber-500 transition-colors rounded-sm; }
        .form-textarea { @apply border border-gray-300 px-4 py-2 w-full focus:outline-none focus:border-amber-500 transition-colors rounded-sm resize-none; }
        .required-star { @apply text-amber-500 ml-1; }
    </style>

    <div class="bg-gray-50 py-16 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">상담 및 견적 문의</h1>
            <p class="text-gray-600">
                궁금하신 사항이나 견적 문의를 남겨주시면 담당자가 검토 후 신속히 연락드리겠습니다.
            </p>
        </div>
    </div>

    <div class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-4">

            <form action="#" method="POST" enctype="multipart/form-data"> @csrf
                
                <div class="mb-12">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="w-1.5 h-6 bg-amber-500 mr-2"></span> 개인정보 수집 및 이용 동의
                    </h3>
                    <div class="bg-gray-50 border border-gray-200 p-6 rounded-sm h-40 overflow-y-auto text-sm text-gray-600 leading-relaxed mb-4">
                        1. 수집하는 개인정보 항목: 회사명, 담당자명, 연락처, 이메일<br>
                        2. 개인정보 수집 및 이용 목적: 문의에 대한 답변 및 안내<br>
                        3. 개인정보 보유 및 이용 기간: 문의 접수 후 3년간 보관 (이후 파기)<br>
                        4. 귀하는 개인정보 수집 및 이용에 거부할 권리가 있으며, 거부 시 문의 접수가 제한될 수 있습니다.
                    </div>
                    <div class="flex items-center justify-end">
                        <input type="checkbox" id="privacy_agree" name="privacy_agree" class="w-4 h-4 text-amber-500 border-gray-300 rounded focus:ring-amber-500 cursor-pointer">
                        <label for="privacy_agree" class="ml-2 text-gray-800 font-medium cursor-pointer">개인정보 수집 및 이용에 동의합니다.</label>
                    </div>
                </div>

                <div class="mb-12">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="w-1.5 h-6 bg-amber-500 mr-2"></span> 문의 내용 작성
                    </h3>
                    
                    <table class="w-full border-t-2 border-gray-800">
                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left w-32 md:w-48">
                                문의 구분 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <div class="flex flex-wrap gap-6">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="type" value="consulting" class="text-amber-500 focus:ring-amber-500" checked>
                                        <span class="ml-2 text-gray-700">방폭/기술 컨설팅</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="type" value="estimate" class="text-amber-500 focus:ring-amber-500">
                                        <span class="ml-2 text-gray-700">견적 문의</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="type" value="education" class="text-amber-500 focus:ring-amber-500">
                                        <span class="ml-2 text-gray-700">교육 관련</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" name="type" value="etc" class="text-amber-500 focus:ring-amber-500">
                                        <span class="ml-2 text-gray-700">기타</span>
                                    </label>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left">
                                회사명 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <input type="text" name="company" class="form-input" placeholder="회사명을 입력하세요">
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left">
                                담당자명 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <input type="text" name="name" class="form-input" placeholder="담당자 성함을 입력하세요">
                            </td>
                        </tr>

                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left">
                                연락처 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2 max-w-md">
                                    <input type="text" name="phone1" class="form-input w-20 text-center" maxlength="3">
                                    <span class="text-gray-400">-</span>
                                    <input type="text" name="phone2" class="form-input w-24 text-center" maxlength="4">
                                    <span class="text-gray-400">-</span>
                                    <input type="text" name="phone3" class="form-input w-24 text-center" maxlength="4">
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left">
                                이메일 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <div class="flex flex-col md:flex-row md:items-center gap-2 max-w-lg">
                                    <input type="text" name="email_id" class="form-input" placeholder="이메일 아이디">
                                    <span class="text-gray-400">@</span>
                                    <input type="text" name="email_domain" class="form-input" placeholder="직접입력">
                                    <select class="form-input md:w-40" onchange="this.previousElementSibling.value = this.value">
                                        <option value="">직접입력</option>
                                        <option value="naver.com">naver.com</option>
                                        <option value="gmail.com">gmail.com</option>
                                        <option value="daum.net">daum.net</option>
                                        <option value="foex.co.kr">foex.co.kr</option>
                                    </select>
                                </div>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left">
                                제목 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <input type="text" name="title" class="form-input w-full max-w-full" placeholder="문의 제목을 입력해주세요">
                            </td>
                        </tr>

                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left align-top pt-6">
                                문의 내용 <span class="required-star">*</span>
                            </th>
                            <td class="py-4 px-6">
                                <textarea name="content" rows="10" class="form-textarea" placeholder="문의하실 내용을 구체적으로 기재해 주시면 보다 정확한 상담이 가능합니다."></textarea>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-200">
                            <th class="bg-gray-50 text-gray-800 font-bold py-4 px-6 text-left">
                                첨부파일
                            </th>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    <label class="bg-white border border-gray-300 text-gray-600 px-4 py-2 rounded-sm cursor-pointer hover:bg-gray-50 hover:text-gray-800 transition text-sm">
                                        <i class="xi-file-upload-o mr-1"></i> 파일 선택
                                        <input type="file" name="file" class="hidden">
                                    </label>
                                    <span class="text-xs text-gray-400 ml-2">* 10MB 이하의 파일만 업로드 가능합니다.</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="flex justify-center gap-3">
                    <a href="{{ route('home') }}" class="bg-gray-200 text-gray-700 font-bold py-4 px-10 rounded-sm hover:bg-gray-300 transition">
                        취소하기
                    </a>
                    <button type="submit" class="bg-amber-500 text-white font-bold py-4 px-12 rounded-sm hover:bg-amber-600 transition shadow-md">
                        문의 접수하기
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
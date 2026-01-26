@extends('layouts.foex')

@section('title', '회원가입 - 본인인증')

@section('content')
<div class="py-20 bg-gray-50 min-h-[70vh]">
    <div class="max-w-4xl mx-auto px-4">
        
        {{-- 단계 표시 (Step Bar) --}}
        <div class="flex justify-between items-center mb-12 relative">
            <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 -z-10"></div>
            
            <div class="flex flex-col items-center z-10">
                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-md">1</div>
                <span class="text-sm font-bold text-blue-700 mt-2">본인인증</span>
            </div>
            <div class="flex flex-col items-center z-10">
                <div class="w-10 h-10 rounded-full bg-white border-2 border-gray-300 text-gray-400 flex items-center justify-center font-medium">2</div>
                <span class="text-xs text-gray-500 mt-2">이용약관</span>
            </div>
            <div class="flex flex-col items-center z-10">
                <div class="w-10 h-10 rounded-full bg-white border-2 border-gray-300 text-gray-400 flex items-center justify-center font-medium">3</div>
                <span class="text-xs text-gray-500 mt-2">정보입력</span>
            </div>
            <div class="flex flex-col items-center z-10">
                <div class="w-10 h-10 rounded-full bg-white border-2 border-gray-300 text-gray-400 flex items-center justify-center font-medium">4</div>
                <span class="text-xs text-gray-500 mt-2">가입완료</span>
            </div>
        </div>

        {{-- 본인인증 폼 컨테이너 --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 md:p-12 max-w-xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">휴대폰 본인인증</h2>
                <p class="text-gray-500 text-sm">안전한 회원가입을 위해 휴대폰 인증을 진행해 주세요.</p>
            </div>

            <div class="space-y-6">
                {{-- 이름 입력 --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">이름</label>
                    <input type="text" id="mb_name" placeholder="실명을 입력하세요"
                           class="w-full px-4 py-3 border border-gray-300 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
                </div>

                {{-- 휴대폰 번호 입력 --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">휴대폰 번호</label>
                    <div class="flex gap-2">
                        <input type="text" id="mb_hp" placeholder="'-' 없이 숫자만 입력" maxlength="11"
                               class="flex-1 px-4 py-3 border border-gray-300 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
                        <button type="button" onclick="sendAuthCode()" id="btn_send"
                                class="bg-gray-800 text-white px-4 py-3 rounded hover:bg-black transition font-medium whitespace-nowrap">
                            인증번호 발송
                        </button>
                    </div>
                    <p id="hp_msg" class="text-xs mt-1 text-red-500 hidden"></p>
                </div>

                {{-- 인증번호 입력 (초기에는 숨김) --}}
                <div id="auth_code_area" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-1">인증번호</label>
                    <div class="flex gap-2">
                        <input type="text" id="auth_code" placeholder="인증번호 6자리" maxlength="6"
                               class="flex-1 px-4 py-3 border border-gray-300 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
                        <button type="button" onclick="verifyAuthCode()" id="btn_verify"
                                class="bg-blue-600 text-white px-4 py-3 rounded hover:bg-blue-700 transition font-medium whitespace-nowrap">
                            확인
                        </button>
                    </div>
                    <p class="text-xs text-blue-600 mt-1" id="timer_msg"></p>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- 스크립트 (AJAX 처리) --}}
<script>
    // 1. 인증번호 발송 요청
    async function sendAuthCode() {
        const name = document.getElementById('mb_name').value;
        const hp = document.getElementById('mb_hp').value;
        const msgBox = document.getElementById('hp_msg');
        const btnSend = document.getElementById('btn_send');

        if(!name) { alert('이름을 입력해주세요.'); return; }
        if(!hp) { alert('휴대폰 번호를 입력해주세요.'); return; }

        // 로딩 상태
        btnSend.disabled = true;
        btnSend.innerText = '전송중...';

        try {
            const response = await fetch("{{ route('register.sms.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ name: name, phone: hp })
            });

            const data = await response.json();

            if (data.success) {
                alert(data.message); // 실제로는 alert 제거하거나 부드럽게 표현
                
                // UI 변경
                document.getElementById('auth_code_area').classList.remove('hidden');
                document.getElementById('mb_name').readOnly = true;
                document.getElementById('mb_hp').readOnly = true;
                document.getElementById('mb_name').classList.add('bg-gray-100');
                document.getElementById('mb_hp').classList.add('bg-gray-100');
                btnSend.innerText = '재발송';
                btnSend.disabled = false;
                msgBox.classList.add('hidden');
            } else {
                alert('오류 발생: ' + JSON.stringify(data));
                btnSend.disabled = false;
                btnSend.innerText = '인증번호 발송';
            }
        } catch (error) {
            // 유효성 검사 실패 등 에러 처리
            console.error('Error:', error);
            // Laravel 유효성 검사 에러 메세지 파싱 (간단 예시)
            msgBox.innerText = '입력 정보를 확인해주세요. (이미 가입된 번호일 수 있습니다)';
            msgBox.classList.remove('hidden');
            btnSend.disabled = false;
            btnSend.innerText = '인증번호 발송';
        }
    }

    // 2. 인증번호 확인 요청
    async function verifyAuthCode() {
        const code = document.getElementById('auth_code').value;

        if(!code) { alert('인증번호를 입력해주세요.'); return; }

        try {
            const response = await fetch("{{ route('register.sms.verify') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: code })
            });

            const data = await response.json();

            if (data.success) {
                alert('본인인증이 완료되었습니다. 다음 단계로 이동합니다.');
                window.location.href = data.redirect_url;
            } else {
                alert(data.message);
            }
        } catch (error) {
            alert('인증번호 확인 중 오류가 발생했습니다.');
        }
    }
</script>
@endsection
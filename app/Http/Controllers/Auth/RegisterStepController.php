<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log; // 로그 확인용
use Illuminate\Support\Facades\Session;

class RegisterStepController extends Controller
{
    /**
     * 1단계: 본인인증 화면 출력
     */
    public function showCertification()
    {
        return view('auth.certification');
    }

    /**
     * SMS 인증번호 발송 처리 (AJAX)
     */
    public function sendSms(Request $request)
    {
        // 1. 유효성 검사 (이미 가입된 번호인지 확인)
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric|digits_between:10,11|unique:users,phone',
        ], [
            'phone.unique' => '이미 가입된 휴대폰 번호입니다.',
            'phone.numeric' => '전화번호는 숫자만 입력해주세요.',
        ]);

        // 2. 인증번호 생성 (6자리 난수)
        $authCode = rand(100000, 999999);

        // 3. 세션에 인증 정보 저장 (이름, 번호, 인증번호)
        // 실제 운영 시에는 Redis나 DB에 저장하는 것이 더 안전합니다.
        Session::put('auth_data', [
            'name' => $request->name,
            'phone' => $request->phone,
            'code' => $authCode,
            'verified' => false
        ]);

        // 4. [중요] 실제 SMS 발송 로직 (알리고, 쿨에스엠에스 등 API 연동 필요)
        // 현재는 테스트를 위해 로그에만 기록합니다. (storage/logs/laravel.log 확인)
        Log::info("SMS 발송 [{$request->phone}]: 인증번호 [{$authCode}]");

        return response()->json([
            'success' => true,
            'message' => '인증번호가 발송되었습니다. (테스트용: ' . $authCode . ')',
            'debug_code' => $authCode // 개발 중에만 사용, 실서버 제거 필요
        ]);
    }

    /**
     * SMS 인증번호 검증 처리 (AJAX)
     */
    public function verifySms(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        $sessionData = Session::get('auth_data');

        // 세션이 없거나 인증번호가 틀린 경우
        if (!$sessionData || $sessionData['code'] != $request->code) {
            return response()->json([
                'success' => false,
                'message' => '인증번호가 일치하지 않습니다.'
            ], 422);
        }

        // 인증 성공 처리
        $sessionData['verified'] = true;
        Session::put('auth_data', $sessionData);

        return response()->json([
            'success' => true,
            'message' => '인증되었습니다.',
            'redirect_url' => route('register.agreement') // 다음 단계 주소
        ]);
    }

    /**
     * 2단계: 약관동의 (테스트용 껍데기)
     */
    public function showAgreement()
    {
        // 1단계 인증 안 하고 들어오면 튕겨내기
        $authData = Session::get('auth_data');
        if (!$authData || !$authData['verified']) {
            return redirect()->route('register.certification')->with('error', '본인인증을 먼저 진행해주세요.');
        }

        return view('auth.agreement'); // 다음 뷰 파일 필요
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationApplication;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        // [수정] 숨김 처리된 교육 과정 제외
        $educations = Education::where('is_display', true) // ★ 추가됨
                               ->orderBy('created_at', 'desc')
                               ->paginate(9);
                               
        return view('service.education.index', compact('educations'));
    }

    public function show($id)
    {
        // [수정] 숨김 처리된 교육 상세 접근 차단
        $education = Education::where('is_display', true)->findOrFail($id); // ★ 추가됨
        
        $user = Auth::user(); 

        return view('service.education.show', compact('education', 'user'));
    }

    /**
     * [처리] 교육 신청 DB 저장
     */
    public function store(Request $request, $id)
    {
        // 1. 유효성 검사
        $request->validate([
            'applicant_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'agree_privacy' => 'required',
        ]);

        // 2. 이미 신청했는지 확인 (중복 방지)
        $exists = EducationApplication::where('user_id', Auth::id())
                    ->where('education_id', $id)
                    ->exists();

        if ($exists) {
            return back()->with('error', '이미 신청하신 교육 과정입니다.');
        }

        // 3. DB 저장
        EducationApplication::create([
            'user_id'        => Auth::id(),
            'education_id'   => $id,
            'applicant_name' => $request->applicant_name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'company_name'   => $request->company_name,
            'position'       => $request->position,
            'memo'           => $request->memo,
            'status'         => 'waiting', // 초기 상태: 대기
        ]);

        // 4. 완료 후 이동
        return redirect()->route('service.edu.apply')->with('success', '교육 신청이 완료되었습니다. 관리자 승인을 기다려주세요.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationApplication;
use App\Models\Education;

class EducationAdminController extends Controller
{
    /**
     * [1] 교육 과정 관리 (메인 목록)
     * - 여기서 교육 과정을 개설하고, 목록을 봅니다.
     */
    public function index()
    {
        // 신청자 수(applications_count)도 같이 세어서 가져옵니다.
        $educations = Education::withCount('applications')
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);

        return view('admin.education.index', compact('educations'));
    }

    /**
     * [2] 특정 교육 과정의 신청자 목록 보기
     * - 교육 목록에서 클릭해서 들어옵니다.
     */
    public function applications(Request $request, $id)
    {
        // 현재 선택한 교육 과정 정보
        $currentEducation = Education::findOrFail($id);

        // 해당 교육 과정의 신청자만 가져오기
        $query = EducationApplication::where('education_id', $id)
                    ->orderBy('created_at', 'desc');

        if ($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
                $q->where('applicant_name', 'like', '%' . $request->keyword . '%')
                  ->orWhere('company_name', 'like', '%' . $request->keyword . '%');
            });
        }

        $applications = $query->paginate(20);

        return view('admin.education.application_list', compact('applications', 'currentEducation'));
    }

    /**
     * [관리자] 승인 처리 (Ajax 또는 폼 전송)
     */
    public function approve($id)
    {
        $app = EducationApplication::findOrFail($id);
        
        $app->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);

        // ★ 여기서 나중에 "메일 발송 코드"를 추가할 예정입니다.

        return back()->with('success', '승인 처리되었습니다.');
    }

    /**
     * [관리자] 반려/취소 처리
     */
    public function reject($id)
    {
        $app = EducationApplication::findOrFail($id);
        
        $app->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', '반려 처리되었습니다.');
    }
    /**
     * [관리자] 교육 과정 등록 페이지 보여주기
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * [관리자] 교육 과정 DB 저장
     */
    public function store(Request $request)
    {
        // 1. 유효성 검사
        $request->validate([
            'title' => 'required',
            'edu_start' => 'required',
            'edu_end' => 'required',
            'capacity' => 'required|integer',
        ]);

        // 2. DB 저장
        Education::create([
            'title'          => $request->title,
            'content'        => $request->content, // 에디터 내용
            'status'         => $request->status,
            'price'          => $request->price ?? 0,
            'capacity'       => $request->capacity,
            'register_start' => $request->register_start,
            'register_end'   => $request->register_end,
            'edu_start'      => $request->edu_start,
            'edu_end'        => $request->edu_end,
            'place'          => $request->place,
        ]);

        // 3. 완료 후 목록(또는 신청관리)으로 이동
        // (나중에 교육과정 목록 페이지를 만들면 그리로 보내면 됩니다)
        return redirect()->route('admin.education.applications')
            ->with('success', '새로운 교육 과정이 개설되었습니다.');
    }

    public function show($id)
    {
        // 신청자 수(applications_count)도 같이 세어서 가져옴
        $education = \App\Models\Education::withCount('applications')->findOrFail($id);

        return view('admin.education.show', compact('education'));
    }

    /**
     * 수정 페이지 보여주기
     */
    public function edit($id)
    {
        $education = \App\Models\Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    /**
     * 수정 내용 업데이트 처리
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            // 필요한 유효성 검사 규칙 추가...
        ]);

        $education = \App\Models\Education::findOrFail($id);
        
        // 데이터 업데이트
        $education->update($request->all()); 
        // 또는 $education->update(['title' => $request->title, ...]);

        return redirect()->route('admin.education.show', $id) // 수정 후 상세페이지로 이동
                ->with('success', '교육 과정이 수정되었습니다.');
    }

    public function destroy($id)
    {
        // 데이터 찾기
        $education = \App\Models\Education::findOrFail($id);
        
        // 삭제 실행
        $education->delete();

        // 목록 페이지로 돌아가면서 메시지 띄우기
        return redirect()->route('admin.education.index')
                ->with('success', '교육 과정이 삭제되었습니다.');
    }
}
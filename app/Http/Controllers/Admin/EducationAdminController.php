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
     */
    public function applications(Request $request, $id)
    {
        $currentEducation = Education::findOrFail($id);

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
     * [관리자] 승인 처리
     */
    public function approve($id)
    {
        $app = EducationApplication::findOrFail($id);
        
        $app->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);

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
     * [관리자] 교육 과정 등록 페이지
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
        $request->validate([
            'title' => 'required',
            'edu_start' => 'required',
            'edu_end' => 'required',
            'capacity' => 'required|integer',
        ]);

        Education::create([
            'title'          => $request->title,
            'content'        => $request->content,
            'status'         => $request->status,
            'price'          => $request->price ?? 0,
            'capacity'       => $request->capacity,
            'register_start' => $request->register_start,
            'register_end'   => $request->register_end,
            'edu_start'      => $request->edu_start,
            'edu_end'        => $request->edu_end,
            'place'          => $request->place,
            'is_display'     => $request->has('is_display'),
        ]);

        // [수정] applications 라우트는 ID가 필요하므로 index(목록)으로 보냅니다.
        return redirect()->route('admin.education.index')
            ->with('success', '새로운 교육 과정이 개설되었습니다.');
    }

    public function show($id)
    {
        $education = Education::withCount('applications')->findOrFail($id);
        return view('admin.education.show', compact('education'));
    }

    /**
     * 수정 페이지
     */
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    /**
     * 수정 내용 업데이트 처리
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $education = Education::findOrFail($id);
        
        // [수정] 체크박스 값 처리를 위해 데이터를 준비합니다.
        $data = $request->all();
        // 체크박스가 해제되면 request에 값이 없으므로 명시적으로 has()를 확인해야 합니다.
        $data['is_display'] = $request->has('is_display'); 

        // 데이터 업데이트 실행
        $education->update($data); 

        return redirect()->route('admin.education.show', $id)
                ->with('success', '교육 과정이 수정되었습니다.');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('admin.education.index')
                ->with('success', '교육 과정이 삭제되었습니다.');
    }
}
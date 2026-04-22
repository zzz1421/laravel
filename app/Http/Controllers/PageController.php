<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EducationApplication;
use Carbon\Carbon; // 날짜 계산용
use App\Models\Schedule; // ★ 이 줄이 반드시 있어야 에러가 안 납니다!
use App\Models\PressRelease; // 상단에 추가 필수!
use App\Models\PromotionalVideo;
use App\Models\Brochure;
use App\Models\Capability;
use App\Models\Archive;
use App\Models\Qna;


class PageController extends Controller
{

    public function mypage()
    {
        $user = Auth::user();
        
        // ★ 내가 신청한 교육 내역 가져오기 (최신순)
        // 'education'은 교육 과정 정보(제목 등)를 가져오기 위한 관계입니다.
        $myApplications = EducationApplication::with('education')
                                ->where('user_id', $user->id)
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('mypage', compact('user', 'myApplications'));
    }
    public function intro() {
        // 기업소개 페이지에 통합될 역량 데이터 조회
        $patents = \App\Models\Capability::where('category', 'patent')->orderBy('date', 'desc')->take(4)->get();
        $certs = \App\Models\Capability::where('category', 'cert')->orderBy('date', 'desc')->take(4)->get();
        $performances = \App\Models\Capability::where('category', 'performance')->orderBy('date', 'desc')->take(5)->get();
        $mous = \App\Models\Capability::where('category', 'mou')->orderBy('date', 'desc')->take(4)->get();

        return view('company.intro', compact('patents', 'certs', 'performances', 'mous'));
    }

    // [추가] CEO 인사말 (새로 분리)
    public function greeting() {
        return view('company.greeting');
    }
    
    // 회사소개 - 연혁
    public function history() {
        return view('company.history');
    }

    public function ai()
    {
        // resources/views/business/ai.blade.php 파일을 보여줌
        return view('rnd.ai'); 
    }

    public function cbm()
    {
        // resources/views/business/cbm.blade.php 파일을 보여줌
        return view('rnd.cbm');
    }

    // [1] R&D - 연구 개발 실적 (기술 중심)
    public function results()
    {
        // 1. 학술 논문 데이터
        $papers = \App\Models\Capability::where('category', 'paper')->orderBy('date', 'desc')->get();

        // 2. 연구 과제 데이터 (DB 카테고리명이 'performance'라면 아래처럼 가져와야 합니다)
        // ★ 변수명은 반드시 $projects 여야 블레이드와 매칭됩니다.
        $projects = \App\Models\Capability::where('category', 'performance')->orderBy('date', 'desc')->get();

        // 3. 뷰로 전달 (compact 안에 'projects'가 들어있는지 확인!)
        return view('rnd.results', compact('papers', 'projects'));
    }

    // [2] 회사소개 - 보유 역량 (비즈니스/신뢰도 중심)
    public function capability()
    {
        // 인증, 실적, MOU, 전체 특허 위주
        $certs = \App\Models\Capability::where('category', 'cert')->orderBy('date', 'desc')->get();
        $performances = \App\Models\Capability::where('category', 'performance')->orderBy('date', 'desc')->get();
        $mous = \App\Models\Capability::where('category', 'mou')->orderBy('date', 'desc')->get();
        $patents = \App\Models\Capability::where('category', 'patent')->orderBy('date', 'desc')->get();

        return view('company.capability', compact('certs', 'performances', 'mous', 'patents'));
    }

    // 회사소개 - 오시는 길
    public function location() {
        return view('company.location');
    }

    // 사업분야 - 엔지니어링
    public function engineering() {
        return view('business.engineering');
    }

    // 사업분야 - 컨설팅
    public function consulting() {
        return view('business.consulting');
    }

    // 고객지원
    public function contact() {
        return view('contact.index');
    }

    //조직도
    public function organization() { 
        return view('company.organization'); 
    }

    // 개인정보처리방침
    public function privacy() {
        return view('policy.privacy');
    }

    // [추가] 교육사업 페이지 연결
    public function education() {
        return view('business.education');
    }

    // [미리 추가] R&D 페이지
    public function rnd() {
        return view('rnd.rnd');
    }

    // ==========================================
    // 3. 홍보센터 (PR Center) - 추가 메뉴들
    // ==========================================

    public function schedule()
    {
        // 1. DB에서 표시할 일정 가져오기
        $schedules = Schedule::where('is_display', true)->get();

        $events = [];

        foreach ($schedules as $schedule) {
            $start = Carbon::parse($schedule->start);
            $end = $schedule->end ? Carbon::parse($schedule->end) : $start->copy();

            // 기간이 있는 일정을 하루 단위로 쪼개기
            for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
                $events[] = [
                    'date_str' => $date->format('Y-m-d'),
                    'title' => $schedule->title,
                    'type' => $schedule->type ?? 'notice',
                    'color' => $schedule->color ?? '#3b82f6',
                ];
            }
        }

        // ★ [중요] 여기서 'events' 변수를 뷰로 넘겨줘야 합니다!
        return view('service.schedule', ['events' => $events]);
    }

    // 홍보자료 (브로슈어 등)
    public function brochure(Request $request)
    {
        $query = Brochure::where('is_display', true);

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        // ★ 4열 그리드이므로 12개씩 페이징 (12, 24...)
        $brochures = $query->orderBy('created_at', 'desc')
                           ->paginate(12) 
                           ->onEachSide(1);

        return view('pr.brochure', compact('brochures'));
    }


    // 보도자료
    public function press(Request $request)
    {
        // [수정] query() 시작 시점에 where 조건 추가
        $query = PressRelease::where('is_display', true); // ★ 수정됨

        // 검색어 처리
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $pressReleases = $query->orderBy('id', 'desc')
                           ->paginate(9);

        return view('pr.press', compact('pressReleases'));
    }

    public function inquiry()
    {
        return view('contact.index'); // 여기서 모든 문의를 작성
    }
    // Q&A 목록
    public function qna(Request $request)
    {
        $query = Qna::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('writer', 'like', "%{$search}%");
        }

        $qnas = $query->latest()->paginate(10);
        return view('pr.qna.index', compact('qnas'));
    }

    // [추가] Q&A 상세 보기 (임시)
    public function qnaShow($id)
    {
        // 1. 글 데이터 찾기
        $qna = Qna::findOrFail($id);

        // 2. 비밀글(secret == 1)인 경우 검증 시작
        if ($qna->secret) {
            
            // (1) 관리자인지 확인 (관리자 이메일 목록)
            // ★ 관리자 이메일을 배열 안에 추가하세요.
            $adminEmails = ['admin@foex.co.kr', 'admin@test.com'];
            $currentUser = auth()->user();

            // 로그인 상태이고, 관리자 이메일이라면 -> 통과 (내용 보여줌)
            if ($currentUser && in_array($currentUser->email, $adminEmails)) {
                 return view('pr.qna.show', compact('qna'));
            }

            // (2) 작성자 본인인지 확인 (이메일 대조)
            // 비회원 비밀번호 기능이 아직 없으므로, 로그인한 유저의 이메일과 글쓴이 이메일을 비교합니다.
            if (auth()->check()) {
                // 글에 저장된 이메일과 현재 로그인한 사람의 이메일이 같다면 -> 통과
                if ($qna->email === auth()->user()->email) {
                    return view('pr.qna.show', compact('qna'));
                }
            }

            // (3) 위의 조건에 해당하지 않으면 -> 차단 (목록으로 튕겨냄)
            return redirect()->route('pr.qna.index')->with('error', '비밀글은 작성자와 관리자만 확인할 수 있습니다.');
        }

        // 3. 비밀글이 아니면 그냥 보여줌
        return view('pr.qna.show', compact('qna'));
    }

    // 사이트맵 페이지
    public function sitemap() {
        return view('sitemap');
    }

    
}
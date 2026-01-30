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
        return view('company.intro');
    }

    // [추가] CEO 인사말 (새로 분리)
    public function greeting() {
        return view('company.greeting');
    }
    
    // 회사소개 - 연혁
    public function history() {
        return view('company.history');
    }

    public function capability()
    {
        // 1. 카테고리별 데이터 조회 (날짜 최신순)
        $patents = Capability::where('category', 'patent')->orderBy('date', 'desc')->get();
        $certs = Capability::where('category', 'cert')->orderBy('date', 'desc')->get();
        $papers = Capability::where('category', 'paper')->orderBy('date', 'desc')->get();
        $performances = Capability::where('category', 'performance')->orderBy('date', 'desc')->get();
        $mous = Capability::where('category', 'mou')->orderBy('date', 'desc')->get();

        // 2. 뷰로 변수 전달 (compact 사용)
        return view('company.capability', compact('patents', 'certs', 'papers', 'performances', 'mous'));
    }

    // 회사소개 - 오시는 길
    public function location() {
        return view('company.location');
    }

    // 사업분야 - 엔지니어링
    public function engineering() {
        return view('business.engineering');
    }

    // 사업분야 - 기술용역
    public function techservice() {
        return view('business.techservice');
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
        return view('business.rnd');
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
        return view('pr.schedule', ['events' => $events]);
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

    // 홍보영상
    public function media(Request $request)
    {
        // ... (데이터 조회 로직 동일) ...
        $query = PromotionalVideo::where('is_display', true);

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $videos = $query->orderBy('created_at', 'desc')->paginate(9)->onEachSide(1);

        // ★ 여기를 수정하세요! ('pr.movie' -> 'pr.media')
        return view('pr.media', compact('videos'));
    }

    // 보도자료
    public function press(Request $request)
    {
        // 1. 쿼리 시작
        $query = PressRelease::query();

        // 2. 검색어 처리
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        // 3. 정렬 및 페이징 (작성일 최신순, 10개씩)
        $pressReleases = $query->orderBy('id', 'desc')
                           ->paginate(9);

        // 4. 뷰 반환
        return view('pr.press', compact('pressReleases'));
    }

    // 자료실
    public function archive()
    {
        // 2. DB에서 자료실 데이터를 최신순으로 가져옵니다 (페이지네이션 적용)
        // 변수명을 뷰 파일에서 사용하는 '$references'로 맞춰야 합니다.
        $references = Archive::latest()->paginate(10); 

        // 3. 뷰(화면)에 데이터를 함께 보냅니다.
        return view('pr.archive', compact('references'));
    }

    // Q&A 목록
    public function qna()
{
    // 1. DB에서 Qna 데이터를 최신순으로 가져오기 (10개씩 페이지네이션)
    $qnas = Qna::latest()->paginate(10);

    // 2. 화면(pr.qna.index)에 $qnas 변수를 함께 전달
    // (이전에 파일명을 index.blade.php로 바꿨다면 뷰 이름은 'pr.qna.index'가 정확합니다)
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
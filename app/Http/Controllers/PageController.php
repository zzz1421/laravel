<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // 날짜 계산용
use App\Models\Schedule; // ★ 이 줄이 반드시 있어야 에러가 안 납니다!
use App\Models\PressRelease; // 상단에 추가 필수!
use App\Models\PromotionalVideo;
use App\Models\Brochure;
use App\Models\Capability;

class PageController extends Controller
{
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
                           ->paginate(10);

        // 4. 뷰 반환
        return view('pr.press', compact('pressReleases'));
    }

    // 자료실
    public function archive() { return view('pr.archive'); }

    // Q&A 목록
    public function qna() { return view('pr.qna'); }

    // [추가] Q&A 상세 보기 (임시)
    public function qnaShow() { return view('pr.qna_show'); }

    // 사이트맵 페이지
    public function sitemap() {
        return view('sitemap');
    }

    
}
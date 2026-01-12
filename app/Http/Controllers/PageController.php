<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // 포엑스 일정
    public function schedule() { return view('pr.schedule'); }

    // 홍보자료 (브로슈어 등)
    public function brochure() { return view('pr.brochure'); }

    // 홍보영상
    public function media() { return view('pr.media'); }

    // 보도자료
    public function press() { return view('pr.press'); }

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
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController; // 정적 페이지용
use App\Http\Controllers\NoticeController; // 게시판용
use App\Http\Controllers\ProductController; // 제품소개용 (새로 만듦)
use App\Http\Controllers\ServiceController; // 신청폼용 (새로 만듦)

// 1. 메인 페이지
Route::get('/', [MainController::class, 'index'])->name('home');

// [기타] 사이트맵
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');

// 2. 회사소개 (Company)
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/intro', [PageController::class, 'intro'])->name('intro');       // 포엑스 소개 (인사말 포함)
    Route::get('/greeting', [PageController::class, 'greeting'])->name('greeting');
    Route::get('/history', [PageController::class, 'history'])->name('history'); // 연혁
    Route::get('/organization', [PageController::class, 'organization'])->name('organization'); // 조직도
    Route::get('/location', [PageController::class, 'location'])->name('location'); // 오시는 길
});

// 3. 사업분야 (Business)
Route::prefix('business')->name('business.')->group(function () {
    Route::get('/education', [PageController::class, 'education'])->name('education');   // 교육
    Route::get('/consulting', [PageController::class, 'consulting'])->name('consulting'); // 컨설팅
    Route::get('/techservice', [PageController::class, 'techservice'])->name('techservice'); // 기술용역
    Route::get('/engineering', [PageController::class, 'engineering'])->name('engineering'); // 엔지니어링
    Route::get('/rnd', [PageController::class, 'rnd'])->name('rnd'); // R&D
});

// 4. 솔루션/제품 (Products) - [신규 요청 반영]
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/suite', [ProductController::class, 'suite'])->name('suite'); // FOEX Suite
    Route::get('/node', [ProductController::class, 'node'])->name('node');   // FOEX Node
});

// 5. 홍보센터 (PR Center)
Route::prefix('pr')->name('pr.')->group(function () {
    
    // 1) 포엑스 일정 (페이지)
    Route::get('/schedule', [PageController::class, 'schedule'])->name('schedule');

    // 2) 공지사항 (기존 NoticeController 사용)
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/{id}', [NoticeController::class, 'show'])->name('notice.show');

    // 3) 홍보자료 (갤러리형)
    Route::get('/brochure', [PageController::class, 'brochure'])->name('brochure');

    // 4) 홍보영상 (갤러리형)
    Route::get('/media', [PageController::class, 'media'])->name('media');

    // 5) 보도자료 (게시판형)
    Route::get('/press', [PageController::class, 'press'])->name('press');

    // 6) 자료실 (게시판형)
    Route::get('/archive', [PageController::class, 'archive'])->name('archive');

    // 7) Q&A (게시판형)
    Route::get('/qna', [PageController::class, 'qna'])->name('qna');
    Route::get('/qna/view', [PageController::class, 'qnaShow'])->name('qna.show'); // [추가]
});

// 6. 온라인 신청 (Service) - [교육신청 기능]
Route::prefix('service')->name('service.')->group(function () {
    Route::get('/edu-apply', [ServiceController::class, 'eduApply'])->name('edu.apply'); // 교육 신청 폼
    Route::get('/inquiry', [ServiceController::class, 'inquiry'])->name('inquiry');     // 견적/상담 문의
    Route::post('/edu-apply', [ServiceController::class, 'store'])->name('edu.store');
});

// 7. 회원 관리 (Member) - [회원기능]
// 라라벨 내장 인증 기능을 켜면 자동으로 /login, /register 가 생깁니다.
// (일단 주소만 잡아둡니다. 나중에 'Laravel Breeze'를 설치하면 완성됩니다.)
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [PageController::class, 'mypage'])->name('mypage'); // 마이페이지
});

Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

// 언어 변경 라우트 (어디서든 접근 가능하게)
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ko'])) { // 지원하는 언어만 허용
        session(['locale' => $locale]);
    }
    return redirect()->back(); // 이전 페이지로 돌아가기
})->name('lang.switch');

require __DIR__.'/auth.php'; // (나중에 Breeze 설치 시 필요)
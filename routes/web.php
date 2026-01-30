<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController; 
use App\Http\Controllers\NoticeController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ServiceController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrochureController;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\RegisterStepController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; // 일반 로그인용

// Admin Controllers
use App\Http\Controllers\Admin\PromotionalVideoController as AdminPromotionalVideoController;
use App\Http\Controllers\Admin\CapabilityController as AdminCapabilityController;
use App\Http\Controllers\Admin\NoticeController as AdminNoticeController;
use App\Http\Controllers\Admin\PressController as AdminPressController;
use App\Http\Controllers\Admin\BrochureController as AdminBrochureController;
use App\Http\Controllers\Admin\EducationAdminController;
use App\Http\Controllers\Admin\Auth\AdminLoginController; // 관리자 로그인용


// ==========================================
// 1. 일반 회원 인증 (User Authentication)
// ==========================================
Route::middleware('guest')->group(function () {
    // 1단계: 본인인증 페이지
    Route::get('/register/certification', [RegisterStepController::class, 'showCertification'])->name('register.certification');
    
    // SMS 발송 및 확인 (AJAX)
    Route::post('/register/sms/send', [RegisterStepController::class, 'sendSms'])->name('register.sms.send');
    Route::post('/register/sms/verify', [RegisterStepController::class, 'verifySms'])->name('register.sms.verify');

    // 2단계: 약관동의
    Route::get('/register/agreement', [RegisterStepController::class, 'showAgreement'])->name('register.agreement');

    // 일반 로그인
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// 일반 사용자 대시보드
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 일반 로그아웃
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


// ==========================================
// 2. 관리자 인증 (Admin Authentication)
// ==========================================
// ★ 관리자 로그인 페이지 (로그인 안 된 상태에서만 접근 가능)
Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'store'])->name('login.store');
});


// ==========================================
// 3. 퍼블릭 페이지 (Public Pages)
// ==========================================

// 메인 페이지
Route::get('/', [MainController::class, 'index'])->name('home');

// 사이트맵
Route::get('/sitemap', [PageController::class, 'sitemap'])->name('sitemap');

// 회사소개 (Company)
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/intro', [PageController::class, 'intro'])->name('intro');
    Route::get('/greeting', [PageController::class, 'greeting'])->name('greeting');
    Route::get('/history', [PageController::class, 'history'])->name('history');
    Route::get('/organization', [PageController::class, 'organization'])->name('organization');
    Route::get('/capability', [PageController::class, 'capability'])->name('capability');
    Route::get('/location', [PageController::class, 'location'])->name('location');
});

// 사업분야 (Business)
Route::prefix('business')->name('business.')->group(function () {
    Route::get('/education', [PageController::class, 'education'])->name('education');
    Route::get('/consulting', [PageController::class, 'consulting'])->name('consulting');
    Route::get('/techservice', [PageController::class, 'techservice'])->name('techservice');
    Route::get('/engineering', [PageController::class, 'engineering'])->name('engineering');
    Route::get('/rnd', [PageController::class, 'rnd'])->name('rnd');
});

// 솔루션/제품 (Products)
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/suite', [ProductController::class, 'suite'])->name('suite');
    Route::get('/node', [ProductController::class, 'node'])->name('node');
});

// 홍보센터 (PR Center)
Route::prefix('pr')->name('pr.')->group(function () {
    Route::get('/schedule', [PageController::class, 'schedule'])->name('schedule');
    
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/{id}', [NoticeController::class, 'show'])->name('notice.show');

    Route::get('/brochure', [BrochureController::class, 'index'])->name('brochure');
    Route::get('/media', [PageController::class, 'media'])->name('media');
    Route::get('/press', [PageController::class, 'press'])->name('press');

    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index');
    Route::get('/archive/{id}', [ArchiveController::class, 'show'])->name('archive.show');
    Route::get('/archive/{id}/download', [ArchiveController::class, 'download'])->name('archive.download');

    Route::get('/qna', [QnaController::class, 'index'])->name('qna.index');
    Route::get('/qna/create', [QnaController::class, 'create'])->name('qna.create');
    Route::post('/qna', [QnaController::class, 'store'])->name('qna.store');
    Route::get('/qna/{id}', [QnaController::class, 'show'])->name('qna.show');
});

// 서비스/신청 (Service)
Route::prefix('service')->name('service.')->group(function () {
    Route::get('/education', [EducationController::class, 'index'])->name('edu.apply');
    Route::get('/education/{id}', [EducationController::class, 'show'])->name('edu.show');
    
    // 교육 신청 처리 (로그인 필수)
    Route::post('/education/{id}/apply', [EducationController::class, 'store'])
        ->name('edu.store')
        ->middleware('auth');

    Route::get('/inquiry', [ServiceController::class, 'inquiry'])->name('inquiry');
});

// 회원 정보 (Member)
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [PageController::class, 'mypage'])->name('mypage');
});

// 개인정보처리방침
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

// 언어 변경
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ko'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


// ==========================================
// 4. 관리자 페이지 (Admin Dashboard)
// ==========================================
// ★ 'middleware' => 'auth' 필수: 로그인 안 하면 자동으로 로그인 페이지로 이동시킴
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    
    // ① 관리자 대시보드 (메인)
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // ② 관리자 로그아웃
    Route::post('/logout', [AdminLoginController::class, 'destroy'])->name('logout');

    // 썸네일 일괄 업데이트 기능
    Route::get('/press/batch-thumbnail', [App\Http\Controllers\Admin\PressController::class, 'batchUpdate'])->name('press.batch');

    // 게시판 리소스 관리
    Route::resource('notice', AdminNoticeController::class);
    Route::resource('press', AdminPressController::class);
    Route::resource('capability', AdminCapabilityController::class);
    Route::resource('video', AdminPromotionalVideoController::class);
    Route::resource('brochure', AdminBrochureController::class);
    Route::resource('archives', \App\Http\Controllers\Admin\ArchiveAdminController::class);

    // 교육 과정 관리
    Route::get('/education', [EducationAdminController::class, 'index'])->name('education.index');
    Route::get('/education/create', [EducationAdminController::class, 'create'])->name('education.create');
    Route::post('/education/store', [EducationAdminController::class, 'store'])->name('education.store');
    
    // 교육 신청자 관리
    Route::get('/education/{id}/applications', [EducationAdminController::class, 'applications'])->name('education.applications');
    Route::post('/education/application/{id}/approve', [EducationAdminController::class, 'approve'])->name('education.approve');
    Route::post('/education/application/{id}/reject', [EducationAdminController::class, 'reject'])->name('education.reject');
    
    // 교육 CRUD (상세/수정/삭제)
    Route::get('/education/{id}', [EducationAdminController::class, 'show'])->name('education.show');
    Route::get('/education/{id}/edit', [EducationAdminController::class, 'edit'])->name('education.edit');
    Route::put('/education/{id}', [EducationAdminController::class, 'update'])->name('education.update');
    Route::delete('/education/{id}', [EducationAdminController::class, 'destroy'])->name('education.destroy');

    // 회원 관리
    Route::get('/users', [App\Http\Controllers\Admin\UserAdminController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UserAdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\Admin\UserAdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\Admin\UserAdminController::class, 'destroy'])->name('users.destroy');

    Route::resource('schedules', \App\Http\Controllers\Admin\ScheduleController::class);
});


// ==========================================
// 5. 이메일 인증 (Email Verification)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/verify-email', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('home');
    })->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', '인증 메일이 재발송되었습니다!');
    })->middleware('throttle:6,1')->name('verification.send');
});

require __DIR__.'/auth.php';
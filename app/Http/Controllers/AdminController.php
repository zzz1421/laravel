<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\PressRelease;
use App\Models\Archive;
use App\Models\PromotionalVideo;
use App\Models\Brochure;
use App\Models\Capability;

class AdminController extends Controller
{
    public function index()
    {
        // 1. 대시보드 상단 통계 집계
        $counts = [
            'notice'     => Notice::count(),
            'press'      => PressRelease::count(),
            'archive'    => Archive::count(),
            'video'      => PromotionalVideo::count(),
            'brochure'   => Brochure::count(),
            'capability' => Capability::count(),
        ];

        // 2. ★ [추가됨] 대시보드 하단 '최신 글 목록' 데이터 가져오기
        $recentNotices = Notice::latest()->take(5)->get();
        $recentPress   = PressRelease::latest()->take(5)->get();

        
         return view('admin.index', compact('counts', 'recentNotices', 'recentPress'));
    }
}
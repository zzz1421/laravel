<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromotionalVideo;
use App\Models\Notice;

class MainController extends Controller
{
    public function index()
    {
        // 1. 최신 홍보 영상 가져오기
        $video = PromotionalVideo::latest()->first();
        
        // 2. 최신 공지사항 4개 가져오기
        $notices = Notice::latest()->take(4)->get();

        // 3. 화면으로 데이터 넘겨주기 (여기에 'notices' 라고 정확히 적혀있어야 합니다!)
        return view('main', compact('video', 'notices'));
    }
}
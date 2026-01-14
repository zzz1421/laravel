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
        // 대시보드에 표시할 각 테이블의 데이터 개수 집계
        $counts = [
            'notice' => Notice::count(),
            'press'  => PressRelease::count(),
            'archive' => Archive::count(),
            'video'  => PromotionalVideo::count(),
            'brochure' => Brochure::count(),
            'capability' => Capability::count(),
        ];

        return view('admin.index', compact('counts'));
    }
}
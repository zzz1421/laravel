<?php

namespace App\Http\Controllers;

use App\Models\Brochure; // 모델 연결
use Illuminate\Http\Request;

class BrochureController extends Controller
{
    public function index()
    {
        // 1. DB에서 모든 브로슈어 데이터를 가져옴 (최신순)
        $brochures = Brochure::orderBy('created_at', 'desc')->paginate(12);

        // 2. 뷰 파일로 데이터 전달
        return view('pr.brochure', compact('brochures'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Brochure;
use Illuminate\Http\Request;

class BrochureController extends Controller
{
    public function index()
    {
        // [수정] 숨김 처리된 브로슈어 제외
        $brochures = Brochure::where('is_display', true) // ★ 추가됨
                             ->orderBy('created_at', 'desc')
                             ->paginate(12);

        return view('pr.brochure', compact('brochures'));
    }
}
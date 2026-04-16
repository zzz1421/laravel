<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        // [수정] 숨김 처리된 글 제외 (where 추가)
        $notices = Notice::where('is_display', true) // ★ 추가됨
                         ->orderBy('created_at', 'desc')
                         ->paginate(15);

        return view('pr.notice.index', ['notices' => $notices]);
    }

    public function show($id)
    {
        // [수정] 숨김 처리된 글은 상세 페이지 접근 시 404 에러 발생
        $notice = Notice::where('is_display', true)->findOrFail($id); // ★ 추가됨

        $notice->increment('hit');

        return view('pr.notice.show', ['notice' => $notice]);
    }
}
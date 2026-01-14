<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        // [수정 전] 옛날 방식 (에러 원인)
        // $notices = Notice::where('bd_code', 'notice')->orderBy('bd_id', 'desc')->paginate(15);

        // [수정 후] 최신 방식
        // 1. bd_code='notice' 조건 삭제 (테이블이 이미 공지사항 전용임)
        // 2. bd_id -> id 또는 created_at으로 정렬 변경
        $notices = Notice::orderBy('created_at', 'desc')
                         ->paginate(15);

        return view('pr.notice.index', ['notices' => $notices]);
    }

    public function show($id)
    {
        // [수정 전]
        // $notice = Notice::where('bd_id', $id)->firstOrFail();
        
        // [수정 후] 라라벨 표준 방식
        // findOrFail($id)는 자동으로 'id' 컬럼을 찾습니다.
        $notice = Notice::findOrFail($id);

        // 조회수 증가 (bd_hit -> view_count)
        $notice->increment('hit');

        return view('pr.notice.show', ['notice' => $notice]);
    }
}
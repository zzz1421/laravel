<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        // [수정 전] 그냥 다 가져와!
        // $notices = Notice::orderBy('bd_id', 'desc')->paginate(15);

        // [수정 후] 'bd_code'가 'notice'인 것만 골라서 가져와!
        $notices = Notice::where('bd_code', 'notice')  // <--- 이 줄이 핵심입니다!
                         ->orderBy('bd_id', 'desc')    // 최신순 정렬
                         ->paginate(15);               // 15개씩 페이징

        return view('pr.notice.index', ['notices' => $notices]);
    }

    // 상세 보기 함수 ($id는 주소창의 숫자)
    public function show($id)
    {
        // 1. 해당 번호(bd_id)의 글을 찾는다. (없으면 404 에러 화면 띄움)
        $notice = Notice::where('bd_id', $id)->firstOrFail();

        // 2. 조회수(bd_hit)를 1 올린다.
        $notice->increment('bd_hit');

        // 3. 화면(View)에 데이터를 보낸다.
        return view('pr.notice.show', ['notice' => $notice]);
    }
}
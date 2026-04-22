<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qna;
use Illuminate\Support\Facades\Auth;

class QnaController extends Controller
{
    /**
     * [목록]
     */
    public function index(Request $request)
    {
        $query = Qna::query();

        // 검색 기능
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('writer', 'like', "%{$search}%");
            });
        }

        // 최신순 정렬
        $qnas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('pr.qna.index', compact('qnas'));
    }

    /**
     * [상세 보기] (권한 체크 강화)
     */
    public function show($id)
    {
        $qna = Qna::findOrFail($id);

        // ★ 비밀글인 경우 권한 검사
        if ($qna->secret) {
            
            // 1. 비로그인 상태라면 -> 로그인 페이지로 이동
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', '로그인이 필요한 서비스입니다.');
            }

            $user = Auth::user();

            // 2. 권한 체크: 관리자(레벨7 이상)도 아니고, 작성자 본인(이메일 일치)도 아니라면
            if ($user->level < 7 && $user->email !== $qna->email) {
                
                // 경고창을 띄우고 이전 페이지로 돌려보냄
                return response("<script>
                    alert('작성글은 작성자만 확인할 수 있습니다.');
                    history.back();
                </script>");
            }
        }

        // 권한 통과 시 조회수 증가 및 상세 페이지 표시
        $qna->increment('hit');

        return view('pr.qna.show', compact('qna'));
    }

    /**
     * [글쓰기]
     */
    public function create()
    {
        return view('pr.qna.create');
    }

    /**
     * [저장]
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|max:255',
            'writer'   => 'required|max:50',
            'password' => 'required|max:255', // 작성자 확인용 비밀번호
            'content'  => 'required',
        ]);

        $qna = new Qna();
        $qna->category = $request->input('category', 'General');
        $qna->title    = $request->input('title');
        
        // 로그인 상태라면 사용자 정보를 활용 (없으면 입력값 사용)
        if (Auth::check()) {
            $qna->writer = Auth::user()->name; // 혹은 $request->writer
            $qna->email  = Auth::user()->email;
            $qna->phone  = Auth::user()->phone; // User 모델에 phone이 있다면
        } else {
            $qna->writer = $request->input('writer');
            $qna->email  = $request->input('email');
            $qna->phone  = $request->input('phone');
        }

        $qna->password = $request->input('password'); 
        $qna->content  = $request->input('content');
        $qna->secret   = $request->has('secret'); 
        $qna->status   = 'waiting';
        $qna->hit      = 0;
        $qna->reg_ip   = $request->ip();
        
        $qna->save();

        return redirect()->route('pr.qna.index');
    }

    /**
     * [추가] 비밀번호 입력 폼 보여주기
     */
    public function showPasswordForm($id)
    {
        return view('pr.qna.password', compact('id'));
    }

    /**
     * [추가] 비밀번호 확인 로직
     */
    public function checkPassword(Request $request, $id)
    {
        $qna = Qna::findOrFail($id);

        if ($request->input('password') === $qna->password) {
            // 비밀번호 일치 시 세션에 인증 정보 저장 (유효기간: 브라우저 닫을 때까지)
            session(['qna_pass_verified_' . $id => true]);
            return redirect()->route('pr.qna.show', $id);
        }

        return back()->withErrors(['password' => '비밀번호가 일치하지 않습니다.']);
    }
}
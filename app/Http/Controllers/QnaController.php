<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qna;

class QnaController extends Controller
{
    /**
     * [목록] resources/views/pr/qna/index.blade.php
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

        $qnas = $query->orderBy('created_at', 'desc')->paginate(10);

        // [변경] 뷰 경로 수정: pr.qna -> pr.qna.index
        return view('pr.qna.index', compact('qnas'));
    }

    /**
     * [상세] resources/views/pr/qna/show.blade.php
     */
    public function show($id)
    {
        $qna = Qna::findOrFail($id);
        $qna->increment('hit');

        // [변경] 뷰 경로 수정: pr.qna_show -> pr.qna.show
        return view('pr.qna.show', compact('qna'));
    }

    /**
     * [글쓰기] resources/views/pr/qna/create.blade.php
     */
    public function create()
    {
        // [변경] 뷰 경로 수정: pr.qna_create -> pr.qna.create
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
            'password' => 'required|max:255',
            'content'  => 'required',
        ]);

        $qna = new Qna();
        $qna->category = $request->input('category', 'General');
        $qna->title    = $request->input('title');
        $qna->writer   = $request->input('writer');
        $qna->password = $request->input('password'); 
        $qna->email    = $request->input('email');
        $qna->phone    = $request->input('phone');
        $qna->content  = $request->input('content');
        $qna->secret   = $request->has('secret'); 
        $qna->status   = 'waiting';
        $qna->hit      = 0;
        $qna->reg_ip   = $request->ip();
        
        $qna->save();

        return redirect()->route('pr.qna.index');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PressRelease;

class PressController extends Controller
{
    // 1. 목록 조회
    public function index(Request $request)
    {
        $query = PressRelease::orderBy('id', 'desc');
        
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }
        
        $presses = $query->paginate(10);
        
        return view('admin.press.index', compact('presses'));
    }

    // 2. 글쓰기 폼
    public function create()
    {
        return view('admin.press.create');
    }

    // 3. 저장 처리 (썸네일 로직 제거됨)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link_url' => 'nullable|url',
            // 'thumbnail' 유효성 검사 제거
        ]);

        PressRelease::create([
            'title' => $request->title,
            'content' => $request->content,
            'writer' => $request->writer ?? '포엑스',
            'link_url' => $request->link_url,
            // 'thumbnail' 저장 로직 제거
            'is_display' => $request->has('is_display'),
            'hit' => 0,
        ]);

        return redirect()->route('admin.press.index')->with('success', '보도자료가 등록되었습니다.');
    }

    // 4. 상세 보기
    public function show(PressRelease $press)
    {
        return view('admin.press.show', compact('press'));
    }

    // 5. 수정 폼
    public function edit(PressRelease $press)
    {
        return view('admin.press.edit', compact('press'));
    }

    // 6. 수정 처리 (이미지 교체/삭제 로직 제거됨)
    public function update(Request $request, PressRelease $press)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link_url' => 'nullable|url',
        ]);

        $press->update([
            'title' => $request->title,
            'content' => $request->content,
            'writer' => $request->writer,
            'link_url' => $request->link_url,
            'is_display' => $request->has('is_display'),
        ]);

        return redirect()->route('admin.press.show', $press->id)->with('success', '수정되었습니다.');
    }

    // 7. 삭제 처리 (파일 삭제 로직 제거됨)
    public function destroy(PressRelease $press)
    {
        // DB 데이터만 삭제
        $press->delete();

        return redirect()->route('admin.press.index')->with('success', '삭제되었습니다.');
    }
}
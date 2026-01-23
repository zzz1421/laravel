<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    // 1. 목록 조회
    public function index(Request $request)
    {
        $query = Notice::orderBy('created_at', 'desc');

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $notices = $query->paginate(10);
        return view('admin.notice.index', compact('notices'));
    }

    // 2. 글쓰기 폼
    public function create()
    {
        return view('admin.notice.create');
    }

    // 3. 저장 처리
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'writer' => 'required',
            'file' => 'nullable|file|max:10240',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        Notice::create([
            'title' => $request->title,
            'content' => $request->content,
            'writer' => $request->writer,
            'file_path' => $filePath,
            'is_display' => $request->has('is_display'),
            'hit' => 0,
        ]);

        return redirect()->route('admin.notice.index')->with('success', '공지사항이 등록되었습니다.');
    }

    // ★★★ [추가된 부분] 4. 상세 보기 ★★★
    public function show(Notice $notice)
    {
        return view('admin.notice.show', compact('notice'));
    }

    // 5. 수정 폼
    public function edit(Notice $notice)
    {
        return view('admin.notice.edit', compact('notice'));
    }

    // 6. 수정 처리
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        if ($request->hasFile('file')) {
            if ($notice->file_path && Storage::disk('public')->exists($notice->file_path)) {
                Storage::disk('public')->delete($notice->file_path);
            }
            $notice->file_path = $request->file('file')->store('uploads', 'public');
        } elseif ($request->input('delete_file') == '1') {
            if ($notice->file_path) {
                Storage::disk('public')->delete($notice->file_path);
                $notice->file_path = null;
            }
        }

        $notice->update([
            'title' => $request->title,
            'content' => $request->content,
            'writer' => $request->writer,
            'is_display' => $request->has('is_display'),
        ]);

        return redirect()->route('admin.notice.show', $notice->id)->with('success', '수정되었습니다.');
    }

    // 7. 삭제 처리
    public function destroy(Notice $notice)
    {
        if ($notice->file_path && Storage::disk('public')->exists($notice->file_path)) {
            Storage::disk('public')->delete($notice->file_path);
        }
        $notice->delete();

        return redirect()->route('admin.notice.index')->with('success', '삭제되었습니다.');
    }
}
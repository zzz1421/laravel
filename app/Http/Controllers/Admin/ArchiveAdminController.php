<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // ★ 파일 처리를 위해 필수

class ArchiveAdminController extends Controller
{
    public function index()
    {
        $archives = Archive::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.archives.index', compact('archives'));
    }

    public function create()
    {
        return view('admin.archives.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|file|max:10240', // 최대 10MB
        ]);

        $data = $request->except('file');

        // ★ 파일 업로드 처리
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName(); // 원본 파일명
            // 'public/archives' 폴더에 저장 (storage:link 필요)
            $path = $file->store('public/archives'); 
            
            $data['file_name'] = $filename;
            $data['file_path'] = str_replace('public/', '', $path); // DB에는 'archives/파일명' 형태로 저장
        }

        Archive::create($data);

        return redirect()->route('admin.archives.index')->with('success', '자료가 등록되었습니다.');
    }

    public function edit($id)
    {
        $archive = Archive::findOrFail($id);
        return view('admin.archives.edit', compact('archive'));
    }

    public function update(Request $request, $id)
    {
        $archive = Archive::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'file' => 'nullable|file|max:10240',
        ]);

        $data = $request->except('file');

        // ★ 파일 교체 로직
        if ($request->hasFile('file')) {
            // 1. 기존 파일 삭제
            if ($archive->file_path && Storage::exists('public/' . $archive->file_path)) {
                Storage::delete('public/' . $archive->file_path);
            }

            // 2. 새 파일 업로드
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->store('public/archives');

            $data['file_name'] = $filename;
            $data['file_path'] = str_replace('public/', '', $path);
        }

        $archive->update($data);

        return redirect()->route('admin.archives.index')->with('success', '자료가 수정되었습니다.');
    }

    public function destroy($id)
    {
        $archive = Archive::findOrFail($id);

        // ★ 파일 삭제 후 DB 삭제
        if ($archive->file_path && Storage::exists('public/' . $archive->file_path)) {
            Storage::delete('public/' . $archive->file_path);
        }

        $archive->delete();

        return redirect()->route('admin.archives.index')->with('success', '자료가 삭제되었습니다.');
    }
}
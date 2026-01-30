<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    // 1. 자료실 목록 페이지
    public function index(Request $request)
    {
        // 검색 기능 (옵션)
        $query = Archive::where('is_display', true); // 노출 설정된 것만

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $archives = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('pr.archive.index', compact('archives'));
    }

    // 2. 자료실 상세 페이지 (에러가 발생한 pr.archive.show)
    public function show($id)
    {
        $archive = Archive::where('is_display', true)->findOrFail($id);
        
        // 조회수 증가 로직이 필요하다면 여기에 추가
        
        return view('pr.archive.show', compact('archive'));
    }

    // 3. 파일 다운로드 기능
    public function download($id)
    {
        $archive = Archive::where('is_display', true)->findOrFail($id);

        if (!$archive->file_path || !Storage::exists('public/' . $archive->file_path)) {
            return back()->with('error', '파일이 존재하지 않습니다.');
        }

        // 다운로드 횟수 증가
        $archive->increment('download_count');

        // 파일 다운로드 실행
        return Storage::download('public/' . $archive->file_path, $archive->file_name);
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brochure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrochureController extends Controller
{
    // 1. 목록 보기
    public function index()
    {
        $brochures = Brochure::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.brochure.index', compact('brochures'));
    }

    // 2. 등록 폼
    public function create()
    {
        return view('admin.brochure.create');
    }

    // 3. 저장 로직
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:20480', // 20MB
            'image_file' => 'required|image|max:5120',    // 5MB
        ]);

        $pdfPath = $request->file('pdf_file')->store('brochures', 'public');
        $imagePath = $request->file('image_file')->store('brochures/thumbs', 'public');

        Brochure::create([
            'title' => $request->title,
            'pdf_path' => $pdfPath,
            'image_path' => $imagePath,
            'is_visible' => $request->has('is_visible'),
        ]);

        return redirect()->route('admin.brochure.index')->with('success', '등록되었습니다.');
    }

    // 4. 수정 폼
    public function edit($id)
    {
        $brochure = Brochure::findOrFail($id);
        return view('admin.brochure.edit', compact('brochure'));
    }

    // 5. 업데이트 로직
    public function update(Request $request, $id)
    {
        $brochure = Brochure::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'pdf_file' => 'nullable|mimes:pdf|max:20480', // 수정 시엔 필수가 아님 (nullable)
            'image_file' => 'nullable|image|max:5120',
        ]);

        // 데이터 업데이트 준비
        $data = [
            'title' => $request->title,
            'is_visible' => $request->has('is_visible'),
        ];

        // PDF 파일이 새로 올라왔다면?
        if ($request->hasFile('pdf_file')) {
            // 기존 파일 삭제
            if ($brochure->pdf_path) Storage::disk('public')->delete($brochure->pdf_path);
            // 새 파일 저장
            $data['pdf_path'] = $request->file('pdf_file')->store('brochures', 'public');
        }

        // 이미지 파일이 새로 올라왔다면?
        if ($request->hasFile('image_file')) {
            if ($brochure->image_path) Storage::disk('public')->delete($brochure->image_path);
            $data['image_path'] = $request->file('image_file')->store('brochures/thumbs', 'public');
        }

        $brochure->update($data);

        return redirect()->route('admin.brochure.index')->with('success', '수정되었습니다.');
    }

    // 6. 삭제 로직
    public function destroy($id)
    {
        $brochure = Brochure::findOrFail($id);

        if($brochure->pdf_path) Storage::disk('public')->delete($brochure->pdf_path);
        if($brochure->image_path) Storage::disk('public')->delete($brochure->image_path);

        $brochure->delete();

        return back()->with('success', '삭제되었습니다.');
    }
}
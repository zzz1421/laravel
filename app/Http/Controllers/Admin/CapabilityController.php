<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CapabilityController extends Controller
{
    // ★ [핵심] 카테고리 목록을 여기서 한 번만 정의해서 모든 함수가 같이 씁니다.
    private $categories = [
        'patent' => '특허/지식재산',
        'certification' => '인증/자격',
        'performance' => '주요실적',
        'award' => '수상내역',
        'mou' => 'MOU/업무협약'
    ];

    // 1. 목록 조회
    public function index(Request $request)
    {
        $query = Capability::orderBy('date', 'desc');

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        $items = $query->paginate(10);
        
        // 위에서 정의한 공통 카테고리 가져오기
        $categories = $this->categories; 

        return view('admin.capability.index', compact('items', 'categories'));
    }

    // 2. 등록 폼
    public function create()
    {
        $categories = $this->categories;
        return view('admin.capability.create', compact('categories'));
    }

    // 3. 저장 처리
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required|max:255',
            'file_path' => 'nullable|image|max:5120',
        ]);

        $data = $request->except('file_path');

        if ($request->hasFile('file_path')) {
            $data['file_path'] = $request->file('file_path')->store('uploads/capability', 'public');
        }

        Capability::create($data);

        return redirect()->route('admin.capability.index')->with('success', '등록되었습니다.');
    }

    // 4. 상세 보기 (에러 났던 부분 해결!)
    public function show(Capability $capability)
    {
        $categories = $this->categories;
        return view('admin.capability.show', compact('capability', 'categories'));
    }

    // 5. 수정 폼
    public function edit(Capability $capability)
    {
        $categories = $this->categories;
        return view('admin.capability.edit', compact('capability', 'categories'));
    }

    // 6. 수정 처리
    public function update(Request $request, Capability $capability)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required|max:255',
        ]);

        $data = $request->except('file_path');

        if ($request->hasFile('file_path')) {
            if ($capability->file_path && Storage::disk('public')->exists($capability->file_path)) {
                Storage::disk('public')->delete($capability->file_path);
            }
            $data['file_path'] = $request->file('file_path')->store('uploads/capability', 'public');
        }

        // Summernote 상세 내용 업데이트 (MOU 등)
        $data['description'] = $request->description;

        $capability->update($data);

        return redirect()->route('admin.capability.show', $capability->id)->with('success', '수정되었습니다.');
    }

    // 7. 삭제 처리
    public function destroy(Capability $capability)
    {
        if ($capability->file_path && Storage::disk('public')->exists($capability->file_path)) {
            Storage::disk('public')->delete($capability->file_path);
        }
        $capability->delete();

        return redirect()->route('admin.capability.index')->with('success', '삭제되었습니다.');
    }
}
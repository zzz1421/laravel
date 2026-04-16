<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromotionalVideo;
use Illuminate\Http\Request;

class PromotionalVideoController extends Controller
{
    // 1. 목록 조회
    public function index(Request $request)
    {
        $query = PromotionalVideo::orderBy('created_at', 'desc');

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $videos = $query->paginate(9); // 영상은 썸네일이 크니까 9개 정도가 적당

        return view('admin.video.index', compact('videos'));
    }

    // 2. 등록 폼
    public function create()
    {
        return view('admin.video.create');
    }

    // 3. 저장 처리
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'video_url' => 'required|url', // 필수
        ]);

        $data = $request->only(['title', 'video_url']);
        
        // 체크박스 처리
        $data['is_display'] = $request->has('is_display');

        // ★ 유튜브 ID 추출 (시더 로직 활용)
        $data['video_id'] = $this->extractYoutubeId($request->video_url);

        PromotionalVideo::create($data);

        return redirect()->route('admin.video.index')->with('success', '영상이 등록되었습니다.');
    }

    // 4. 상세 보기
    public function show(PromotionalVideo $video)
    {
        return view('admin.video.show', compact('video'));
    }

    // 5. 수정 폼
    public function edit(PromotionalVideo $video)
    {
        return view('admin.video.edit', compact('video'));
    }

    // 6. 수정 처리
    public function update(Request $request, PromotionalVideo $video)
    {
        $request->validate([
            'title' => 'required|max:255',
            'video_url' => 'required|url',
        ]);

        $data = $request->only(['title', 'video_url']);
        $data['is_display'] = $request->has('is_display');

        // URL이 바뀌었으면 ID 다시 추출
        if ($video->video_url != $request->video_url) {
            $data['video_id'] = $this->extractYoutubeId($request->video_url);
        }

        $video->update($data);

        return redirect()->route('admin.video.show', $video->id)->with('success', '수정되었습니다.');
    }

    // 7. 삭제 처리
    public function destroy(PromotionalVideo $video)
    {
        $video->delete();
        return redirect()->route('admin.video.index')->with('success', '삭제되었습니다.');
    }

    // ==========================================
    // ★ 유튜브 ID 추출 헬퍼 함수 ★
    // ==========================================
    private function extractYoutubeId($url)
    {
        // 다양한 형태의 유튜브 URL에서 11자리 ID 추출
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|embed\/)([^"&?\/\s]{11})/';
        
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PressRelease;
use DOMDocument; // ★ HTML 파싱을 위해 필수!

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

    // 3. 저장 처리 (썸네일 자동 추출 로직 추가됨)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link_url' => 'nullable|url',
        ]);

        // 저장할 데이터 준비
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'writer' => $request->writer ?? '포엑스',
            'link_url' => $request->link_url,
            'is_display' => $request->has('is_display'), // 체크박스는 체크 안 되면 값이 안 넘어오므로 has() 사용
            'hit' => 0,
            'post_date' => now(), // (혹시 날짜 컬럼이 있다면 추가, 없으면 제거하세요)
        ];

        // ★ [핵심] 링크가 있다면 썸네일 추출 시도
        if ($request->filled('link_url')) {
            $ogImage = $this->getOgImage($request->link_url);
            if ($ogImage) {
                $data['thumbnail'] = $ogImage;
            }
        }

        PressRelease::create($data);

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

    public function update(Request $request, PressRelease $press)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link_url' => 'nullable|url',
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'writer' => $request->writer,
            'link_url' => $request->link_url,
            'is_display' => $request->has('is_display'),
        ];

        // 1. ★ 썸네일 삭제 요청이 있는지 확인 (체크박스)
        if ($request->has('delete_thumbnail')) {
            $data['thumbnail'] = null;
        }

        // 2. 링크가 변경되었을 때만 새 썸네일 추출 시도
        // (삭제 체크박스를 눌렀더라도, 링크 자체를 바꿨다면 새로운 썸네일을 가져오는 게 맞음)
        if ($request->filled('link_url') && $request->link_url != $press->link_url) {
            $ogImage = $this->getOgImage($request->link_url);
            if ($ogImage) {
                $data['thumbnail'] = $ogImage;
            }
        }

        $press->update($data);

        return redirect()->route('admin.press.show', $press->id)->with('success', '수정되었습니다.');
    }

    // 7. 삭제 처리
    public function destroy(PressRelease $press)
    {
        $press->delete();
        return redirect()->route('admin.press.index')->with('success', '삭제되었습니다.');
    }

    // =========================================================================
    // ★ [Private Helper] URL에서 og:image 태그 추출하는 함수
    // =========================================================================
    private function getOgImage($url)
    {
        try {
            // 1. 봇 차단을 피하기 위해 User-Agent 설정
            $context = stream_context_create([
                'http' => [
                    'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36\r\n"
                ]
            ]);
            
            // 2. HTML 가져오기 (타임아웃 등 예외 처리 필요 시 추가 가능)
            $html = @file_get_contents($url, false, $context);
            if (!$html) return null;

            // 3. HTML 파싱
            $doc = new DOMDocument();
            
            // HTML 문법 오류 경고 끄기 (뉴스 사이트들 HTML이 완벽하지 않은 경우가 많음)
            libxml_use_internal_errors(true); 
            $doc->loadHTML($html);
            libxml_clear_errors();

            $tags = $doc->getElementsByTagName('meta');

            // 4. meta 태그 중 og:image 찾기
            foreach ($tags as $tag) {
                if ($tag->getAttribute('property') === 'og:image') {
                    return $tag->getAttribute('content');
                }
            }
        } catch (\Exception $e) {
            // 추출 실패 시 null 반환 (로그를 남겨도 됨)
            return null;
        }

        return null;
    }

}
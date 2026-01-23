<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PromotionalVideo;

class PromotionalVideoSeeder extends Seeder
{
    public function run()
    {
        // 1. 구 DB에서 'video' 게시물만 가져오기
        $oldVideos = DB::table('foex2022.tbl_board')
                       ->where('bd_code', 'video') 
                       ->get();

        foreach ($oldVideos as $row) {
            $videoUrl = null;
            $videoId = null;
            
            // 2. bd_content 안에서 iframe의 src 추출 (유튜브 링크 찾기)
            // 예: src="https://www.youtube.com/embed/xLd7W01jNw8"
            if (preg_match('/src="([^"]+)"/i', $row->bd_content, $matches)) {
                $videoUrl = $matches[1];
                
                // 3. 추출된 URL에서 비디오 ID만 또 추출 (xLd7W01jNw8)
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|embed\/)([^"&?\/\s]{11})/', $videoUrl, $idMatches)) {
                    $videoId = $idMatches[1];
                }
            }

            // 4. 저장 (URL을 못 찾았더라도 일단 제목과 내용은 보존)
            PromotionalVideo::create([
                'id'         => $row->bd_id,
                'title'      => $row->bd_subject,
                'video_url'  => $videoUrl, // iframe src 주소
                'video_id'   => $videoId,  // 썸네일용 ID
                'hit'        => $row->bd_hit,
                'is_display' => ($row->bd_is_display === 'Y'),
                'created_at' => $row->reg_time,
                'updated_at' => $row->upt_time ?: $row->reg_time,
            ]);
        }
    }
}
?>
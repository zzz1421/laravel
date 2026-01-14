<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brochure;

class BrochureSeeder extends Seeder
{
    public function run()
    {
        // 1. 구 DB에서 'gallery' (브로슈어) 게시글 가져오기
        $oldGalleries = DB::table('foex2022.tbl_board')
                          ->where('bd_code', 'gallery')
                          ->get();

        foreach ($oldGalleries as $row) {
            
            // 2. tbl_file 테이블에서 첨부파일 찾기
            // 구 DB 컬럼 확인 결과: fi_path(경로), fi_name(원본명)
            $fileInfo = DB::table('foex2022.tbl_file')
                          ->where('fi_module', 'board') 
                          ->where('fi_uid', $row->bd_id)
                          ->orderBy('fi_id', 'asc')
                          ->first();

            $filePath = null;

            if ($fileInfo && isset($fileInfo->fi_path)) {
                // fi_path가 "/volume1/.../파일명.pdf" 형태이므로 파일명만 추출
                $fileName = basename($fileInfo->fi_path); 
                $filePath = $fileName; 
            }

            // 3. 데이터 저장
            Brochure::create([
                'id'         => $row->bd_id,
                'title'      => $row->bd_subject,
                'content'    => $row->bd_content,
                'writer'     => $row->bd_writer_name,
                
                // uploads 폴더 경로와 결합하여 저장
                'file_path'  => $filePath ? 'uploads/' . $filePath : null, 
                'thumbnail'  => $filePath ? 'uploads/' . $filePath : null, // 썸네일도 일단 같은 파일로 지정 (이미지인 경우)
                
                'hit'        => $row->bd_hit,
                'is_display' => ($row->bd_is_display === 'Y'),
                'created_at' => $row->reg_time,
                'updated_at' => $row->upt_time ?: $row->reg_time,
            ]);
        }
    }
}

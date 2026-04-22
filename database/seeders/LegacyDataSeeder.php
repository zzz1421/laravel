<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegacyDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('notices')->truncate();
        // 1. 기존 DB에서 공지사항 데이터 가져오기
        // (DB 연결 이름이 'mysql_legacy'라고 가정, 필요시 수정)
        $oldBoards = DB::connection('mysql_legacy')
                       ->table('tbl_board')
                       ->where('bd_code', 'notice')
                       ->get();

        foreach ($oldBoards as $old) {
            
            // --- [이미지 경로 수정 로직 시작] ---
            $content = $old->bd_content;

            // 1) 도메인 제거 (http://www.foex.kr 부분 삭제)
            // 이렇게 하면 src="/data/upload/..." 형태가 됩니다.
            $content = str_replace('http://www.foex.kr', '', $content);
            $content = str_replace('https://www.foex.kr', '', $content);
            $content = str_replace('http://foex.kr', '', $content); // 혹시 몰라서 www 없는 것도 처리

            // 2) 경로 치환 (/data/upload/ -> /storage/uploads/)
            // 기존 경로: /data/upload/board/8/81/...
            // 변경 경로: /storage/uploads/board/8/81/...
            $content = str_replace('/data/upload/', '/storage/uploads/', $content);

            // (옵션) 에디터용 이미지 경로도 있다면 추가 치환
            $content = str_replace('/data/editor/', '/storage/uploads/editor/', $content);
            // --- [이미지 경로 수정 로직 끝] ---


            // 3. 새 테이블(notices)에 저장
            DB::table('notices')->insert([
                'title'      => $old->bd_subject,
                'content'    => $content, // 수정된 내용 저장
                'hit'        => $old->bd_hit,
                'created_at' => $old->reg_time,
                'updated_at' => $old->upt_time ?? $old->reg_time,
            ]);
        }
    }
}
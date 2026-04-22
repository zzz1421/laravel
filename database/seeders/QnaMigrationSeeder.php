<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QnaMigrationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. 새 테이블 초기화 (안전하게)
        DB::table('qnas')->truncate();

        // 2. 구 테이블 조회
        $oldQnas = DB::connection('mysql_legacy')
                    ->table('tbl_qna')
                    ->orderBy('qa_id', 'asc')
                    ->get();

        $count = 0;

        foreach ($oldQnas as $old) {
            // --- 데이터 변환 로직 ---

            // 1) 상태값 변환 (1:미답변->waiting, 2:답변완료->answered)
            $status = ($old->qa_answer == 2) ? 'answered' : 'waiting';

            // 2) 답변 내용 (qa_re_content 사용)
            // 상태가 '답변완료'일 때만 답변 내용을 가져옵니다.
            $answer = ($old->qa_answer == 2) ? $old->qa_re_content : null;

            // 3) 날짜 처리 (reg_time 사용)
            $createdAt = $old->reg_time;

            // 수정일: 답변일(qa_re_date)이 있으면 쓰고, 없으면 수정일(upt_time), 그것도 없으면 작성일
            $updatedAt = $old->qa_re_date ?? $old->upt_time ?? $createdAt;

            // --- 데이터 삽입 ---
            DB::table('qnas')->insert([
                'old_id'    => $old->qa_id,
                'category'  => $old->qa_classification,
                'title'     => $old->qa_title,
                'writer'    => $old->qa_name,
                'email'     => $old->qa_email,
                'phone'     => $old->qa_hp,
                'content'   => $old->qa_content,
                
                // 매핑 수정된 부분
                'answer'    => $answer,        // qa_re_content
                'status'    => $status,
                
                'secret'    => true,           // 기본 비밀글
                'hit'       => 0,
                'reg_ip'    => '127.0.0.1',
                
                // 매핑 수정된 부분
                'created_at'=> $createdAt,     // reg_time
                'updated_at'=> $updatedAt,
            ]);

            $count++;
        }

        $this->command->info("정정된 스키마로 총 {$count}건의 QnA 데이터 마이그레이션을 완료했습니다!");
    }
}
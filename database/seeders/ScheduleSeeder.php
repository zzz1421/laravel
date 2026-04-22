<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. 중복 방지: 기존 데이터 비우기 (ID 1번부터 다시 시작)
        DB::table('schedules')->truncate();

        // 2. 레거시 DB(mysql_legacy)에서 'tbl_plan' 테이블 데이터 가져오기
        // (config/database.php에 'mysql_legacy' 설정이 되어 있어야 함)
        $oldPlans = DB::connection('mysql_legacy')
                      ->table('tbl_plan')
                      ->get();

        foreach ($oldPlans as $old) {
            
            // 3. 새 테이블(schedules)에 데이터 매핑해서 넣기
            DB::table('schedules')->insert([
                'title'       => $old->pl_title,       // 제목
                'start'       => $old->pl_s_date,      // 시작일
                'end'         => $old->pl_e_date,      // 종료일
                'color'       => $old->pl_color,       // 색상 코드 (예: #ff0000)
                'type'        => 'notice',             // 일정 타입 (기본값 설정, 필요시 로직 추가)
                // pl_display 값이 '1'이면 true(보임), 아니면 false(숨김)
                'is_display'  => (isset($old->pl_display) && $old->pl_display == '1') ? true : false,
                'created_at'  => $old->pl_reg_date ?? now(), // 작성일
                'updated_at'  => now(),
            ]);
        }
    }
}
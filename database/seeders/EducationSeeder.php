<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class EducationSeeder extends Seeder
{
    public function run()
    {
        // 1. 기존 데이터 초기화 (FK 제약조건 무시하고 삭제)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('education_applications')->truncate();
        DB::table('educations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ---------------------------------------------------------
        // 2. 교육 과정 (tbl_education) 이관
        // ---------------------------------------------------------
        $oldEducations = DB::connection('mysql_legacy')
                           ->table('tbl_education')
                           ->get();

        foreach ($oldEducations as $old) {
            // 상태값 변환 (1:모집대기, 2:모집중, 3,4:모집종료)
            $status = 'closed'; // 기본값
            if ($old->ed_state == 1) $status = 'waiting';
            elseif ($old->ed_state == 2) $status = 'recruiting';
            elseif ($old->ed_state >= 3) $status = 'closed';

            DB::table('educations')->insert([
                'id'             => $old->ed_id,
                'title'          => $old->ed_edcation_name,
                'content'        => $old->ed_content,
                'status'         => $status,
                'price'          => is_numeric($old->ed_price) ? $old->ed_price : 0,
                'capacity'       => $old->ed_personnel,
                
                // 날짜 정보
                'register_start' => $old->ed_s_reperiod,
                'register_end'   => $old->ed_e_reperiod,
                'edu_start'      => $old->ed_s_period,
                'edu_end'        => $old->ed_e_period,
                'place'          => $old->ed_region,

                'created_at'     => $old->reg_time ?? now(),
                'updated_at'     => $old->upt_time ?? $old->reg_time ?? now(),
            ]);
        }
        $this->command->info("교육 과정 " . $oldEducations->count() . "건 이관 완료.");


        // ---------------------------------------------------------
        // 3. 신청 내역 (tbl_education_reservation) 이관
        // ---------------------------------------------------------
        $oldReservations = DB::connection('mysql_legacy')
                             ->table('tbl_education_reservation')
                             ->orderBy('er_id', 'asc')
                             ->get();

        $successCount = 0;
        $failCount = 0;

        foreach ($oldReservations as $row) {
            // A. 신청자(User) 찾기 (구 DB의 mb_id가 새 DB의 username임)
            $user = User::where('username', $row->mb_id)->first();
            
            // 회원이 없거나, 해당 교육과정이 없으면 스킵 (무결성 유지)
            if (!$user) {
                $failCount++;
                continue; 
            }

            // B. 상태값 변환 (1:승인대기, 2:승인, 3:취소/반려)
            $appStatus = 'waiting';
            if ($row->er_state == 2) $appStatus = 'approved';
            elseif ($row->er_state == 3) $appStatus = 'rejected';

            // C. 데이터 삽입
            try {
                DB::table('education_applications')->insert([
                    'id'             => $row->er_id,
                    'user_id'        => $user->id,          // 찾아낸 회원 ID
                    'education_id'   => $row->ed_id,        // 교육 ID
                    
                    'applicant_name' => $row->er_name,
                    'email'          => $row->er_email,
                    'phone'          => $row->er_hp,
                    'company_name'   => $row->er_company_ko, // 기업명
                    'position'       => $row->er_department, // 부서/직책
                    'memo'           => $row->er_memo,
                    
                    'status'         => $appStatus,
                    'approved_at'    => ($appStatus == 'approved') ? $row->er_agree_time : null,
                    
                    'created_at'     => $row->er_date ?? $row->reg_time ?? now(),
                    'updated_at'     => $row->upt_time ?? now(),
                ]);
                $successCount++;
            } catch (\Exception $e) {
                // 부모 교육과정 데이터가 없거나 FK 오류 시 스킵
                $failCount++;
            }
        }

        $this->command->info("교육 신청 내역: 성공 {$successCount}건, 실패(회원/과정 없음) {$failCount}건");
    }
}
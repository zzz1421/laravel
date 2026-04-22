<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class LegacyUserSeeder extends Seeder
{
    public function run()
    {
        // 1. mysql_legacy 연결을 통해 구 DB의 tbl_user 테이블 데이터 가져오기
        try {
            $oldUsers = DB::connection('mysql_legacy')->table('tbl_user')->get();
        } catch (\Exception $e) {
            $this->command->error("구 DB 연결(mysql_legacy) 실패 또는 tbl_user 테이블 없음: " . $e->getMessage());
            return;
        }

        $count = 0;

        foreach ($oldUsers as $old) {
            
            // 이메일 필수값 처리 (없을 경우 가짜 이메일 생성)
            $email = $old->mb_email;
            if (empty($email)) {
                $email = $old->mb_id . '@foex.legacy';
            }

            // 중복된 이메일이나 아이디가 있으면 skip 하거나 업데이트
            User::updateOrCreate(
                ['username' => $old->mb_id], // 고유 식별자 (아이디)
                [
                    'name' => $old->mb_name,
                    'email' => $email,
                    'phone' => $old->mb_hp,
                    'level' => $old->mb_level ?? 1,

                    // ★ [중요] 비밀번호 전략
                    // 1. 새 비밀번호 칸은 일단 랜덤으로 채워넣어 로그인 불가 상태로 만듦
                    'password' => '$2y$10$LEGACY' . Str::random(20),
                    
                    // 2. 옛날 비밀번호를 백업해둠 (로그인 시 검증용)
                    'old_password' => $old->mb_pw, 
                    
                    'created_at' => $old->mb_datetime ?? now(),
                    'updated_at' => now(),
                ]
            );
            $count++;
        }
        $this->command->info($count . '명의 회원 정보가 이관되었습니다.');
    }
}
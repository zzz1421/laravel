<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 여기에 실행할 시더들을 순서대로 적어주면 됩니다.
        $this->call([
            LegacyDataSeeder::class, // 공지사항 등 게시판 데이터 이관
            ScheduleSeeder::class,   // 일정 데이터 이관
        ]);
    }
}
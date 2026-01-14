<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PressReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // 구 DB(foex2022)의 tbl_news 테이블 데이터 호출
    $oldNews = DB::table('foex2022.tbl_news')->get();

    foreach ($oldNews as $row) {
        DB::table('press_releases')->insert([
            'id'         => $row->ne_id,
            'title'      => $row->ne_subject,
            'link_url'   => $row->ne_data,    // 기사 링크
            'source'     => $row->ne_content, // 출처
            'writer'     => $row->ne_name,
            'post_date'  => $row->ne_date,    // ★ ne_date를 작성일로 저장
            'hit'        => $row->ne_hit,
            'created_at' => $row->reg_time,   // DB 등록시간
            'updated_at' => $row->upt_time ?: $row->reg_time, // 수정시간(없으면 등록시간)
        ]);
    }
}
}
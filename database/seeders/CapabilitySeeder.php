<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Capability;

class CapabilitySeeder extends Seeder
{
    public function run()
    {
        $this->importData('foex2022.tbl_license', 'patent', 'li', 'license');
        $this->importData('foex2022.tbl_paper', 'paper', 'pa', 'paper');
        $this->importData('foex2022.tbl_mou', 'mou', 'mo', 'mou');
        $this->importData('foex2022.tbl_performance', 'performance', 'pf', 'performance');
        $this->importData('foex2022.tbl_certification', 'cert', 'ce', 'certification');
    }

    private function importData($tableName, $category, $prefix, $module)
    {
        $this->command->info("[시작] {$tableName} ({$category}) 이관...");

        try {
            $rows = DB::table($tableName)->get();
            if ($rows->isEmpty()) return;

            foreach ($rows as $row) {
                // PK 찾기
                $pk = $prefix . '_id';
                if ($category === 'cert' && !isset($row->{$pk})) {
                    if (isset($row->cf_id)) { $pk = 'cf_id'; $prefix = 'cf'; }
                }
                if (!isset($row->{$pk})) continue;
                $id = $row->{$pk};

                // 파일 찾기
                $filePath = null;
                try {
                    $fileInfo = DB::table('foex2022.tbl_file')
                                  ->where('fi_module', $module)
                                  ->where('fi_uid', $id)
                                  ->orderBy('fi_id', 'asc')
                                  ->first();

                    if ($fileInfo && !empty($fileInfo->fi_path)) {
                        // ★ 수정된 로직: 경로 구조 유지하기
                        // 구 경로: /.../data/file/board/10/file.jpg
                        // 목표: uploads/board/10/file.jpg
                        
                        $fullPath = $fileInfo->fi_path;
                        
                        // 'data/file/' 또는 'upload/' 키워드를 기준으로 뒷부분만 잘라냄
                        if (strpos($fullPath, '/file/') !== false) {
                            $parts = explode('/file/', $fullPath);
                            $relativePath = end($parts); // license/file.jpg 또는 board/10/file.jpg
                            $filePath = 'uploads/' . $relativePath;
                        } 
                        elseif (strpos($fullPath, '/upload/') !== false) {
                            $parts = explode('/upload/', $fullPath);
                            $relativePath = end($parts);
                            $filePath = 'uploads/' . $relativePath;
                        } 
                        else {
                            // 패턴이 없으면 그냥 파일명만 사용 (안전장치)
                            $filePath = 'uploads/' . basename($fullPath);
                        }
                    } 
                    elseif (!empty($row->{$prefix . '_file'})) {
                        $filePath = 'uploads/' . $row->{$prefix . '_file'};
                    }
                } catch (\Exception $e) {}

                $title = $row->{$prefix . '_subject'} ?? $row->{$prefix . '_title'} ?? $row->{$prefix . '_name'} ?? '제목 없음';
                $agency = $row->{$prefix . '_agency'} ?? $row->{$prefix . '_issuing'} ?? $row->{$prefix . '_client'} ?? null;
                $date = $row->{$prefix . '_date'} ?? $row->{$prefix . '_reg_date'} ?? null;

                Capability::create([
                    'category'   => $category,
                    'title'      => $title,
                    'agency'     => $agency,
                    'date'       => $date,
                    'file_path'  => $filePath,
                    'is_display' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            $this->command->info("  -> 완료");

        } catch (\Exception $e) {
            $this->command->error("  -> 에러: " . $e->getMessage());
        }
    }
}
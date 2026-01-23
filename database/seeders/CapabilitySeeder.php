<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Capability;

class CapabilitySeeder extends Seeder
{
    public function run()
    {
        // 기존 데이터 중복 방지를 위해 싹 비우고 시작 (선택사항)
        // Capability::truncate(); 

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

                // 파일 경로 찾기 로직
                $filePath = null;
                try {
                    $fileInfo = DB::table('foex2022.tbl_file')
                                  ->where('fi_module', $module)
                                  ->where('fi_uid', $id)
                                  ->orderBy('fi_id', 'asc')
                                  ->first();

                    if ($fileInfo && !empty($fileInfo->fi_path)) {
                        $fullPath = $fileInfo->fi_path;
                        if (strpos($fullPath, '/file/') !== false) {
                            $parts = explode('/file/', $fullPath);
                            $relativePath = end($parts);
                            $filePath = 'uploads/' . $relativePath;
                        } elseif (strpos($fullPath, '/upload/') !== false) {
                            $parts = explode('/upload/', $fullPath);
                            $relativePath = end($parts);
                            $filePath = 'uploads/' . $relativePath;
                        } else {
                            $filePath = 'uploads/' . basename($fullPath);
                        }
                    } elseif (!empty($row->{$prefix . '_file'})) {
                        $filePath = 'uploads/' . $row->{$prefix . '_file'};
                    }
                } catch (\Exception $e) {}

                // [수정] ★ MOU 내용 및 컬럼 매핑 로직 개선 ★
                $title = '제목 없음';
                $agency = null;
                $description = null; // 내용을 담을 변수
                $date = $row->{$prefix . '_date'} ?? $row->{$prefix . '_reg_date'} ?? null;

                if ($category === 'mou') {
                    // MOU 처리
                    $companyName = $row->mo_company_name ?? '';
                    $agency = $companyName; 
                    $title = $companyName ? $companyName . ' 업무협약(MOU)' : '업무협약';
                    
                    // ★ 핵심: MOU 내용(HTML) 가져오기
                    $description = $row->mo_content ?? null;

                    if (!$date && isset($row->mo_date)) {
                        $date = $row->mo_date;
                    }

                } else {
                    // 나머지 카테고리
                    $title = $row->{$prefix . '_subject'} ?? $row->{$prefix . '_title'} ?? $row->{$prefix . '_name'} ?? '제목 없음';
                    
                    $agency = $row->{$prefix . '_agency'} 
                           ?? $row->{$prefix . '_issuing'} 
                           ?? $row->{$prefix . '_client'} 
                           ?? $row->{$prefix . '_company_name'} 
                           ?? $row->{$prefix . '_organ'} 
                           ?? null;
                    
                    // 다른 테이블에도 내용 컬럼이 있다면 가져옴 (없으면 null)
                    $description = $row->{$prefix . '_content'} ?? null;
                }

                // DB에 저장
                Capability::create([
                    'category'    => $category,
                    'title'       => $title,
                    'agency'      => $agency,
                    'date'        => $date,
                    'file_path'   => $filePath,
                    'description' => $description, // ★ 내용 저장!
                    'is_display'  => true,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
            $this->command->info("  -> 완료");

        } catch (\Exception $e) {
            $this->command->error("  -> 에러: " . $e->getMessage());
        }
    }
}
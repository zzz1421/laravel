<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EducationApplication; // 관계 모델 import

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';
    
    // 모든 컬럼 입력 허용 (is_display 포함됨)
    protected $guarded = [];

    // 데이터 타입 변환 설정
    protected $casts = [
        'edu_start' => 'date',
        'edu_end' => 'date',
        'register_start' => 'date', 
        'register_end' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        // ★ [추가] 0/1 값을 자동으로 true/false로 변환 (필수!)
        'is_display' => 'boolean', 
    ];

    // ★ [필수] 이 부분이 있어야 에러가 안 납니다.
    public function applications() {
        return $this->hasMany(EducationApplication::class, 'education_id');
    }
}
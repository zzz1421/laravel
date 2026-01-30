<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 팩토리 기능 (선택사항이지만 추천)
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    // 테이블 이름 명시
    protected $table = 'educations';
    
    // 모든 컬럼 수정 가능하도록 허용
    protected $guarded = [];

    // ▼▼▼ [이 부분이 추가되어야 합니다!] ▼▼▼
    // DB에 있는 날짜 문자열을 진짜 '날짜 객체(Carbon)'로 변환해줍니다.
    protected $casts = [
        'edu_start' => 'date',
        'edu_end' => 'date',
        'register_start' => 'date', 
        'register_end' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    // ▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

    // 관계 설정: 이 교육에 달린 신청서들
    public function applications() {
        return $this->hasMany(EducationApplication::class);
    }
}
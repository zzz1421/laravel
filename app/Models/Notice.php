<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    // 1. 대량 할당 허용 컬럼에 추가
    protected $fillable = [
        'title', 
        'content', 
        'writer', 
        'hit',
        'is_display', // ★ 추가
        'is_top'      // ★ 추가
    ];

    // 2. 타입 캐스팅 설정 (0/1 -> false/true 자동 변환)
    protected $casts = [
        'is_display' => 'boolean',
        'is_top' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
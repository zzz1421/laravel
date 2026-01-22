<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

    // 테이블 이름 명시 (마이그레이션에서 만든 이름)
    protected $table = 'press_releases';

    // 대량 할당 가능한 컬럼 목록
    protected $fillable = [
        'title', 
        'link_url', 
        'source', 
        'writer', 
        'post_date', 
        'hit',
        'is_display'
    ];

    // 날짜 컬럼 캐스팅 (필수 아님, 편의상 추가)
    protected $casts = [
        'post_date' => 'date',
    ];
}
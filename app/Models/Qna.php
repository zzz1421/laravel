<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    use HasFactory;

    // 테이블명 (기본값 qnas와 같다면 생략 가능하지만 명시)
    protected $table = 'qnas';

    // 대량 할당 가능 컬럼
    protected $fillable = [
        'old_id', 'category', 'title', 'writer', 
        'email', 'phone', 'password', 'secret', 
        'content', 'answer', 'status', 'hit', 'reg_ip'
    ];

    // 날짜 캐스팅 (필요 시)
    protected $casts = [
        'secret' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
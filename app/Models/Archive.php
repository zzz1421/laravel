<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    // 테이블 이름 명시
    protected $table = 'archives';
    
    // 모든 컬럼 입력 허용 (시더 사용 시 필수)
    protected $guarded = [];
}
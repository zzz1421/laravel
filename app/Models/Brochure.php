<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brochure extends Model
{
    use HasFactory;

    // 여기가 문제입니다. 아래처럼 컬럼명을 모두 적어줘야 합니다.
    protected $fillable = [
        'title', 
        'pdf_path',    // ⭐ 이거 추가
        'image_path',  // ⭐ 이거 추가
        'is_visible'   // ⭐ 이거 추가
    ];

    // (참고) 만약 기존에 file_path 같은 옛날 컬럼명이 있다면 지우고 위 코드로 바꾸세요.
}
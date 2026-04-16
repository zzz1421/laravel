<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // 1. 대량 할당 허용 (AdminController에서 create/update 할 때 필수)
    protected $fillable = [
        'title', 
        'start', 
        'end', 
        'color', 
        'type', 
        'is_display'
    ];

    // 2. 날짜 자동 변환 (이게 없으면 관리자 페이지에서 에러남)
    // DB의 '2023-01-01' 문자열을 Carbon 날짜 객체로 바꿔줍니다.
    protected $casts = [
        'start' => 'date', 
        'end'   => 'date',
        'is_display' => 'boolean', // 0, 1을 true, false로 변환
    ];

    // 3. [중요] JSON 변환 시 추가할 가상 컬럼 (유저 페이지 JS 호환용)
    // 기존 유저 페이지 JS가 'date_str'을 찾고 있으므로 이걸 추가해줍니다.
    protected $appends = ['date_str'];

    // 'date_str'의 값을 결정하는 함수 (start 날짜를 Y-m-d 문자열로 반환)
    public function getDateStrAttribute()
    {
        return $this->start ? $this->start->format('Y-m-d') : null;
    }
}
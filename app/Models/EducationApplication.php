<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Education;

class EducationApplication extends Model
{
    use HasFactory;

    protected $table = 'education_applications';
    protected $guarded = [];

    // 관계 설정: 신청한 회원 정보 가져오기
    public function user() {
        return $this->belongsTo(User::class);
    }

    // 관계 설정: 신청한 교육 과정 정보 가져오기
    public function education() {
        return $this->belongsTo(Education::class);
    }
}
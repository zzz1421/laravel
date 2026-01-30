<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\EducationApplication;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',      // 아이디
        'phone',         // 연락처
        'level',         // 레벨
        'old_password',  // 구 비밀번호
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'old_password', // 보안상 숨김
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function applications()
    {
        // 한 유저는 여러 개의 신청서를 가질 수 있다 (1:N)
        return $this->hasMany(EducationApplication::class);
    }   
}
<?php

namespace App\Models; // <--- ★ 여기가 'App\Models' 여야 합니다.

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'content', 'hit'];
}
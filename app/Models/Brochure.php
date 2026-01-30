<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brochure extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pdf_path',
        'image_path',
        'is_display' // ★ is_visible 에서 수정됨
    ];

    protected $casts = [
        'is_display' => 'boolean', // ★ 수정됨
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionalVideo extends Model
{
    use HasFactory;

    protected $table = 'promotional_videos';
    
    // 시더에서 id와 날짜까지 강제로 넣기 위해 모든 필드 입력 허용
    protected $guarded = [];

    // 뷰에서 $video->thumbnail_url 로 바로 쓸 수 있는 가상 속성
    public function getThumbnailUrlAttribute()
    {
        if ($this->video_id) {
            // 유튜브 썸네일 (hqdefault: 고화질, mqdefault: 중간화질)
            return "https://img.youtube.com/vi/{$this->video_id}/hqdefault.jpg";
        }
        // 영상 ID가 없을 때 보여줄 기본 이미지 (필요시 수정)
        return 'https://via.placeholder.com/640x360.png?text=No+Thumbnail'; 
    }
}
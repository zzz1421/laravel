<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('brochures', function (Blueprint $table) {
            $table->id();
            $table->string('title');        // 브로슈어 제목
            
            // 핵심: 파일 경로를 2개로 명확히 분리
            $table->string('pdf_path');     // PDF 파일 경로 (다운로드용)
            $table->string('image_path');   // 표지 이미지 경로 (미리보기용)
            
            $table->boolean('is_visible')->default(true); // 공개 여부
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brochures');
    }
};
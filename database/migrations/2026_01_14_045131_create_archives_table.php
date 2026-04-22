<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 이미 테이블이 있다면 먼저 삭제하고 다시 만듭니다 (에러 방지용)
        Schema::dropIfExists('archives');

        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            
            // ▼▼▼ [여기부터 추가된 컬럼들입니다] ▼▼▼
            $table->string('title');             // 제목
            $table->text('content')->nullable(); // 내용 (비울 수 있음)
            $table->string('file_path')->nullable(); // 파일 경로
            $table->string('file_name')->nullable(); // 원본 파일명
            $table->integer('download_count')->default(0); // 다운로드 횟수
            $table->boolean('is_display')->default(true);  // 노출 여부
            $table->string('writer')->default('관리자');   // 작성자
            // ▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('brochures', function (Blueprint $table) {
        $table->id(); // bd_id
        $table->string('title'); // bd_subject
        $table->longText('content')->nullable(); // bd_content
        $table->string('writer')->default('포엑스'); // bd_writer_name
        $table->string('file_path')->nullable(); // 첨부파일 (브로슈어 PDF 등)
        $table->string('thumbnail')->nullable(); // 썸네일 이미지
        $table->integer('hit')->default(0); // bd_hit
        $table->boolean('is_display')->default(true); // bd_is_display (Y/N 변환)
        $table->timestamps(); // reg_time
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brochures');
    }
};

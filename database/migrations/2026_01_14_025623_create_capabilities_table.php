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
        Schema::create('capabilities', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // patent, paper, mou, performance, cert
            $table->string('title');    // 제목 (특허명, 논문명, 사업명 등)
            $table->string('agency')->nullable(); // 발급기관, 학회, 발주처
            $table->date('date')->nullable();     // 등록일, 계약일 등
            $table->string('file_path')->nullable(); // 연결된 파일 경로
            $table->boolean('is_display')->default(true);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capabilities');
    }
};

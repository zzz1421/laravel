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
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // bd_subject 대체
            $table->text('content'); // bd_content 대체
            $table->integer('hit')->default(0); // bd_hit 대체
            $table->string('writer')->nullable(); // bd_writer 대체
            $table->timestamps(); // reg_time, upt_time을 라라벨 표준으로 전환
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};

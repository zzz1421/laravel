<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start');             // 시작일 (YYYY-MM-DD)
            $table->date('end')->nullable();   // 종료일
            $table->string('color')->nullable(); // 색상 (Hex 코드 예: #ff0000)
            $table->string('type')->default('notice'); // 구분 (notice, edu, etc...)
            $table->boolean('is_display')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
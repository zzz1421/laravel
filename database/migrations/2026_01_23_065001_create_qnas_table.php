<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qnas', function (Blueprint $table) {
            $table->id(); // 새 시스템의 고유 번호 (기존 qa_id와 다를 수 있음, 원하면 유지 가능)
            $table->string('category')->nullable(); // 분류 (IECEx CoPC 등)
            $table->string('title');
            $table->string('writer');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable(); // 비회원 비밀번호 등
            $table->boolean('secret')->default(true); // 비밀글 여부 (기본값 True)
            $table->longText('content');
            $table->longText('answer')->nullable(); // 답변 내용
            $table->string('status')->default('waiting'); // waiting, answered
            $table->unsignedBigInteger('hit')->default(0);
            $table->string('reg_ip')->nullable();
            
            // 기존 데이터의 고유 ID를 보존하고 싶다면 추가 (선택)
            $table->unsignedBigInteger('old_id')->nullable()->index(); 
            
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qnas');
    }
};
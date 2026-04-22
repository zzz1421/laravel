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
        // ★ [핵심] 기존에 테이블이 남아있으면 에러가 나니, 먼저 삭제하는 명령을 넣습니다.
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

        // 1. users 테이블 생성
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // 라라벨 기본 필드
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // (구) 홈페이지 호환용 필드
            $table->string('username')->nullable()->unique()->comment('구 아이디(mb_id)');
            $table->string('phone')->nullable()->comment('연락처(mb_hp)');
            $table->tinyInteger('level')->default(1)->comment('권한레벨(mb_level)');
            $table->string('old_password')->nullable()->comment('구 비밀번호 백업용');

            $table->rememberToken();
            $table->timestamps();
        });

        // 2. 비밀번호 재설정 토큰 테이블 생성
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // 3. 세션 테이블 생성
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
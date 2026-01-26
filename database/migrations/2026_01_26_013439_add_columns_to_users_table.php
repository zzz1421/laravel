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
        Schema::table('users', function (Blueprint $table) {
            // 기존 mb_hp 대응
            $table->string('phone')->nullable()->after('email'); 
            // 기존 mb_id (로그인 아이디) 대응 - 필요하다면 추가
            $table->string('username')->nullable()->after('id')->unique(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'username']);
        });
    }
};

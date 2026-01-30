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
        Schema::table('press_releases', function (Blueprint $table) {
            // link_url 컬럼 뒤에 thumbnail 컬럼 추가 (nullable: 비워둘 수 있음)
            $table->string('thumbnail')->nullable()->after('link_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('press_releases', function (Blueprint $table) {
            // 롤백 시 컬럼 삭제
            $table->dropColumn('thumbnail');
        });
    }
};
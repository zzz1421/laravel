<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('educations', function (Blueprint $table) {
            // is_display 컬럼이 없을 때만 추가 (기본값: 1-공개)
            if (!Schema::hasColumn('educations', 'is_display')) {
                // status 컬럼 뒤에 추가합니다.
                $table->boolean('is_display')->default(true)->after('status')->comment('공개여부');
            }
        });
    }

    public function down()
    {
        Schema::table('educations', function (Blueprint $table) {
            if (Schema::hasColumn('educations', 'is_display')) {
                $table->dropColumn('is_display');
            }
        });
    }
};
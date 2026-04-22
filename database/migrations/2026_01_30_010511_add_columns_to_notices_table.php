<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('notices', function (Blueprint $table) {
            // is_display 컬럼이 없을 때만 추가 (기본값: 1-공개)
            if (!Schema::hasColumn('notices', 'is_display')) {
                $table->boolean('is_display')->default(true)->after('content')->comment('공개여부');
            }

            // is_top 컬럼이 없을 때만 추가 (기본값: 0-일반)
            if (!Schema::hasColumn('notices', 'is_top')) {
                $table->boolean('is_top')->default(false)->after('is_display')->comment('상단고정');
            }
        });
    }

    public function down()
    {
        Schema::table('notices', function (Blueprint $table) {
            if (Schema::hasColumn('notices', 'is_display')) {
                $table->dropColumn('is_display');
            }
            if (Schema::hasColumn('notices', 'is_top')) {
                $table->dropColumn('is_top');
            }
        });
    }
};
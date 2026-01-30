<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('brochures', function (Blueprint $table) {
            // 컬럼 이름 변경: is_visible -> is_display
            $table->renameColumn('is_visible', 'is_display');
        });
    }

    public function down()
    {
        Schema::table('brochures', function (Blueprint $table) {
            // 롤백 시 원상복구
            $table->renameColumn('is_display', 'is_visible');
        });
    }
};
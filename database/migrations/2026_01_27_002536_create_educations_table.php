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
    Schema::create('educations', function (Blueprint $table) {
        $table->id();
        $table->string('title')->comment('교육명 (ed_edcation_name)');
        $table->text('content')->nullable()->comment('교육내용');
        
        // 모집 상태 (waiting:대기, recruiting:모집중, closed:마감)
        $table->string('status')->default('recruiting'); 
        
        $table->integer('price')->default(0)->comment('교육비');
        $table->integer('capacity')->default(0)->comment('모집정원 (ed_personnel)');
        
        // 날짜 관련
        $table->date('register_start')->nullable()->comment('접수시작일');
        $table->date('register_end')->nullable()->comment('접수마감일');
        $table->date('edu_start')->nullable()->comment('교육시작일');
        $table->date('edu_end')->nullable()->comment('교육종료일');
        
        $table->string('place')->nullable()->comment('교육장소 (ed_region)');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};

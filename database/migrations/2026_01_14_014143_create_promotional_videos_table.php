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
        Schema::create('promotional_videos', function (Blueprint $table) {
           $table->id(); 
            $table->string('title'); 
            $table->string('video_url')->nullable(); // 추출한 유튜브 주소
            $table->string('video_id')->nullable();  // 썸네일용 ID
            $table->integer('hit')->default(0); 
            $table->boolean('is_display')->default(true); 
            $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotional_videos');
    }
};

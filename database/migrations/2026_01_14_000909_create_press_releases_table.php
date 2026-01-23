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
    Schema::create('press_releases', function (Blueprint $table) {
        $table->id(); 
        $table->string('title'); 
        $table->string('link_url')->nullable(); 
        // ★ string 대신 text 또는 longText로 변경 (HTML 데이터를 수용하기 위함)
        $table->longText('source')->nullable(); 
        
        $table->string('writer')->default('포엑스'); 
        $table->boolean('is_display')->default(1);
        $table->date('post_date'); 
        $table->integer('hit')->default(0); 
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('press_releases');
    }
};

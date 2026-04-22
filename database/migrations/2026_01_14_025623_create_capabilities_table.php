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
        Schema::create('capabilities', function (Blueprint $table) {
        $table->id();
        $table->string('category');
        $table->string('title');
        $table->string('agency')->nullable();
        $table->date('date')->nullable();
        $table->string('file_path')->nullable();
        
        // [추가] 상세 내용 저장용 (MOU 내용 등)
        $table->longText('description')->nullable(); 
        
        $table->boolean('is_display')->default(true);
        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capabilities');
    }
};

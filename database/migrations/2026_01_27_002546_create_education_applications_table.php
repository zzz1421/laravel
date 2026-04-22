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
    Schema::create('education_applications', function (Blueprint $table) {
        $table->id();
        
        // ★ 핵심 관계 설정
        $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('신청자 회원ID');
        $table->foreignId('education_id')->constrained('educations')->onDelete('cascade')->comment('신청한 교육과정');

        // 신청자 정보 (회원 정보와 다를 수 있으므로 별도 저장)
        $table->string('applicant_name');
        $table->string('email');
        $table->string('phone');
        $table->string('company_name')->nullable()->comment('소속(기업명)');
        $table->string('position')->nullable()->comment('직책');
        
        // 승인 상태 (waiting:승인대기, approved:승인, rejected:반려)
        $table->string('status')->default('waiting')->comment('er_state 대응');
        
        $table->text('memo')->nullable()->comment('남길말씀');
        $table->timestamp('approved_at')->nullable()->comment('승인일시');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_applications');
    }
};

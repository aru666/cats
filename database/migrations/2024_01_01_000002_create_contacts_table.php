<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('name')->comment('姓名');
            $table->string('nickname')->nullable()->comment('暱稱');
            $table->string('department')->nullable()->comment('隸屬部門');
            $table->string('title')->nullable()->comment('職稱');
            $table->string('job_type')->nullable()->comment('職務類別');
            $table->string('job_level')->nullable()->comment('職等');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable()->comment('聯絡電話');
            $table->string('phone')->nullable()->comment('公司電話');
            $table->text('notes')->nullable()->comment('備註');
            $table->string('employment_status')->default('active')->comment('就職狀態');
            $table->foreignId('sales_id')->nullable()->constrained('users')->comment('負責業務');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
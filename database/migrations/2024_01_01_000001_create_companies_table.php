<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('tax_id')->unique()->comment('統一編號');
            $table->string('name')->comment('公司名稱');
            $table->string('short_name')->nullable()->comment('公司簡稱');
            $table->string('phone')->nullable()->comment('公司電話');
            $table->string('address')->nullable()->comment('公司地址');
            $table->string('website')->nullable()->comment('網址');
            $table->string('business_unit')->nullable()->comment('事業單位');
            $table->string('industry_type')->nullable()->comment('產業類別');
            $table->text('focus_issues')->nullable()->comment('關注議題');
            $table->string('marketing_schedule')->nullable()->comment('行銷排程');
            $table->string('fiscal_year')->nullable()->comment('會計年度');
            $table->foreignId('sales_id')->nullable()->constrained('users')->comment('負責業務');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
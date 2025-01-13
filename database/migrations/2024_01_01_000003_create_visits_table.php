<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('contact_id')->constrained();
            $table->foreignId('sales_id')->constrained('users');
            $table->string('business_unit')->comment('BU');
            $table->json('product_types')->comment('產品類型');
            $table->string('visit_type')->comment('拜訪方式');
            $table->date('visit_date')->comment('拜訪日期');
            $table->text('content')->comment('拜訪內容');
            $table->string('next_action')->nullable()->comment('後續行動');
            $table->dateTime('reminder_at')->nullable()->comment('提醒時間');
            $table->boolean('has_proposal')->default(false)->comment('提案');
            $table->string('opportunity_name')->nullable()->comment('商機名稱');
            $table->boolean('is_direct_client')->default(true)->comment('直客');
            $table->string('agency')->nullable()->comment('代理商');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
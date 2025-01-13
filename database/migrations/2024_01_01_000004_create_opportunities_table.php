<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->string('agency')->nullable()->comment('代理商');
            $table->foreignId('contact_id')->constrained();
            $table->string('name')->comment('商機名稱');
            $table->string('visit_type')->comment('拜訪方式');
            $table->date('visit_date')->comment('拜訪日期');
            $table->text('content')->comment('拜訪內容');
            $table->foreignId('sales_id')->constrained('users');
            $table->string('business_unit')->comment('BU');
            $table->json('product_types')->comment('產品類型');
            $table->decimal('amount', 15, 2)->default(0)->comment('成交金額');
            $table->decimal('estimated_amount', 15, 2)->default(0)->comment('預估金額');
            $table->integer('success_rate')->default(0)->comment('預估成率');
            $table->text('cooperation_issues')->nullable()->comment('合作議題');
            $table->boolean('has_ad_exchange')->default(false)->comment('廣告交換');
            $table->string('next_action')->nullable()->comment('後續行動');
            $table->dateTime('reminder_at')->nullable()->comment('提醒時間');
            $table->string('stage')->default('development')->comment('階段');
            $table->string('status')->default('in_progress')->comment('商機狀態');
            $table->text('status_reason')->nullable()->comment('原因說明');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
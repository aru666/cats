<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_id')->constrained();
            $table->foreignId('sales_id')->constrained('users');
            $table->string('title')->comment('合約標題');
            $table->text('content')->comment('合約內容');
            $table->decimal('amount', 15, 2)->comment('合約金額');
            $table->string('status')->default('draft')->comment('合約狀態');
            $table->date('start_date')->comment('開始日期');
            $table->date('end_date')->comment('結束日期');
            $table->string('payment_terms')->comment('付款條件');
            $table->string('delivery_terms')->comment('交付條件');
            $table->text('special_terms')->nullable()->comment('特殊條款');
            $table->text('notes')->nullable()->comment('備註');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
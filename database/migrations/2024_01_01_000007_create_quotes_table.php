<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proposal_id')->constrained();
            $table->foreignId('sales_id')->constrained('users');
            $table->string('title')->comment('報價標題');
            $table->text('content')->comment('報價內容');
            $table->decimal('amount', 15, 2)->comment('報價金額');
            $table->string('status')->default('draft')->comment('報價狀態');
            $table->date('valid_until')->comment('有效期限');
            $table->string('payment_terms')->nullable()->comment('付款條件');
            $table->string('delivery_terms')->nullable()->comment('交付條件');
            $table->text('notes')->nullable()->comment('備註');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
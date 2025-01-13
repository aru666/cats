<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opportunity_id')->constrained();
            $table->foreignId('sales_id')->constrained('users');
            $table->string('title')->comment('提案標題');
            $table->text('content')->comment('提案內容');
            $table->decimal('amount', 15, 2)->comment('提案金額');
            $table->string('status')->default('draft')->comment('提案狀態');
            $table->date('valid_until')->comment('有效期限');
            $table->text('notes')->nullable()->comment('備註');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
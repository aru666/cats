<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('performance_targets', function (Blueprint $table) {
            $table->id();
            $table->string('business_unit')->comment('BU');
            $table->integer('year')->comment('年度');
            $table->string('department')->nullable()->comment('部門');
            $table->integer('quarter')->nullable()->comment('季度');
            $table->integer('month')->nullable()->comment('月份');
            $table->foreignId('user_id')->nullable()->constrained()->comment('業務人員');
            $table->decimal('target_amount', 15, 2)->comment('目標金額');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('performance_targets');
    }
};
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
        Schema::create('customer_info', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->json('stores')->nullable();
            $table->json('workers')->nullable();
            $table->json('direction_action')->nullable();
            $table->json('cash_box_information')->nullable();
            $table->json('bank_details')->nullable();
            $table->json('control_cash_registers')->nullable();
            $table->json('list_items')->nullable();
            $table->json('bank_statements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_info');
    }
};

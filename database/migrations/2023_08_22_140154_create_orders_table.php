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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->enum('status', ['UNPAID', 'WAITING_ADMIN_CONFIRMATION', 'PAID', 'CANCELED']);
            $table->text('transfer_proof')->nullable();
            $table->integer('final_price');
            $table->enum('payment_method', ['BANK_TRANSFER', 'PAYMENT_GATEWAY']);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

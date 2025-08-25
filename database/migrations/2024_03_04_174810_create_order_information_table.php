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
        Schema::create('order_information', function (Blueprint $table) 
        {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers_info')->onDelete('cascade');

            $table->unsignedBigInteger('customer_address_id');
            $table->foreign('customer_address_id')->references('id')->on('customers_address')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products_info')->onDelete('cascade');

            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers_info')->onDelete('cascade');

            $table->string('product_quantity');
            $table->string('product_price');

            $table->string('is_order_placed')->nullable();
            $table->string('order_placed_date')->nullable();
            $table->string('is_order_cancelled')->nullable();
            $table->string('order_cancelled_date')->nullable();
            $table->string('is_order_accepted')->nullable();
            $table->string('order_accepted_date')->nullable();
            $table->string('is_order_packed')->nullable();
            $table->string('order_packed_date')->nullable();

            $table->string('is_delivery_allocated')->nullable();
            $table->string('id_of_delivery_team_member')->nullable();
            $table->string('delivery_allocated_date')->nullable();

            $table->string('is_order_shipped')->nullable();
            $table->string('order_shipped_date')->nullable();
            $table->string('is_order_delivered')->nullable();
            $table->string('order_delivered_date')->nullable();
            $table->string('is_requested_for_exchange')->nullable();
            $table->string('requested_for_exchange_date')->nullable();
            $table->string('is_requested_for_return')->nullable();
            $table->string('requested_for_return_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_information');
    }
};

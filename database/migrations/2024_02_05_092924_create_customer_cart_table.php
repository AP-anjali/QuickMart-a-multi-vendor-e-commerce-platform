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
        Schema::create('customer_cart', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers_info')->onDelete('cascade');

            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers_info')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products_info')->onDelete('cascade');

            $table->integer('product_quantity_ordered_by_customer');
            $table->decimal('total_price_of_product_with_all_quantities_without_discount', 10, 2);
            $table->decimal('total_price_of_product_with_all_quantities_with_discount', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_cart');
    }
};

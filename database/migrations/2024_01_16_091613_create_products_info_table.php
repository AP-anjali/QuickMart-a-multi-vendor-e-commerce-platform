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
        Schema::create('products_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers_info')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_brand');
            $table->string('product_title');
            $table->text('product_description');
            $table->decimal('product_price', 10, 2);
            $table->decimal('discount_price', 10, 2);
            $table->integer('product_quantity');
            $table->string('selected_category_name');
            $table->unsignedBigInteger('selected_category_id');
            $table->foreign('selected_category_id')->references('id')->on('categories_info');            
            $table->text('product_keywords');
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_weight')->nullable();
            $table->enum('product_status', ['active', 'inactive'])->default('active');
            $table->string('selected_section_name');
            $table->unsignedBigInteger('selected_section_id');
            $table->foreign('selected_section_id')->references('id')->on('sections_info');
            $table->string('product_main_image');
            $table->text('product_other_images')->nullable();
            $table->boolean('tc')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products_info');
        Schema::enableForeignKeyConstraints();
    }
};

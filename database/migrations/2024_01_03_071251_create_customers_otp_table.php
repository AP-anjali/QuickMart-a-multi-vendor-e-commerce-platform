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
        Schema::create('customers_otp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_id');
            $table->foreign('c_id')->references('id')->on('customers_info')->onDelete('cascade');
            $table->string('otp', 6);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('otp_expires_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('customers_otp');
        Schema::enableForeignKeyConstraints();
    }
};

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
        Schema::create('sellers_otp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('id')->on('sellers_info')->onDelete('cascade');
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
        Schema::dropIfExists('sellers_otp');
        Schema::enableForeignKeyConstraints();
    }
};

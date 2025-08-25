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
        Schema::create('seller_un_ps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('id')->on('sellers');
            $table->string('username');
            $table->string('password');
            $table->string('confirm_password');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_un_ps');
    }
};

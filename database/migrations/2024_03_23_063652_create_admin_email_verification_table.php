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
        Schema::create('admin_email_verification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('system_administration')->onDelete('cascade');
            $table->string('varification_code');
            $table->timestamp('varification_code_created_at')->useCurrent();
            $table->timestamp('varification_code_expires_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_email_verification');
    }
};

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
        Schema::create('delivery_team_member_email_verification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('d_id');
            $table->foreign('d_id')->references('id')->on('delivery_team_application_info')->onDelete('cascade');
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
        Schema::dropIfExists('delivery_team_member_email_verification');
    }
};

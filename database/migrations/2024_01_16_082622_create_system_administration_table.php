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
        Schema::create('system_administration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('customers_info');
            $table->string('admin_name');
            $table->string('user_type')->default('1');
            $table->string('admin_phone_no');
            $table->string('admin_email');
            $table->string('admin_address');
            $table->string('username');
            $table->string('secret_password');
            $table->string('password');
            $table->string('profile_pic')->default('img/default_profile_pic.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('system_administration');
        Schema::enableForeignKeyConstraints();
    }
};

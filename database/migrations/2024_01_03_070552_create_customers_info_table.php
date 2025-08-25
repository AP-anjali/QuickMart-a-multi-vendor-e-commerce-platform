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
        Schema::create('customers_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->text('address');
            $table->string('user_type')->default('0');
            $table->string('profile_pic')->default('img/default_profile_pic.png');
            $table->timestamp('registration_date')->useCurrent();

            $table->string('is_active')->default('1');      // 1 -> active | 0 -> deactivated by self | -1 -> deactivated by admin

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_info');
    }
};

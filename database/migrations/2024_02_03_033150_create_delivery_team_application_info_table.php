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
        Schema::create('delivery_team_application_info', function (Blueprint $table) {
            $table->id();
            $table->integer('user_type')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('phone_no');
            $table->text('address');
            $table->enum('gender', ['Male', 'Female']); 
            $table->date('date_of_birth');
            $table->string('photo');
            $table->string('Aadharcard');

            $table->string('vehicle_rc_book');            
            $table->string('vehicle_puc');            
            $table->string('vehicle_licence');            
            $table->string('vehicle_insurance');            
                        
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('bank_ifsc_code');
            $table->string('bank_micr_code');
            $table->string('account_holder_name');
            $table->string('account_number');
            $table->string('account_type');
            $table->string('proof_of_bank_account_ownership');   

            $table->string('experience_job')->nullable();
            $table->string('experience_job_workplace')->nullable();
            $table->string('experience_job_duration')->nullable();
            $table->string('proof_of_experience')->nullable();
            $table->text('experience_description')->nullable();
            $table->boolean('tc'); 

            $table->boolean('is_confirmed_from_employee_first')->default(0);
            $table->string('employee_id_first')->nullable();

            $table->boolean('is_confirmed_from_admin_first')->default(0);
            $table->string('admin_id_first')->nullable();

            $table->boolean('is_contacted')->default(0);
            $table->string('employee_id_who_contacted')->nullable();

            $table->string('proof_of_test_document')->nullable();
            $table->string('employee_id_who_upload_proof_of_test_document')->nullable();

            $table->boolean('is_confirmed_from_employee_second')->default(0);
            $table->string('employee_id_second')->nullable();

            $table->boolean('is_confirmed_from_admin_second')->default(0);
            $table->string('admin_id_second')->nullable();

            $table->string('confirmation_code')->nullable();
            $table->boolean('is_joined')->default(0);
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('confirm_password')->nullable();

            $table->string('profile_pic')->default('img/default_profile_pic.png');

            $table->string('is_active')->default('1');      // 1 -> active | 0 -> deactivated by self | -1 -> deactivated by admin

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_team_application_info');
    }
};

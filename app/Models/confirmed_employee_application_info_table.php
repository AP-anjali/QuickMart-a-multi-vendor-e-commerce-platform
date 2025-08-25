<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class confirmed_employee_application_info_table extends Model
{

    protected $table = 'confirmed_employee_application_info';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    use HasFactory;

    protected $fillable = [
        'user_type',
        'name',
        'email',
        'phone_no',
        'address',
        'gender',
        'date_of_birth',
        'photo',
        'Aadharcard',
        'percentage_of_twelve',
        'proof_of_percentage_of_twelve',
        'other_educational_details',
        'confirmation_of_computer_knowlege',
        'bank_name',
        'bank_branch',
        'bank_ifsc_code',
        'bank_micr_code',
        'account_holder_name',
        'account_number',
        'account_type',
        'proof_of_bank_account_ownership',
        'experience_job',
        'experience_job_workplace',
        'experience_job_duration',
        'proof_of_experience',
        'experience_description',
        'tc',
        'employee_confirmation_code',
    ];
}

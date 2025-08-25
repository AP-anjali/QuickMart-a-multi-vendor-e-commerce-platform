<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_team_application_info_table extends Model
{

    protected $table = 'delivery_team_application_info';
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
        'vehicle_rc_book',
        'vehicle_puc',
        'vehicle_licence',
        'vehicle_insurance',
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
    ];
}

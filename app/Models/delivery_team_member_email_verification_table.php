<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery_team_member_email_verification_table extends Model
{
    use HasFactory;

    public $table = 'delivery_team_member_email_verification';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'd_id',
        'varification_code',
        'varification_code_expires_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system_administration_table extends Model
{
    public $table = 'system_administration';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['admin_id', 'admin_name', 'admin_phone_no', 'admin_email', 'admin_address', 'username', 'secret_password', 'password'];

}

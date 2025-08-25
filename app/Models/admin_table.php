<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_table extends Model
{
    public $table = 'admin';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}

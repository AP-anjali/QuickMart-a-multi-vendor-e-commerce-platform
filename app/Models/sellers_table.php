<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellers_table extends Model
{
    public $table = 'sellers';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}

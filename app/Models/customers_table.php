<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers_table extends Model
{
    public $table = 'customers';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}

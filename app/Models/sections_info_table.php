<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sections_info_table extends Model
{
    public $table = 'sections_info';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['admin_id', 'section_name'];
}

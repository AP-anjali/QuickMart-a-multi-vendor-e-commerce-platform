<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee_application_info_table;

class employees_feedbacks_table extends Model
{
    use HasFactory;

    public $table = 'employees_feedbacks';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'rating',
        'feedback',
    ];

    public function employee()
    {
        return $this->belongsTo(employee_application_info_table::class, 'employee_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers_info_table;

class customers_feedbacks_table extends Model
{
    use HasFactory;
    
    public $table = 'customers_feedbacks';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'rating',
        'feedback',
    ];

    public function customer()
    {
        return $this->belongsTo(customers_info_table::class, 'customer_id');
    }
}

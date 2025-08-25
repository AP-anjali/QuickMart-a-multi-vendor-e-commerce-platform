<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers_info_table;

class customers_address_table extends Model
{
    use HasFactory;

    public $table = 'customers_address';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'country',
        'state',
        'city',
        'area_or_village',
        'pincode',
        'landmark',
        'full_address',
    ];

    public function customer()
    {
        return $this->belongsTo(customers_info_table::class, 'customer_id');
    }
}

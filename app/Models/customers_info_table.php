<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers_address_table;

class customers_info_table extends Model
{
    public $table = 'customers_info';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'address',
    ];

    public function addresses()
    {
        return $this->hasMany(customers_address_table::class, 'customer_id');
    }
}

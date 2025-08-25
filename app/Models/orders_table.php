<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_table extends Model
{
    use HasFactory;

    public $table = 'orders';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'total_amount',
        'transaction_id',
        'payment_id',
        'payment_status',
        'payment_info',
    ];
}

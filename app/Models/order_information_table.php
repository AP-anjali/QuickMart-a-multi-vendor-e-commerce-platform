<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers_info_table;
use App\Models\seller_info_table;
use App\Models\customers_address_table;
use App\Models\products_info_table;
use App\Models\orders_table;

class order_information_table extends Model
{
    use HasFactory;
    public $table = 'order_information';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'customer_id',
        'customer_address_id',
        'product_id',
        'seller_id',
        'product_quantity',
        'product_price',
        'is_order_placed',
        'order_placed_date',
        'is_order_cancelled',
        'order_cancelled_date',
        'is_order_accepted',
        'order_accepted_date',
        'is_order_packed',
        'order_packed_date',
        'is_order_shipped',
        'order_shipped_date',
        'is_order_delivered',
        'order_delivered_date',
        'is_requested_for_exchange',
        'is_requested_for_return',
    ];

    public function order()
    {
        return $this->belongsTo(orders_table::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(customers_info_table::class, 'customer_id');
    }

    public function customer_address()
    {
        return $this->belongsTo(customers_address_table::class, 'customer_address_id');
    }

    public function product()
    {
        return $this->belongsTo(products_info_table::class, 'product_id');
    }

    public function seller()
    {
        return $this->belongsTo(seller_info_table::class, 'seller_id');
    }

}

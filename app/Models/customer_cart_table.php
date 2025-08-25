<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customers_info_table;
use App\Models\seller_info_table;
use App\Models\products_info_table;

class customer_cart_table extends Model
{
    public $table = 'customer_cart';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'seller_id',
        'product_id',
        'product_quantity_ordered_by_customer',
        'total_price_of_product_with_all_quantities',
    ];

    public function customer()
    {
        return $this->belongsTo(customers_info_table::class, 'customer_id');
    }

    public function seller()
    {
        return $this->belongsTo(seller_info_table::class, 'seller_id');
    }

    public function product()
    {
        return $this->belongsTo(products_info_table::class, 'product_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller_info_table;

class products_info_table extends Model
{
    protected $table = 'products_info';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'seller_id',
        'product_name',
        'product_brand',
        'product_title',
        'product_description',
        'product_price',
        'discount_price',
        'product_quantity',
        'selected_category_name',
        'selected_category_id',
        'product_keywords',
        'product_color',
        'product_size',
        'product_weight',
        'product_status',
        'selected_section_name',
        'selected_section_id',
        'product_main_image',
        'product_other_images',
    ];

    protected $casts = [
        'product_other_images' => 'json',
    ];

    public function seller()
    {
        return $this->belongsTo(seller_info_table::class, 'seller_id');
    }
}

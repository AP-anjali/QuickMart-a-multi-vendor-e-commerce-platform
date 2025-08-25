<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller_info_table;

class sellers_feedbacks_table extends Model
{
    use HasFactory;
    public $table = 'sellers_feedbacks';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'seller_id',
        'rating',
        'feedback',
    ];

    public function seller()
    {
        return $this->belongsTo(seller_info_table::class, 'seller_id');
    }
}
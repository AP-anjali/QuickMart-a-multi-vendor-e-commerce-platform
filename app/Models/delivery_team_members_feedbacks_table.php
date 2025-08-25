<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\delivery_team_application_info_table;

class delivery_team_members_feedbacks_table extends Model
{
    use HasFactory;

    public $table = 'delivery_team_members_feedbacks';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'd_id',
        'rating',
        'feedback',
    ];

    public function delivery_team_member()
    {
        return $this->belongsTo(delivery_team_application_info_table::class, 'd_id');
    }
}

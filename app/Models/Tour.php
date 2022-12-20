<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'time_ids',
        'image',
        'banner_img',
        'status',
        'on_home',
        'on_home_sequence',
        'type',
        'sequence',
        'location_id',
        'random_id',
        'min_age',
        'pickup_and_drop',
        'convoy_leader',
        'tour_guide',
        'refreshments_ids',
        'safety_gear_ids'
    ];
    protected $hidden = [
        'created_at','updated_at',
    ];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOnhome($query, $onHome)
    {
        return $query->where('on_home', $onHome);
    }

    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }

    public function ScopeSequence($query){
        return $query->orderBy('sequence','ASC');
    }

    public function location(){
        return $this->hasOne('App\Models\Location','id','location_id');
    }
}

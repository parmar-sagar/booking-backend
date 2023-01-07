<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tour_id',
        'name',
        'short_name',
        'description',
        // 'time_ids',
        'includes_ids',
        'highlight_ids',
        'warning_ids',
        'banner_img',
        'image',
        'status',
        'type',
        'activities_ids',
        'no_of_persons',
        'is_deals',
        'discount',
        'sequence',
        'random_id',
        'tour_itenary',
        'additional_info_ids',
        'pickup_time',
        'dropoff_time',
        'quantity',
        'available_quantity'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    protected $dates = ['deleted_at'];

    public function scopeDeals($query){
        return $query->where('is_deals', 1);
    }

    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }

    public function ScopeSequence($query){
        return $query->orderBy('sequence','ASC');
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    
    
    public function tours(){
        return $this->hasOne('App\Models\Tour','id','tour_id');
    }
    
    
}

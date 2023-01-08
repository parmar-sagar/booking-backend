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
        'link',
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

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function scopeSafari($query){
        return $query->where('type', 'Safari');
    }    

    public function scopeTour($query){
        return $query->where('type', 'Tour');
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
        return $this->hasOne(Location::class,'id','location_id');
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class,'tour_id','id');
    }
}

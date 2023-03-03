<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'random_id',
        'name',
        'description',
        'min_age',
        'convoy_leader',
        'tour_guide',
        'pickup_and_drop',
        'time_ids',
        'location_id',
        'safety_gear_ids',
        'refreshments_ids',
        'sequence',
        'status',
        'image',
        'banner_img',
        'on_home',
        'on_home_sequence',
        'type',
        'voucher',
        'voucher_status',
        'voucher_expiry_date',
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

    public function scopeHomeTour($query){
        return $query->where('on_home', 1);
    }
    
    public function scopeNotOnHomeTour($query){
        return $query->where('on_home', 0);
    }
    
    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }

    public function ScopeSequence($query){
        return $query->orderBy('sequence','ASC');
    }
    public function ScopeStatus($query){
        return $query->where('status',1);
    }

    public function location(){
        return $this->hasOne(Location::class,'id','location_id');
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class,'tour_id','id');
    }
}

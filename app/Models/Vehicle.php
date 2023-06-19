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
        'random_id',
        'type',
        'tour_id',
        'name',
        'short_name',
        'description',
        'no_of_persons',
        'includes_ids',
        'highlight_ids',
        'warning_ids',
        'activities_ids',
        'additional_info_ids',
        'tour_itenary',
        'quantity',
        'available_quantity',
        'status',
        'banner_img',
        'image',
        'sequence',
        'pickup_time',
        'dropoff_time',
        'discount',
        'is_deals',
        //pickup_status and disc are newly added on 05/06/2023
        'pickup_status',
        'disc'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    protected $dates = ['deleted_at'];

    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }

    public function ScopeSequence($query){
        return $query->orderBy('sequence','ASC');
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }
    
    public function scopeDeals($query){
        return $query->where('is_deals', 1);
    }
    public function scopeStatus($query){
        return $query->where('status',1);
    }

    public function scopeNotDeals($query){
        return $query->where('is_deals', 0);
    }

    public function tour(){
        return $this->hasOne(Tour::class,'id','tour_id');
    }

    public function availableSlot(){
        return $this->hasMany(AvailableSlot::class,'vehicle_id','id');
    }

    public function prices(){
        return $this->hasMany(Price::class,'vehicle_id','id');
    }

    public function minprice(){
        return $this->hasOne(Price::class,'vehicle_id','id')->select('amount');
    }

    public function gallery(){
        return $this->hasMany(TourGallary::class,'tour_id','tour_id')->select('gallry_images');
    }
    
    public function price(){
        return $this->hasOne(Price::class,'vehicle_id','id');
    }

    
    
    public function scopeSafari($query){
        return $query->where('type', 'Safari');
    }    

    public function scopeTours($query){
        return $query->where('type', 'Tour');
    }    
}

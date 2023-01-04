<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'price'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function scopeHighlight($query){
        return $query->where('type', '1');
    }

    public function scopeInclude($query){
        return $query->where('type', '2');
    }

    public function scopeWarning($query){
        return $query->where('type', '3');
    }

    public function scopeActivity($query){
        return $query->where('type', '4');
    }
    
    public function scopeSafetyGear($query){
        return $query->where('type', '5');
    }

    public function scopeRefreshment($query){
        return $query->where('type', '6');
    }

    public function scopeAdditionalInfo($query){
        return $query->where('type', '7');
    }
    
    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }
}

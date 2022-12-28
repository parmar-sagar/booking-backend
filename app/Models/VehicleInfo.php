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
        'price',
        'random_id'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }
}

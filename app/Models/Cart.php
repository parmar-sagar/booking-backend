<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','vehicle_id','tour_id','qty'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

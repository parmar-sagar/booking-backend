<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id','name','image','price','qty'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id','vehicle_id','name','price','booking_date','booking_time','quantity','extra_product'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

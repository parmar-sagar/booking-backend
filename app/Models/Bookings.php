<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'booking_id','user_id','price_id','addon_id','status','payment_status','discount','sub_total','final_ammount','qty','name','number','pincode','state','city','house_no','road_name','booking_date','booking_time'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

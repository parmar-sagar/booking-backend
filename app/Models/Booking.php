<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'booking_id','user_id','status','payment_status','discount','sub_total','total','name','mobile','pincode','locality','address','state','city','house_no','landmark','date','time'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    protected $dates = ['deleted_at'];
}

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
        'random_id',
        'user_id',
        'discount',
        'sub_total',
        'extra_amount',
        'total',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'pickup_location',
        'pickup_time',
        'status',
        'payment_status',
        'payment_method'
    ];

    protected $hidden = [
        'created_at','updated_at','deleted_at'
    ];

    protected $dates = ['deleted_at'];
}

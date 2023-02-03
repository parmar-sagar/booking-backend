<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id','user_id','token','payerid','status','amount'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

}

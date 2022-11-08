<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_details extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'payment_status',
        'payment_type'
    ];
}

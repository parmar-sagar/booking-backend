<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'image',
        'type',
        'status',
        'expiry_date',
        'ammount'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

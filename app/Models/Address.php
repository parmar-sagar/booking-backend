<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_name','billing_number','billing_pincode','billing_state','billing_city','billing_house_no','billing_road_name'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

}

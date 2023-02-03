<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailOtp extends Model{

    use HasFactory;

    protected $fillable = [
        'email',
        'otp',
        'status'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

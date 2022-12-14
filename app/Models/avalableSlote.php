<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avalableSlote extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'time_slots_ids'
    ];
}

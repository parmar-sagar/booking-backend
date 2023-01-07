<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvalableSlote extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'time_slots_ids'
    ];
}

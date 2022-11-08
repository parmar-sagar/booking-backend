<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicals extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'veh_name',
        'description',
        'image',
        'features'
    ];
}

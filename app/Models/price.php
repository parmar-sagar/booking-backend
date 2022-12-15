<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'vehicle_id',
        'time',
        'amount',
        'label'

    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

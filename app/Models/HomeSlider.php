<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'sequence',
        'status',
        'link'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

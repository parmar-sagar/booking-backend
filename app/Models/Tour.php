<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'time_ids',
        'image',
        'banner_img',
        'status',
        'on_home',
        'on_home_sequence',
        'type',
        'safari_sequence',
        'location_id'
    ];
    protected $hidden = [
        'created_at','updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tour_id',
        'name',
        'short_name',
        'description',
        'time_ids',
        'includes_ids',
        'highlight_ids',
        'warning_ids',
        'banner_img',
        'image',
        'status',
        'type',
        'activities_ids'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    protected $dates = ['deleted_at'];
}

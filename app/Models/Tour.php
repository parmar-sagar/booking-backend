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
        'status'
    ];
    protected $hidden = [
        'created_at','updated_at',
    ];
}

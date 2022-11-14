<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

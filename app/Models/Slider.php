<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'image','video','link','title','status','sort'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}
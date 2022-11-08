<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicals extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tour_id','name','description','image','features'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

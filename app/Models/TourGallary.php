<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourGallary extends Model
{
    use HasFactory;

        
    protected $fillable = [
        'tour_id',
        'gallry_images'
    ];
    protected $hidden = [
        'created_at','updated_at',
    ];
}

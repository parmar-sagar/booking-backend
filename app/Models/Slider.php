<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'type','image_video','link','status','sequence'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function ScopeOrder($query){
        return $query->orderBy('sequence','ASC');
    }

    public function ScopeActive($query, $type){
        return $query->where('status', 1);
    }
}

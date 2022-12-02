<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'sequence',
        'status',
        'link',
        'image_video',
        'type',
        'random_id'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function ScopeOrder($query){
        return $query->orderBy('sequence','ASC');
    }

    public function ScopeStatus($query, $type)
    {
        return $query->where('status', $type);
    }
}

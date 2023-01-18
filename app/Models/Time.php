<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'type'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }
}

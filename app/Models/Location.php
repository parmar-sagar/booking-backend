<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','status','random_id'
        
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }
}

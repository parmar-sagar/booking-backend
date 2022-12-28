<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'random_id',
        'name',
        'code',
        'description',
        'image',
        'type',
        'status',
        'expiry_date',
        'amount'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    public function ScopeOrder($query){
        return $query->orderBy('id','DESC');
    }

    protected $dates = ['deleted_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'logo', 'title','email','mobile','address','terms_conitions','privacy_policy','refund_policy','faqs'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];
}

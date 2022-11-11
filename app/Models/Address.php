<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','mobile','alternate_mobile','pincode','locality','address','state','city','landmark','house_no','type'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

}

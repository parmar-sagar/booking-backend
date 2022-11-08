<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [ 'logo',
                            'title',
                            'email',
                            'mobile',
                            'address',
                            'terms_conitions',
                            'privacy_policy',
                            'refund_policy',
                            'faqs'
                        ];
}

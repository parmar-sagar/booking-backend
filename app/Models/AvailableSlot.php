<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSlot extends Model{

    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'time_slot_id'
    ];

    public function timeslot(){
        return $this->hasOne(TimeSlot::class,'id','time_slot_id');
    }
}

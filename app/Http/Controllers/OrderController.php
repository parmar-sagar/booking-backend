<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller{
    
    const ControllerCode = "AC_";
    public $outputData = [];

    public function index(){
        $this->outputData['bookings'] = Booking::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return view('front.pages.order.index',$this->outputData);
    }

    public function details($id){
        $this->outputData['booking'] = Booking::where('random_id',$id)->first();
        return view('front.pages.order.details',$this->outputData);
    }
}

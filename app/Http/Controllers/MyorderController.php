<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use PDF;

class MyorderController extends Controller
{
    const ControllerCode = "MB_";
    public $outputData = [];

    public function index(){

        $myId = \Auth::user()->id ;
        $myBookings = Booking::where('user_id',$myId)->get()->toArray();
        dd($myBookings);
        $this->outputData = [
            'myBookings' => $myBookings,
        ];
        
       return view('front.pages.my_account.index',$this->outputData);
    }

    public function pdf($id){
        $bookingInfo = Booking::where('random_id',$id)->first();
        $this->outputData = [
            'bookingInfo' => $bookingInfo,
        ];
        $pdf = PDF::loadView('front.pages.pdf.index',$this->outputData);
        return $pdf->download('booking.pdf');
    }

}

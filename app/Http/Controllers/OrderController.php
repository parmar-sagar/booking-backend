<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
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

    public function downloadPdf($id){
        $this->outputData['bookingInfo'] = Booking::where('random_id',$id)->first();

        $pdf = PDF::loadView('front.pages.pdf.index',$this->outputData);
        
        return $pdf->download('booking.pdf');
    }
}

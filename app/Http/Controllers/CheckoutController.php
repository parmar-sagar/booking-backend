<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller{
    
    const ControllerCode = "CK_";
    
    public $outputData = [];

    public function index(){
        $carts = \Cart::getContent();
        $total = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();
        $this->outputData = [
            'carts' => $carts,
            'subTotal' => $subTotal,
            'total' => $total
        ];
        return view('front.pages.checkout.index',$this->outputData);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooktourController extends Controller
{
    const ControllerCode = "BC_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        return view('front.pages.payment.index');
    }
}

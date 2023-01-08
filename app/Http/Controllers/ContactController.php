<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    const ControllerCode = "CC_";

    public $outputData = [];

    public function index(){
        return view('front.pages.contact_us.index');
    }
}

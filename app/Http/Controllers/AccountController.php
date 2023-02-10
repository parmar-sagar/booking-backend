<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller{

    const ControllerCode = "AC_";
    public $outputData = [];

    public function account(){
        return view('front.pages.account.index');
    }

    public function password(){
        return view('front.pages.account.password');
    }

}

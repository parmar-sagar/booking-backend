<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherPageController extends Controller{
    
    const ControllerCode = "OP_";
    public $outputData = [];

    public function refundPolicy(){
        return view('front.pages.other.refund-policy');
    }

    public function privacyPolicy(){
        return view('front.pages.other.privacy-policy');
    }

    public function termsAndConditions(){
        return view('front.pages.other.terms-conditions');
    }

    public function aboutUs(){
        return view('front.pages.other.about-us');
    }

    public function whyChooseUs(){
        return view('front.pages.other.why-choose-us');
    }

    public function contactUs(){
        return view('front.pages.other.contact-us');
    }

    public function faqs(){
        return view('front.pages.other.faqs');
    }

    public function reviews(){
        return view('front.pages.other.review');
    }
}

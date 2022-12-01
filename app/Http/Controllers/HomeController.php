<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use App\Models\Tour;
use App\Handlers\Error;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'imgVideo' => HomeSlider::select('image_video')->order()->first(),
            'tour' => Tour::status('1')->with('location')->take(6)->order()->get()
        ];

        return view('front.pages.home',$this->outputData);
    }
}

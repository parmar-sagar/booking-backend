<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
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
            'imgVideo' => HomeSlider::select('image_video')->order()->first()
        ];
        return view('front.pages.home.home',$this->outputData);
    }
}

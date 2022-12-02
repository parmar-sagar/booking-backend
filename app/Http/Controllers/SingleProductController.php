<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Vehicle;

class SingleProductController extends Controller
{
    const ControllerCode = "S_";

    function __construct(){
        $this->outputData = [];
    }

    public function index($id){
        $this->outputData = [
            'singlePrdct' => Vehicle::findOrFail($id)
        ];
        return view('front.pages.single_product.index',$this->outputData);
    }
}

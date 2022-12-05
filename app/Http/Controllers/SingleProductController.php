<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use App\Helpers\Helper;
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
       $ids = Helper::explode($this->outputData['singlePrdct']->includes_ids);
       $hids = Helper::explode($this->outputData['singlePrdct']->highlight_ids);

       $this->outputData['include'] = VehicleInfo::whereIn('id',$ids)->select('title')->get();
       $this->outputData['notInclude'] = VehicleInfo::whereIn('id',$hids)->select('title')->get();
        return view('front.pages.single_product.index',$this->outputData);
    }

}

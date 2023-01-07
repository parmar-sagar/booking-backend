<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Vehicle;
use App\Models\Tour;
use App\Models\Time;
use App\Models\Price;
use App\Models\SafariPrice;
use App\Models\AvalableSlote;
use App\Models\TimeSlote;


class SingleProductController extends Controller
{
    const ControllerCode = "S_";

    function __construct(){
        $this->outputData = [];
    }

    public function index($id){  
        $this->outputData = [
            'singlePrdct' => Vehicle::where('random_id',$id)->first(),
        ];
       $tourId = $this->outputData['singlePrdct']->tour_id;
       $this->outputData['list'] = Tour::findOrFail($tourId);
       $id = $this->outputData['singlePrdct']->id;
       $timeslotIds = AvalableSlote::where('vehicle_id',$id)->select('time_slots_ids')->get()->toArray();

    $tsIds = array();
    foreach($timeslotIds as $key=>$val){
        $tsIds[$key]['sids'] = $val['time_slots_ids']; 
        $this->outputData['avTime'][] = TimeSlote::where('id',$tsIds[$key]['sids'])->select('text')->first()->toArray();
            
    }
       $iIds = Helper::explode($this->outputData['singlePrdct']->includes_ids);
       $hIds = Helper::explode($this->outputData['singlePrdct']->highlight_ids);
       $rIds = Helper::explode($this->outputData['list']->refreshments_ids);
       $sIds = Helper::explode($this->outputData['list']->safety_gear_ids);	
       $tIds = Helper::explode($this->outputData['list']->time_ids);
       $wIds = Helper::explode($this->outputData['singlePrdct']->warning_ids);
       $adIds = Helper::explode($this->outputData['singlePrdct']->additional_info_ids);
       $exAIds = Helper::explode($this->outputData['singlePrdct']->activities_ids);
       
        
       $this->outputData['dealsDiscount'] = $this->outputData['singlePrdct']->discount;        
       $this->outputData['tourType'] = $this->outputData['list']->type;
       $this->outputData['price'] = Price::where('vehicle_id',$id)->get();
       $this->outputData['safariPrice'] = SafariPrice::where('vehicle_id',$id)->select('amount')->first();
       $this->outputData['include'] = VehicleInfo::whereIn('id',$iIds)->select('title')->get();
       $this->outputData['notInclude'] = VehicleInfo::whereIn('id',$hIds)->select('title')->get();
       $this->outputData['saftyGear'] = VehicleInfo::whereIn('id',$rIds)->select('title')->get();
       $this->outputData['refreshment'] = VehicleInfo::whereIn('id',$sIds)->select('title')->get();
       $this->outputData['mustKnow'] = VehicleInfo::whereIn('id',$wIds)->select('title')->get();
       $this->outputData['addInfo'] = VehicleInfo::whereIn('id',$adIds)->select('title')->get();
       $this->outputData['extraActivity'] = VehicleInfo::whereIn('id',$exAIds)->select('title','price','random_id')->get();
       $this->outputData['time'] = Time::whereIn('id',$tIds)->select('time','time_type')->get();
    
        return view('front.pages.single_product.index',$this->outputData);
    }

}

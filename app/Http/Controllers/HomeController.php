<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use App\Handlers\Error;
use App\Models\Vehicle;
use App\Models\Discount;
use App\Models\Tour;
use App\Models\User;

class HomeController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'imgVideo' => HomeSlider::status('1')->select('image_video','type')->order()->get(),
            'discount' => Discount::order()->get(),
            'deal' => Vehicle::where('is_deals','1')->sequence()->status('1')->get()
        ];

        $tour = Tour::status('1')->with('location')->take(3)->Sequence()->get();
        
        $res= array();
        foreach($tour as $key => $value){
              $res[$key]['tour_id'] = $value->id;
              $res[$key]['tour_name'] = $value->name;
              $res[$key]['min_age'] = $value->min_age;
              $res[$key]['tour_guide'] = $value->tour_guide;
              $res[$key]['convoy_leader'] = $value->convoy_leader;
              $res[$key]['pickup_and_drop'] = $value->pickup_and_drop;
              $res[$key]['location'] = $value['location']->name;
              $res[$key]['veh'] = Vehicle::where('tour_id',$value->id)->status('1')->order()->get()->toArray();
        }
        $this->outputData['tourVehicles'] = $res;
        return view('front.pages.home',$this->outputData);
    }

    public function refundPolicy(){
        return view('front.pages.refund_policy.index');
    }
    public function privacyPolicy(){
        return view('front.pages.privacy_policy.index');
    }
    public function termsAndConditions(){
        return view('front.pages.terms_conditions.index');
    }
    public function aboutUs(){
        return view('front.pages.about_us.index');
    }
    public function deals(){
        $this->outputData = [
            'deal' => Vehicle::where('is_deals','1')->sequence()->status('1')->get()
        ];
        return view('front.pages.deals.index',$this->outputData);
    }
    public function myAccount(){
       return view('front.pages.my_account.index');
    }
    public function faqs(){
       return view('front.pages.faqs.index');
    }
    public function updateProfile(Request $request){

        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:users',
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:users,email,'.$Input['id'],
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                User::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Profile Updated successfully."]);
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
      
    }

    public function updatePassword(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:users',
                    'password' => 'required|string|max:20|min:6',
                    'confrim_password' => 'required_with:password|same:password|min:6'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['password'] = Hash::make($validated['password']);

                User::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Profile Password Updated successfully."]);
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }
}

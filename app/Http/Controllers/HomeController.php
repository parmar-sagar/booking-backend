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
use App\Models\Slider;
use App\Models\Tour;
use App\Models\User;
use App\Models\TourGallary;

class HomeController extends Controller{

    const ControllerCode = "H_";
    public $outputData = [];

    public function index(){
        $sliders = Slider::select('image_video','type')->active()->sequence()->get();
        $discounts = Discount::order()->get();
        $deals = Vehicle::deals()->sequence()->active()->get();

        $tours = Tour::active()->take(3)->Sequence()->get();

        $this->outputData = [
            'sliders' => $sliders,
            'discounts' => $discounts,
            'deals' => $deals,
            'tours' => $tours
        ];

        return view('front.pages.home',$this->outputData);
    }

    
    public function myAccount(){
       return view('front.pages.my_account.index');
    }

    public function checkout(){
        return view('front.pages.checkout_page.index');
    }

    public function gallary($id){
        $tourId = Vehicle::where('random_id',$id)->select('tour_id')->first()->toArray();
        $gallaryImg = TourGallary::where('tour_id',$tourId)->select('gallry_images')->get()->toArray();
        $this->outputData['singleImglry'] = TourGallary::where('tour_id',$tourId)->select('gallry_images')->take(1)->first();

        $gallary = array();
        foreach($gallaryImg as $key => $images){
            $this->outputData['gallary'][] = $images['gallry_images'];
        }
        // dd($this->outputData['gallary']);
        return view('front.pages.tour_gallary.index',$this->outputData);
    }

    public function updateProfile(Request $request){

        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:users',
                    'first_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'last_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
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

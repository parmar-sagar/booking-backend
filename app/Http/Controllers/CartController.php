<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Vehicle;
use App\Models\Coupon;

class CartController extends Controller
{
    const ControllerCode = "CT_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        return view('front.pages.cart.index');
    }

    public function add(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'bookingDate' => 'required',
            'time' => 'required'
        ]);
        if($validator->fails()){
            throw new \Exception($validator->errors()->first());
        }
        $validated = $validator->validated();

        $extraActivity = array();
        $name = array();
        $prices = array();
        $additional = array();
        
        if(isset($input['extra_price'])){
        foreach($input['extra_price'] as $key=> $value){
            
           $extraActivity[] = VehicleInfo::where('random_id',$value)->select('title','price')->first()->toArray();
           $name[] = $extraActivity[$key]['title'];
           $prices[] = $extraActivity[$key]['price'];
           
        }
        $additional = array_combine($name,$prices);
       }
  
        // dd($additional);   
        $sum = 0;
        foreach($additional as $key=>$value)
        {
           $sum+= $value;
        }
        $subtotal = $sum+$input['totalPrice'];

        if(isset($input['time'])){
          $time = $input['time'];
        }
        $Product = Vehicle::where('random_id',$input['id'])->first();
        $snowflake = new \Godruoyi\Snowflake\Snowflake;
        $rowId = $snowflake->id();
        // add the product to cart
            \Cart::add(array(
                'id' => $rowId,
                'name' => $Product->name,
                'price' => $input['totalPrice'],
                'quantity' => $input['qnty'],
                'attributes' => array( 
                    'bookingdate' => $validated['bookingDate'],
                    'subtotal' => $subtotal,
                    'extra' => $additional,
                    'total' => $subtotal,
                    'time' =>$time
                )
            ));  
            return response()->json(['success' => "Tour has been added to your cart"]); 
            
    }
    // public function update($id){
    //     // update the item on cart
    //     \Cart::update($id,[
    //         'quantity' => 1,
    //     ]);
        
    // }

    public function delete($id){
        // delete an item on cart
        \Cart::remove($id);
        return response()->json(['success' => "Cart Item Remove"]);
    }

    public function applyCoupon(Request $request){
        $input = $request->all();
        if (Coupon::where('code', $input['coupon'])->exists()) {
            $couponData = Coupon::where('code', $input['coupon'])->first();
            return response()->json(['success' => "Coupon Appled Succesfully",'data' =>$couponData]);
         }else{
            return response()->json(['error' => "Please Enter Valid Coupon"]);
         }
    }

}

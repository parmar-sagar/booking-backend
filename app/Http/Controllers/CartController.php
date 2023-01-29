<?php

namespace App\Http\Controllers;

use App\Handlers\Error;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Vehicle;
use App\Models\Coupon;

class CartController extends Controller{

    const ControllerCode = "CT_";
    
    public $outputData = [];

    public function index(){
        $carts = \Cart::getContent();
        $total = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();
        $this->outputData = [
            'carts' => $carts,
            'subTotal' => $subTotal,
            'total' => $total
        ];
        return view('front.pages.cart.index',$this->outputData);
    }

    public function add(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'booking_date' => 'required',
                'time' => 'required'
            ]);

            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }

            $validated = $validator->validated();

            $additional = [];
            $extraAmount = 0;
            if(isset($request->extra_price)){
                foreach($request->extra_price as $key => $value){
                    $extraActivity = VehicleInfo::select('title','price')->where('id',$value)->first();
                    $additional[] = [
                        'id' => $extraActivity->id,
                        'title' => $extraActivity->title,
                        'price' => $extraActivity->price
                    ];
                    
                    $extraAmount += $extraActivity->price;
                }
            }
              
            $product = Vehicle::where('random_id',$request->id)->first();
            
            \Cart::remove($request->id);

            // add the p to cart
            \Cart::add(array(
                'id' => $request->id,
                'name' => $product->name,
                'price' => $request->total_price,
                'quantity' => $request->quantity,
                'attributes' => [
                    'booking_date' => $request->booking_date,
                    'time' => $request->time,
                    'extra_amount' => $extraAmount,
                    'extra_product' => $additional,
                ]
            ));  

            return response()->json([
                'success' => "Tour has been added to your cart"
            ]); 

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode);
        }      
    }
    
    public function remove($id){
        try{
            \Cart::remove($id);
            return response()->json(['success' => "Cart Item Removed"]);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode);
        }
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

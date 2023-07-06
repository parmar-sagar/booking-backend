<?php

namespace App\Http\Controllers;

use App\Handlers\Error;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Vehicle;
use App\Models\Coupon;
use App\Models\Discount;

class CartController extends Controller{

    const ControllerCode = "CT_";
    
    public $outputData = [];

    public function index(){
        $groupDiscount=Discount::all();
        $carts = \Cart::getContent();
        $total = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();
        $coupon = session()->get('coupon');
        $this->outputData = [
            'carts' => $carts,
            'subTotal' => $subTotal,
            'total' => $total,
            'code' => (($coupon['code'])) ?? '',
            'discount' => (($coupon['discount'])) ?? 0.00,
            'groupDiscount' => $groupDiscount
        ];
        // dd($this->outputData['subTotal']);
        return view('front.pages.cart.index',$this->outputData);
    }

    public function add(Request $request){
        try{
            if($request->fixed_voucher_status == 1){
                $validator = Validator::make($request->all(), [
                    'booking_date' => 'required',
                    'time' => 'required'
                ]);
                
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
            
            }else{
                $request['booking_date'] = 'NA';
                $request['time'] = 'NA';
            }
               

            $additional = [];
            $extraAmount = 0;
            if(isset($request->extra_price)){
                foreach($request->extraQuntity as $key => $extras){

                    $extra_quntity[$key] = $extras;
              
                }
                foreach($request->extra_price as $key => $value){
                    $extraActivity=array();
                    $extraActivity = VehicleInfo::select('title','price')->where('id',$value)->first();
                    $additional[] = [
                        'id' => $extraActivity->id,
                        'title' => $extraActivity->title,
                        'price' => $extraActivity->price,
                        'extra_quntity' => $extra_quntity[$key]
                   ];
                   $extraAmount += $extraActivity->price*$extra_quntity[$key];
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
                    'image' => $product->image,
                    'vehicle_id' => $product->id,
                    'booking_date' => $request['booking_date'],
                    'time' => $request['time'],
                    'extra_amount' => $extraAmount,
                    'extra_product' => $additional,
                    'voucher_status' => $product->tour->voucher_status,
                    'tour_name' => $product->tour->name,
                    'ExtraDiscount' => $request->without_pickup,
                    'supplier_id' =>  $request->supplier_id,
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

        try{
            $couponData = Coupon::where('code', $request->coupon)->first();
            $discount = 0.00;
            $total = 0.00;

            if ($couponData) {
                
                if($couponData->type == 1){
                    if($couponData->amount < $request->total){
                        $discount = $couponData->amount;
                    }else{
                        $response['error'] = "You need to book greater than {$couponData->amount} AED";
                    }
                }else{
                    $discount = ($request->total * $couponData->amount) / 100;
                }

                if($discount > 0){
                    session()->put('coupon',[
                        'code' => $request->coupon,
                        'discount' => $discount
                    ]);
                }else{
                    session()->forget('coupon');
                }
                $total = $request->total - $discount;
                
                $response['success'] = "Coupon Appled Succesfully";
            }else{
                $response['error'] = "Please Enter Valid Coupon";
            }
            $response['data'] = [
                'total' => $total,
                'discount' => $discount
            ];
            return response()->json($response);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode);
        }
    }

}

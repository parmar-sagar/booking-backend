<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\User;
use App\Mail\RegisterUser;
use App\Models\Booking;
use App\Models\BookingDetail;
use Mail;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    const ControllerCode = "PY_";
    public $outputData = [];

    public function index(Request $request){

        $carts = \Cart::getContent();
        $total = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();

        $bookingData = [
            'random_id' => (new Snowflake())->id(),
            'user_id' => Auth::user()->id,
            'sub_total' => $subTotal,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'pickup_location' => $request->pickup_location,
            'pickup_time' => $request->pickup_time
        ];

        $booking = Booking::create($bookingData);

        $extraAmount = 0;
        foreach($carts as $key => $value){
            $extraAmount += $value->attributes->extra_amount; 

            BookingDetail::create([
                'booking_id' => $booking->id,
                'vehicle_id' => $value->attributes->vehicle_id,
                'name' => $value->name,
                'price' => $value->price,
                'booking_date' => date('Y-m-d',strtotime($value->attributes->booking_date)),
                'booking_time' => $value->attributes->time,
                'quantity' => $value->quantity,
                'extra_product' => json_encode($value->extra_product)
            ]);
        }

        $booking->update([
            'extra_amount' => $extraAmount,
            'total' => $total + $extraAmount
        ]);

        $product = [];
        // $product['items'] = [
        //     [
        //         'name' => 'Nike Joyride 2',
        //         'price' => 5,
        //         'desc'  => 'Running shoes for Men',
        //         'qty' => 2
        //     ]
        // ];
        $product['items'] = [];
        $product['invoice_id'] = $booking->random_id;
        $product['invoice_description'] = "Booking #{$booking->random_id} booked";
        $product['return_url'] = url('payment/success');
        $product['cancel_url'] = url('payment/cancel');
        $product['total'] = $booking->total;
  
        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
  
        return redirect($res['paypal_link']);
    }

    public function payment(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                
                // Validation section
                $validator = Validator::make($Input, [
                    'first_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'last_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:users',
                    'number' => 'required|string|max:12',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                $snowflake = new \Godruoyi\Snowflake\Snowflake;
                $validated['random_id'] = $snowflake->id();

                $pass1 = substr($validated['first_name'], 0, 3);
                $pass2 = substr($validated['last_name'], 0, 2);
                $pass3 = rand(100,1000);
                $password = "Admin@123";
                   
                $validated['password'] = Hash::make($password);
                // $data = ['name' => 'sam', 'data'=>'hello'];
                // $user['to'] = 'sandyjamwal292@gmail.com';
                // $mail =Mail::send('mail',$data,function($messages) use($user){
                //     $messages->to($user['to']);
                //     $messages->subject('Hello');

                // });
                // if($mail){
                //     return response()->json(['success' => "Mail send successfully."]);
                // }
                User::create($validated);
    
                // return response()->json(['success' => "User Created successfully."]);
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }

    public function success(Request $request){
        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);
        dd($response);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully. You can create success page here.');
        }
  
        dd('Something is wrong.');
    }

    public function cancel(Request $request){
        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);
        dd($response);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successfully. You can create success page here.');
        }
  
        dd('Something is wrong.');
    }
}

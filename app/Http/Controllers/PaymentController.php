<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\BookingTransaction;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use Stripe\StripeClient;
use App\Models\Vehicle;
use App\Models\Tour;
use PDF;

class PaymentController extends Controller
{
    const ControllerCode = "PY_";
    public $outputData = [];
    public function index(Request $request){
        return $request->all();
        die;
        $carts = \Cart::getContent();
        //return $carts;
        $total = \Cart::getTotal();
        $subTotal = \Cart::getSubTotal();

        $coupon = session()->get('coupon');
        foreach($carts as $key => $value){
            $vehcileid = $value->attributes->vehicle_id;
            // print_r($vehcileid );
            
        }
        //  die;
        $tourId = Vehicle::where('id',$vehcileid)->select('tour_id')->first();
        //  echo "<pre>";
        //  print_r($tourId);
        //  die;
        $voucher_status = Tour::where('id',$tourId->id)->select('voucher_status')->first();
        // return $tourId;
        // die;
            $voucher = ""; 
            $securityCode = ""; 
            $isVoucher = ""; 
            $expiry_date = "";
    
        if($voucher_status == 1){
                $securityCode = $tourId->tour->security_code;
                $expiry_date = $tourId->tour->voucher_expiry_date;
                $voucher = $tourId->tour->voucher;
                $tour_name = $tourId->tour->name;
                $isVoucher = 1;
                $bookingData = [
                    'random_id' => (new Snowflake())->id(),
                    'user_id' => Auth::user()->id,
                    'sub_total' => $subTotal,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'pickup_location' => $request->pickup_location,
                    'no_of_travelers' => $request->no_of_travelers,
                    'payment_method' => $request->payment_method,
                    'tour_name' => json_encode($request->tour_name),
                    'tour_qty' => json_encode($request->tour_qty),
                    'coupon' => (($coupon['code'])) ?? '',
                    'security_code' => $securityCode,
                    'is_voucher' => $isVoucher,
                    'voucher_expiry_date' => $expiry_date,
                    'voucher' => $voucher,
                ];
        }else{
            $bookingData = [
                'random_id' => (new Snowflake())->id(),
                'user_id' => Auth::user()->id,
                'sub_total' => $subTotal,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'pickup_location' => $request->pickup_location,
                'no_of_travelers' => $request->no_of_travelers,
                'payment_method' => $request->payment_method,
                'coupon' => (($coupon['code'])) ?? '',
            ];

        }
    
        $booking = Booking::create($bookingData);
        //return $booking;
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
                'extra_product' => json_encode($value->attributes->extra_product)
            ]);
        }

        $discount = (($coupon['discount'])) ?? 0.00;

        $booking->update([
            'discount' => $discount,
            'extra_amount' => $extraAmount,
            'total' => $total + $extraAmount - $discount
        ]);

        \Cart::clear();

        if($request->payment_method == 'Paypal'){
            $product = [];
            $product['items'] = [];
            $product['invoice_id'] = $booking->random_id;
            $product['invoice_description'] = "Booking #{$booking->random_id} booked";
            $product['return_url'] = url('payment/success');
            $product['cancel_url'] = url('payment/failure');
            $product['total'] = $booking->total;
    
            $paypalModule = new ExpressCheckout;
    
            $res = $paypalModule->setExpressCheckout($product);
            $res = $paypalModule->setExpressCheckout($product, true);
    
            return redirect($res['paypal_link']);
        }elseif($request->payment_method == 'Stripe'){
            return redirect('payment/stripe/'.$booking->random_id);
        }else{
            return redirect('payment/thank-you/'.$booking->random_id);
        }
    }

    public function success(Request $request){
        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);

        $booking = Booking::where('random_id',$response['INVNUM'])->first();

        $transaction = new BookingTransaction();
        $transaction->booking_id = $booking->id;
        $transaction->user_id = Auth::user()->id;
        $transaction->token = $request->token;
        $transaction->payerid = $response['PAYERID'];
        $transaction->amount = $response['AMT'];
        $transaction->status = (isset($response['ACK'])) ? $response['ACK'] : 'Failure';
        $transaction->save();
        
        $booking->update([
            'status' => 'In Progress',
            'payment_status' => 'Paid'
        ]);

        return redirect('payment/thank-you/'.$booking->random_id);
    }

    public function failure(Request $request){
        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);

        $booking = Booking::where('random_id',$response['INVNUM'])->first();

        $transaction = new BookingTransaction();
        $transaction->booking_id = $booking->id;
        $transaction->user_id = Auth::user()->id;
        $transaction->token = $request->token;
        $transaction->payerid = $response['PAYERID'];
        $transaction->amount = $response['AMT'];
        $transaction->status = 'Failure';
        $transaction->save();

        $booking->update([
            'payment_status' => 'Unpaid'
        ]);
        
        return redirect('payment/thank-you/'.$booking->random_id);
    }

    public function thankYou($randomId){
        $this->outputData['booking'] = Booking::where('random_id',$randomId)->first();

        return view('front.pages.payment.thank-you',$this->outputData);
    }

    public function stripe($randomId){
        $this->outputData['booking'] = Booking::where('random_id',$randomId)->first();
       

        return view('front.pages.payment.stripe',$this->outputData);
    }

    public function stripePayment(Request $request){
        
        $stripe = new StripeClient(config('stripe.api_keys.secret_key'));
        
        $token = $stripe->tokens->create([
            'card' => [
                'number' => $request['cardNumber'],
                'exp_month' => $request['month'],
                'exp_year' => $request['year'],
                'cvc' => $request['cvv']
            ]
        ]);

        $booking = Booking::where('random_id',$request['random_id'])->first();

        $transaction = new BookingTransaction();
        $transaction->booking_id = $booking->id;
        $transaction->user_id = Auth::user()->id;
        $transaction->amount = $request['amount'];
        $transaction->token = $token['id'];
        
        if (!empty($token['error'])) {
            $transaction->status = 'Failure';
        }
        if (empty($token['id'])) {
            $transaction->status = 'Failure';
        }
        
        $charge = '';

        if($transaction->status != "Failure"){
            $charge = $stripe->charges->create([
                'amount' => round($request['amount']),
                'currency' => 'USD',
                'source' => $token['id'],
                'description' => 'My first payment'
            ]);

            $transaction->payerid = $charge['id'];
        }

        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $transaction->status = $charge['status'];
            $paymentStatus = 'Paid';
        } else {
            $transaction->status = 'Failure';
            $paymentStatus = 'Unpaid';
        }

        $transaction->save();

        $booking->update([
            'status' => 'In Progress',
            'payment_status' => $paymentStatus
        ]);
        
        return redirect('payment/thank-you/'.$booking->random_id);
    }
}

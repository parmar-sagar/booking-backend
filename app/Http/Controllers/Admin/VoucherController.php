<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use DataTables;

class VoucherController extends Controller
{
    const ControllerCode = "VOU_";

    public $outputData = [];

    public function index(){
        $totalVbooking = Booking::where('is_voucher',1)->count();
        $redeemedVoucher = Booking::where('is_voucher',1)->where('is_redeem',2)->count();
        $unRedeemVoucher = Booking::where('is_voucher',1)->where('is_redeem',1)->count();
        $todayRedeemed = Booking::where('is_voucher',1)->where('is_redeem',2)->whereDay('redeem_date', now()->day)->count();
        $this->outputData = [
            'pageName' => 'Voucher Booking',
            'totalVbooking' => $totalVbooking,
            'redeemedVoucher' => $redeemedVoucher,
            'unRedeemVoucher' => $unRedeemVoucher,
            'todayRedeemed' => $todayRedeemed,
            'dataTables' => url('admin/voucher-bookings/datatable'),
        ];

        return view('admin.pages.voucher_booking.index',$this->outputData);
    }

    
    public function datatable(Request $request){

        try {
            if ($request->ajax()) {
          
                $datas = Booking::where('is_voucher',1)->order()->get();
                if (!empty($request->action)) {
                    $datas = $datas->where('is_redeem',$request->action);
                }
                if(!empty($request->startDate)){
                    $datas = $datas->whereBetween('redeem_date',array($request->startDate,$request->endDate));
                }

                return DataTables::of($datas)
                                    ->addColumn('redeem_date',function(Booking $data){
                                        return date('d M Y H:i:s',strtotime($data->redeem_date));
                                    })
                                    ->addColumn('is_permission',function(Booking $data){
                                        return isAdmin();
                                    })->toJson();
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function redeemCode(Request $request){

        $bookingDetails = Booking::where('id',$request->id)->order()->first();
        $this->outputData = [
            'bookingDetails' => $bookingDetails,
            'action' => url('admin/voucher-bookings/redeem-voucher'),
        ];
            return view('admin.pages.voucher_booking.model',$this->outputData);
    }

    public function redeemSecurityCode(Request $request){
       
                $check = Booking::where('id',$request->id)->select('is_redeem','security_code','voucher_expiry_date')->first();
                $expDate = Carbon::createFromFormat('Y-m-d H:i:s', $check->voucher_expiry_date)->isPast();

                if($expDate){
                    return response()->json([
                        'error' => "'Voucher Expire"
                    ]);
                }
           
                elseif(($check->security_code === $request->security_code) && ($check->is_redeem === 2)){
                    return response()->json([
                        'error' => "Voucher Already Redeem"
                    ]);
                }elseif(($check->security_code === $request->security_code) && ($check->is_redeem === 1)){

                    Booking::find($request->id)->update(['is_redeem' => 2, 'redeem_date' => Carbon::now(),]);
                    return response()->json(['success' => "Voucher Redeem Succesfully."]);

                }else{
                    return response()->json([
                        'error' => "Invalid Code"
                    ]);
                }                                  
    }

    public function scanQr($code,$id){

        $check = Booking::where('random_id',$id)->select('is_redeem','security_code','voucher_expiry_date')->first();
        $expDate = Carbon::createFromFormat('Y-m-d H:i:s', $check->voucher_expiry_date)->isPast();

        if($expDate){
            \Session::flash('error','Voucher Expire.');

            return redirect(url('admin/voucher-bookings'));
        }
        elseif(($check->security_code === $code) && ($check->is_redeem === 2)){

            \Session::flash('error','Voucher Already Redeem.');

            return redirect(url('admin/voucher-bookings'));

        }elseif(($check->security_code === $code) && ($check->is_redeem === 1)){

            Booking::where('random_id',$id)->update(['is_redeem' => 2, 'redeem_date' => Carbon::now(),]);
            \Session::flash('success','Voucher Redeem Succesfully.');
            
            return redirect(url('admin/voucher-bookings'));

        }else{
            \Session::flash('error','Invalied Qrcode.');
            
            return redirect(url('admin/voucher-bookings'));
        }   

    }
}

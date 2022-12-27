<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Coupon;
use DataTables;

class CouponController extends Controller
{
    const ControllerCode = "C_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Coupon',
            'dataTables' => url('admin/coupons/datatable'),
            'delete' => url('admin/coupons/delete'),
            'create' => url('admin/coupons/create'),
            'edit' => url('admin/coupons/edit')
        ];
        
        return view('admin.pages.coupon.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Coupon::order()->get();
                $datas = $datas->map(function($query){
                $expDate = Helper::dateformateFromdb($query->expiry_date);
                    return [
                        'id' => $query->id,
                        'name' =>$query->name,
                        'code'=>$query->code,
                        'expiryDate'=>$expDate,
                        'status'=>$query->status
                    ];
                });
                return DataTables::of($datas)->toJson();;
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function create(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'name' => 'required|regex:/^[\pL\s\-\/\_]+$/u|max:100|unique:coupons',
                    'description' => 'required|string',
                    'code' => 'required|min:5|max:50',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'type' => 'required|in:0,1',
                    'expiry_date' => 'required',
                    'ammount' => 'required|numeric',
                    'status' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                if ($request->file('image')) {
                    $path = 'coupon';
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }

                $validated['expiry_date'] = Helper::dateformateFrominput($validated['expiry_date']);

                $snowflake = new \Godruoyi\Snowflake\Snowflake;
                $validated['random_id'] = $snowflake->id();
                 
                Coupon::create($validated);
    
                return response()->json(['success' => "Coupon Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Coupon',
                'action' => url('admin/coupons/store')
            ];
            return view('admin.pages.coupon.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
    
    public function edit(Request $request,$id){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:coupons',
                    'name' => 'required|regex:/^[\pL\s\-\/\_]+$/u|max:100|',
                    'description' => 'required|string',
                    'code' => 'required|min:5|max:50',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'type' => 'required|in:0,1',
                    'expiry_date' => 'required',
                    'ammount' => 'required|numeric',
                    'status' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                if ($request->file('image')) {
                    $path = 'coupon';
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }

                $validated['expiry_date'] = Helper::dateformateFrominput($validated['expiry_date']);
                
                Coupon::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Coupon Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Coupon',
                'action' => url('admin/coupons/update/'.$id),
                'objData' => Coupon::findOrFail($id)
            ];

            $this->outputData['selectDate'] = Helper::dateformateFromdb($this->outputData['objData']->expiry_date);

            return view('admin.pages.coupon.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = Coupon::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

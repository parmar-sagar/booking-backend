<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Handlers\Error;
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
            'dataTables' => url('admin/coupon/datatable'),
            'delete' => url('admin/coupon/delete'),
            'create' => url('admin/coupon/create'),
            'edit' => url('admin/coupon/edit')
        ];
        
        return view('admin.pages.coupon.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Coupon::orderBy('id','DESC')->get();
    
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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100|unique:coupons',
                    'description' => 'required|string',
                    'code' => 'required|min:5|max:15',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'type' => 'required|',
                    'expiry_date' => 'required',
                    'ammount' => 'required|numeric|min:2',
                    'status' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['image'] = $request->file('image')->store('uploads','public');
                $getDate = $validated['expiry_date'];
                $Date=strtotime($getDate);
                $validated['expiry_date'] = date('Y-m-d', $Date);
                
                Coupon::create($validated);
    
                return response()->json(['success' => "Coupon Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Coupon',
                'action' => url('admin/coupon/store')
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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100|',
                    'description' => 'required|string',
                    'code' => 'required|min:5|max:15',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'type' => 'required',
                    'expiry_date' => 'required',
                    'ammount' => 'required|numeric|min:2',
                    'status' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();
                if(isset($validated['image']) && $validated['image']){
                $validated['image'] = $request->file('image')->store('uploads','public');
                }
                $getDate = $validated['expiry_date'];
                $Date=strtotime($getDate);
                $validated['expiry_date'] = date('Y-m-d', $Date);
                
                Coupon::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Coupon Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Coupon',
                'action' => url('admin/coupon/update/'.$id),
                'objData' => Coupon::findOrFail($id)
            ];
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

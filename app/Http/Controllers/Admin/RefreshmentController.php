<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use DataTables;

class RefreshmentController extends Controller
{
    const ControllerCode = "RF_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Refreshment',
            'dataTables' => url('admin/refreshments/datatable'),
            'delete' => url('admin/refreshments/delete'),
            'create' => url('admin/refreshments/create'),
            'edit' => url('admin/refreshments/edit')
        ];
        
        return view('admin.pages.refreshment.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::type(6)->order()->get();
    
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
                    'title' => 'required|string|unique:vehicle_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 6;
                $snowflake = new \Godruoyi\Snowflake\Snowflake;

                $validated['random_id'] = $snowflake->id();
                
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "refreshments Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Refreshment',
                'action' => url('admin/refreshments/store'),
            ];
            return view('admin.pages.safety_gear.create',$this->outputData);

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
                    'id' => 'required|exists:vehicle_infos',
                    'title' => 'required|string|unique:vehicle_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 6;
                
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "refreshments Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit refreshments',
                'action' => url('admin/refreshments/update/'.$id),
                'objData' => VehicleInfo::findOrFail($id),
            ];
            return view('admin.pages.refreshment.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = VehicleInfo::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

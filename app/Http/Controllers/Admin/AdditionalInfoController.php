<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use DataTables;

class AdditionalInfoController extends Controller
{
    const ControllerCode = "AI_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Additional Info',
            'dataTables' => url('admin/additional-info/datatable'),
            'delete' => url('admin/additional-info/delete'),
            'create' => url('admin/additional-info/create'),
            'edit' => url('admin/additional-info/edit')
        ];
        
        return view('admin.pages.additional_info.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::where('type',7)->orderBy('id','DESC')->get();
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
                $validated['type'] = 7;
                $snowflake = new \Godruoyi\Snowflake\Snowflake;
  
                $validated['random_id'] = $snowflake->id();
                
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Additional Info Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Additional Info',
                'action' => url('admin/additional-info/store'),
            ];
            return view('admin.pages.additional_info.create',$this->outputData);

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
                $validated['type'] = 7;
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Additional Info Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Additional Info',
                'action' => url('admin/additional-info/update/'.$id),
                'objData' => VehicleInfo::findOrFail($id),
            ];
            return view('admin.pages.additional_info.create',$this->outputData);

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

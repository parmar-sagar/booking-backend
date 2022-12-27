<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\VehicleInfo;
use DataTables;

class ActivityController extends Controller
{
    const ControllerCode = "A_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Activities',
            'dataTables' => url('admin/activities/datatable'),
            'delete' => url('admin/activities/delete'),
            'create' => url('admin/activities/create'),
            'edit' => url('admin/activities/edit')
        ];
        
        return view('admin.pages.activity.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::where('type',4)->orderBy('id','DESC')->get();
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
                    'title' => 'required|regex:/^[\pL\s\-\/\_]+$/u|unique:vehicle_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 4;
                $snowflake = new \Godruoyi\Snowflake\Snowflake;
  
                $validated['random_id'] = $snowflake->id();
                
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Activities Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Activities',
                'action' => url('admin/activities/store'),
            ];
            return view('admin.pages.activity.create',$this->outputData);

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
                    'title' => 'required|regex:/^[\pL\s\-\/\_]+$/u|unique:vehicle_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 4;
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Activities Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Activities',
                'action' => url('admin/activities/update/'.$id),
                'objData' => VehicleInfo::findOrFail($id),
            ];
            return view('admin.pages.activity.create',$this->outputData);

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

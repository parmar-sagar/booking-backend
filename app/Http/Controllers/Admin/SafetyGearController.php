<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use DataTables;

class SafetyGearController extends Controller
{
    const ControllerCode = "SG_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Safety Gear',
            'dataTables' => url('admin/vehicles/safety-gears/datatable'),
            'delete' => url('admin/vehicles/safety-gears/delete'),
            'create' => url('admin/vehicles/safety-gears/create'),
            'edit' => url('admin/vehicles/safety-gears/edit')
        ];
        
        return view('admin.pages.safety_gear.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::safetyGear()->order()->get();
    
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
                    'title' => 'required|string|min:3|unique:vehicle_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 5;
                
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Safety Gears Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Safety Gear',
                'action' => url('admin/vehicles/safety-gears/store'),
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
                    'title' => 'required|string|min:3|unique:vehicle_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Safety Gears Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Safety Gears',
                'action' => url('admin/vehicles/safety-gears/update/'.$id),
                'objData' => VehicleInfo::findOrFail($id),
            ];
            return view('admin.pages.safety_gear.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            VehicleInfo::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

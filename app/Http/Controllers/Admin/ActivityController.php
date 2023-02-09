<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\VehicleInfo;
use DataTables;

class ActivityController extends Controller
{
    const ControllerCode = "A_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Activities',
            'dataTables' => url('admin/vehicles/activities/datatable'),
            'delete' => url('admin/vehicles/activities/delete'),
            'create' => url('admin/vehicles/activities/create'),
            'edit' => url('admin/vehicles/activities/edit')
        ];
        
        return view('admin.pages.activity.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::activity()->order()->get();
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
                    'price' => 'required|numeric',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 4;
                
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Activity Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Activities',
                'action' => url('admin/vehicles/activities/store'),
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
                    'title' => 'required|string|unique:vehicle_infos,title,'.$id,
                    'price' => 'required|numeric',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
              
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Activity Updated successfully."]);
            }

            $objData = VehicleInfo::findOrFail($id);

            $this->outputData = [
                'pageName' => 'Edit Activity',
                'action' => url('admin/vehicles/activities/update/'.$id),
                'objData' => $objData,
            ];
            return view('admin.pages.activity.create',$this->outputData);

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

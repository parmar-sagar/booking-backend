<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use DataTables;

class WarningController extends Controller
{
    const ControllerCode = "W_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Warnings',
            'dataTables' => url('admin/vehicles/warnings/datatable'),
            'delete' => url('admin/vehicles/warnings/delete'),
            'create' => url('admin/vehicles/warnings/create'),
            'edit' => url('admin/vehicles/warnings/edit')
        ];
        
        return view('admin.pages.warning.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::warning()->order()->get();
    
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
                $validated['type'] = 3;
                
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Warnings Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Warnings',
                'action' => url('admin/vehicles/warnings/store'),
            ];
            return view('admin.pages.warning.create',$this->outputData);

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
                
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Warnings Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Warnings',
                'action' => url('admin/vehicles/warnings/update/'.$id),
                'objData' => VehicleInfo::findOrFail($id),
            ];
            return view('admin.pages.include.create',$this->outputData);

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

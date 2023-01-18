<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use DataTables;

class AdditionalInfoController extends Controller
{
    const ControllerCode = "AI_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Additional Infos',
            'dataTables' => url('admin/vehicles/additional-info/datatable'),
            'delete' => url('admin/vehicles/additional-info/delete'),
            'create' => url('admin/vehicles/additional-info/create'),
            'edit' => url('admin/vehicles/additional-info/edit')
        ];
        
        return view('admin.pages.additional_info.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::additionalInfo()->order()->get();
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
  
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Additional Info Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Additional Info',
                'action' => url('admin/vehicles/additional-info/store'),
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

                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Additional Info Updated successfully."]);
            }

            $objData = VehicleInfo::findOrFail($id);

            $this->outputData = [
                'pageName' => 'Edit Additional Info',
                'action' => url('admin/vehicles/additional-info/update/'.$id),
                'objData' => $objData,
            ];
            return view('admin.pages.additional_info.create',$this->outputData);

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

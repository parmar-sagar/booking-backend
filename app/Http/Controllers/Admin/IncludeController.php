<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\VehicleInfo;
use DataTables;

class IncludeController extends Controller
{
    const ControllerCode = "I_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Includes',
            'dataTables' => url('admin/includes/datatable'),
            'delete' => url('admin/includes/delete'),
            'create' => url('admin/includes/create'),
            'edit' => url('admin/includes/edit')
        ];
        
        return view('admin.pages.include.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::where('type',2)->orderBy('id','DESC')->get();
    
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
                    'title' => 'required|string|min:5|unique:vehicle_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 2;
                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Includes Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Include',
                'action' => url('admin/includes/store'),
            ];
            return view('admin.pages.include.create',$this->outputData);

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
                    'title' => 'required|string|min:5|unique:vehicle_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 2;
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Includes Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Includes',
                'action' => url('admin/includes/update/'.$id),
                'objData' => VehicleInfo::findOrFail($id),
            ];
            return view('admin.pages.include.create',$this->outputData);

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

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
            'pageName' => 'Include',
            'dataTables' => url('admin/include/datatable'),
            'delete' => url('admin/include/delete'),
            'create' => url('admin/include/create'),
            'edit' => url('admin/include/edit')
        ];
        
        return view('admin.pages.include.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::orderBy('id','DESC')->where('type','=','2')->get();
    
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
    
                return response()->json(['success' => "Include Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Include',
                'action' => url('admin/include/store'),
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
    
                return response()->json(['success' => "Include Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Include',
                'action' => url('admin/include/update/'.$id),
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

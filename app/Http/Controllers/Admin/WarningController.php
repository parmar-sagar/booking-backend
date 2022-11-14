<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\VehInfo;
use DataTables;

class WarningController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Warning',
            'dataTables' => url('admin/warning/datatable'),
            'delete' => url('admin/warning/delete'),
            'create' => url('admin/warning/create'),
            'edit' => url('admin/warning/edit')
        ];
        
        return view('admin.pages.warning.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehInfo::orderBy('id','DESC')->where('type','=','3')->get();
    
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
                    'title' => 'required|string|min:5|unique:veh_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 3;
                VehInfo::create($validated);
    
                return response()->json(['success' => "Warning Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Warning',
                'action' => url('admin/warning/store'),
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
                    'id' => 'required|exists:veh_infos',
                    'title' => 'required|string|min:5|unique:veh_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 3;
                VehInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Warning Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Warning',
                'action' => url('admin/warning/update/'.$id),
                'objData' => VehInfo::findOrFail($id),
            ];
            return view('admin.pages.include.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = VehInclude::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

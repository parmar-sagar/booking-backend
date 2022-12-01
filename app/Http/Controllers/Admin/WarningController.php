<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Handlers\Error;
use DataTables;

class WarningController extends Controller
{
    const ControllerCode = "W_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Warnings',
            'dataTables' => url('admin/warnings/datatable'),
            'delete' => url('admin/warnings/delete'),
            'create' => url('admin/warnings/create'),
            'edit' => url('admin/warnings/edit')
        ];
        
        return view('admin.pages.warning.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehicleInfo::type(3)->order()->get();
    
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
                    'title' => 'required|regex:/^[\pL\s\-\/\_]+$/u|min:3|unique:vehicle_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 3;
                $validated['random_id'] = resolve('snowflake')->id();

                VehicleInfo::create($validated);
    
                return response()->json(['success' => "Warnings Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Warnings',
                'action' => url('admin/warnings/store'),
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
                    'title' => 'required|regex:/^[\pL\s\-\/\_]+$/u|min:3|unique:vehicle_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 3;
                
                VehicleInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Warnings Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Warnings',
                'action' => url('admin/warnings/update/'.$id),
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

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Time;
use DataTables;

class TimeController extends Controller
{
    const ControllerCode = "T_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Times',
            'dataTables' => url('admin/times/datatable'),
            'delete' => url('admin/times/delete'),
            'create' => url('admin/times/create'),
            'edit' => url('admin/times/edit')
        ];
        
        return view('admin.pages.time.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Time::order()->get();
    
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
                    'time' => 'required|integer',
                    'time_type' => 'required|in:Minutes,Hours'
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                
                Time::create($validated);
    
                return response()->json(['success' => "Times Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Times',
                'action' => url('admin/times/store'),
            ];
            return view('admin.pages.time.create',$this->outputData);

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
                    'id' => 'required|exists:times',
                    'time' => 'required|integer',
                    'time_type' => 'required|in:Minutes,Hours'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }

                $validated = $validator->validated();
                
                Time::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Times Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Times',
                'action' => url('admin/times/update/'.$id),
                'objData' => Time::findOrFail($id),
            ];
            return view('admin.pages.time.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            Time::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

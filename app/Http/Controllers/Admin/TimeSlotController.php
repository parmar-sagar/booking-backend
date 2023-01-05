<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\TimeSlote;
use DataTables;

class TimeSlotController extends Controller
{
    const ControllerCode = "TS_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Time Slote',
            'dataTables' => url('admin/time-slotes/datatable'),
            'delete' => url('admin/time-slotes/delete'),
            'create' => url('admin/time-slotes/create'),
            'edit' => url('admin/time-slotes/edit')
        ];
        
        return view('admin.pages.time_slotes.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = TimeSlote::get();
    
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
                    'text' => 'required|string',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $snowflake = new \Godruoyi\Snowflake\Snowflake;
  
                $validated['random_id'] = $snowflake->id();
                
                TimeSlote::create($validated);
    
                return response()->json(['success' => "time-slotes Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New time-slotes',
                'action' => url('admin/time-slotes/store'),
            ];
            return view('admin.pages.time_slotes.create',$this->outputData);

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
                    'id' => 'required|exists:time_slotes',
                    'text' => 'required|string',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }

                $validated = $validator->validated();
                
                TimeSlote::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "time-slotes Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit time-slotes',
                'action' => url('admin/time-slotes/update/'.$id),
                'objData' => TimeSlote::findOrFail($id),
            ];
            return view('admin.pages.time_slotes.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = TimeSlote::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

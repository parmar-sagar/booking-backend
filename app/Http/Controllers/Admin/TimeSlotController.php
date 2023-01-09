<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\TimeSlot;
use DataTables;

class TimeSlotController extends Controller
{
    const ControllerCode = "TS_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Time Slots',
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
                $datas = TimeSlot::get();
    
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
                
                TimeSlot::create($validated);
    
                return response()->json(['success' => "Time Slot Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Time Slots',
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
                
                TimeSlot::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Time Slots Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Time Slots',
                'action' => url('admin/time-slotes/update/'.$id),
                'objData' => TimeSlot::findOrFail($id),
            ];
            return view('admin.pages.time_slotes.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            TimeSlot::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

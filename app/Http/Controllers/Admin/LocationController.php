<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Location;
use DataTables;

class LocationController extends Controller
{
    const ControllerCode = "L_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Locations',
            'dataTables' => url('admin/locations/datatable'),
            'delete' => url('admin/locations/delete'),
            'create' => url('admin/locations/create'),
            'edit' => url('admin/locations/edit')
        ];
        
        return view('admin.pages.location.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Location::orderBy('id','DESC')->get();
    
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
                    'name' => 'required|max:100|unique:locations',
                    'status' => 'required|in:0,1'
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();
                
                $snowflake = new \Godruoyi\Snowflake\Snowflake;
                $validated['random_id'] = $snowflake->id();

                Location::create($validated);
    
                return response()->json(['success' => "Location Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Locations',
                'action' => url('admin/locations/store'),
            ];
            return view('admin.pages.location.create',$this->outputData);

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
                    'id' => 'required|exists:locations',
                    'name' => 'required|max:100|unique:locations,name,'.$id,
                    'status' => 'required|in:0,1'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                Location::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Location Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Locations',
                'action' => url('admin/locations/update/'.$id),
                'objData' => Location::findOrFail($id),
            ];
            return view('admin.pages.location.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = Location::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

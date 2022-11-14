<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\VehInfo;
use App\Models\Vehicle;
use App\Handlers\Error;
use App\Models\Tour;
use DataTables;

class VehiclesController extends Controller
{
    const ControllerCode = "V_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Vehicles',
            'dataTables' => url('admin/vehicles/datatable'),
            'delete' => url('admin/vehicles/delete'),
            'create' => url('admin/vehicles/create'),
            'edit' => url('admin/vehicles/edit')
        ];
        
        return view('admin.pages.vehicles.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Vehicle::orderBy('id','DESC')->get();
    
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
                if(isset($request['includes']) && !empty($request['includes'])){
                    $Input['includes']=implode(',',$request['includes']);
                }
                // Validation section
                $validator = Validator::make($Input, [
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    // 'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'includes' => 'required',
                    'tour_id' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
            
                $validated = $validator->validated();
                 
                // $validated['image'] = $request->file('image')->store('uploads','public');
                Vehicle::create($validated);
    
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/vehicles/store'),
                'tourName' => Tour::orderBy('id','DESC')->select('title','id')->get(),
                'include' => VehInfo::orderBy('id','DESC')->where('type', '=', '2')->get(),
                'highlights' => VehInfo::orderBy('id','DESC')->where('type', '=', '1')->get(),
                'warning' => VehInfo::orderBy('id','DESC')->where('type', '=', '3')->get()
            ];
            return view('admin.pages.vehicles.create',$this->outputData);

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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    // 'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'includes' => 'required',
                    'tour_id' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
    
                // $validated['image'] = $request->file('image')->store('uploads','public');
                Vehicle::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'tourName' => Tour::orderBy('id','DESC')->select('name','id')->get(),
                'include' => VehInclude::orderBy('id','DESC')->select('name','id')->get()
            ];
            return view('admin.pages.vehicles.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = Vehicle::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

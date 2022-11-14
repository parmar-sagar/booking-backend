<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\VehInfo;
use App\Models\Vehicle;
use App\Handlers\Error;
use App\Models\Tour;
use App\Models\Time;
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
                if(isset($request['includes_ids']) && !empty($request['includes_ids'])){
                    $Input['includes_ids']=implode(',',$request['includes_ids']);
                }
                if(isset($request['highlight_ids']) && !empty($request['highlight_ids'])){
                    $Input['highlight_ids']=implode(',',$request['highlight_ids']);
                }
                if(isset($request['includes_ids']) && !empty($request['includes_ids'])){
                    $Input['includes_ids']=implode(',',$request['includes_ids']);
                }
                if(isset($request['warning_ids']) && !empty($request['warning_ids'])){
                    $Input['warning_ids']=implode(',',$request['warning_ids']);
                }
                if(isset($request['time_ids']) && !empty($request['time_ids'])){
                    $Input['time_ids']=implode(',',$request['time_ids']);
                }
                // Validation section
                $validator = Validator::make($Input, [
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'includes_ids' => 'required',
                    'tour_id' => 'required',
                    'short_name' => 'required',
                    'time_ids' => 'required',
                    'warning_ids' => 'required',
                    'highlight_ids' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                 
                // $validated['image'] = $request->file('image')->store('uploads','public');
                // $validated['banner_img'] = $request->file('banner_img')->store('uploads','public');

                Vehicle::create($validated);
    
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/vehicles/store'),
                'tourName' => Tour::orderBy('id','DESC')->select('title','id')->get(),
                'include' => VehInfo::orderBy('id','DESC')->where('type', '=', '2')->get(),
                'highlights' => VehInfo::orderBy('id','DESC')->where('type', '=', '1')->get(),
                'warning' => VehInfo::orderBy('id','DESC')->where('type', '=', '3')->get(),
                'time'  => Time::orderBy('id','DESC')->get(),
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
                if(isset($request['includes_ids']) && !empty($request['includes_ids'])){
                    $Input['includes_ids']=implode(',',$request['includes_ids']);
                }
                if(isset($request['highlight_ids']) && !empty($request['highlight_ids'])){
                    $Input['highlight_ids']=implode(',',$request['highlight_ids']);
                }
                if(isset($request['includes_ids']) && !empty($request['includes_ids'])){
                    $Input['includes_ids']=implode(',',$request['includes_ids']);
                }
                if(isset($request['warning_ids']) && !empty($request['warning_ids'])){
                    $Input['warning_ids']=implode(',',$request['warning_ids']);
                }
                if(isset($request['time_ids']) && !empty($request['time_ids'])){
                    $Input['time_ids']=implode(',',$request['time_ids']);
                }
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:vehicles',
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    // 'image' => 'required|mimes:jpeg,jpg,png,gif',
                    // 'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'includes_ids' => 'required',
                    'tour_id' => 'required',
                    'short_name' => 'required',
                    'time_ids' => 'required',
                    'warning_ids' => 'required',
                    'highlight_ids' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
    
                //  $validated['image'] = $request->file('image')->store('uploads','public');
                //  $validated['banner_img'] = $request->file('banner_img')->store('uploads','public');
                Vehicle::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData['pageName'] = 'Edit Vehicle';
            $this->outputData['action'] = url('admin/vehicles/update/'.$id);
            $this->outputData['objData'] = Vehicle::findOrFail($id);
            $this->outputData['selctdTime']= explode(',',$this->outputData['objData']->time_ids);
            $this->outputData['time'] = Time::orderBy('id','DESC')->get();
            $this->outputData['tourName'] = Tour::orderBy('id','DESC')->select('title','id')->get();
            $this->outputData['include'] = VehInfo::orderBy('id','DESC')->where('type', '=', '2')->get();
            $this->outputData['highlights'] = VehInfo::orderBy('id','DESC')->where('type', '=', '1')->get();
            $this->outputData['warning'] = VehInfo::orderBy('id','DESC')->where('type', '=', '3')->get();
            $this->outputData['selctdWarning']= explode(',',$this->outputData['objData']->warning_ids);
            $this->outputData['selctdHighlight']= explode(',',$this->outputData['objData']->highlight_ids);
            $this->outputData['selctdIncludes']= explode(',',$this->outputData['objData']->includes_ids);
            
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

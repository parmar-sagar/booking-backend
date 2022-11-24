<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Vehicle;
use App\Handlers\Error;
use App\Models\Tour;
use App\Models\Time;
use DataTables;

class SafariVehicleController extends Controller
{
    const ControllerCode = "SV_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Safari Vehicles',
            'dataTables' => url('admin/safari-vehicles/datatable'),
            'delete' => url('admin/safari-vehicles/delete'),
            'create' => url('admin/safari-vehicles/create'),
            'edit' => url('admin/safari-vehicles/edit')
        ];
        
        return view('admin.pages.safari_vehicles.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Vehicle::where('type','Safari')->orderBy('id','DESC')->get();
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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'time_ids' => 'required|array',
                    'tour_id' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'status' => 'required|in:0,1',
                    'no_of_persons' => 'required|integer',
                    'activities_ids' => 'required|array'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                if(isset($request['time_ids']) && !empty($request['time_ids'])){
                    $validated['time_ids']=implode(',',$request['time_ids']);
                }
                if(isset($request['includes_ids']) && !empty($request['includes_ids'])){
                    $validated['includes_ids']=implode(',',$request['includes_ids']);
                }
                if(isset($request['highlight_ids']) && !empty($request['highlight_ids'])){
                    $validated['highlight_ids']=implode(',',$request['highlight_ids']);
                }
                if(isset($request['warning_ids']) && !empty($request['warning_ids'])){
                    $validated['warning_ids']=implode(',',$request['warning_ids']);
                }
                if(isset($request['activities_ids']) && !empty($request['activities_ids'])){
                    $validated['activities_ids']=implode(',',$request['activities_ids']);
                }
                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->getClientOriginalExtension();  
                    $request->image->move(public_path('admin/uploads/vehicle'), $validated['image']);
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = time().'.'.$request->banner_img->getClientOriginalExtension();  
                    $request->banner_img->move(public_path('admin/uploads/vehicle'), $validated['banner_img']);
                }
                $validated['type'] = "Safari";

                Vehicle::create($validated);
    
                return response()->json(['success' => "Safari Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/safari-vehicles/store'),
                'tourName' => Tour::where('type','Safari')->select('name','id')->orderBy('id','DESC')->get(),
                'includes' => VehicleInfo::where('type',2)->orderBy('id','DESC')->get(),
                'highlights' => VehicleInfo::where('type',1)->orderBy('id','DESC')->get(),
                'warnings' => VehicleInfo::where('type',3)->orderBy('id','DESC')->get(),
                'activities' => VehicleInfo::where('type',4)->orderBy('id','DESC')->get(),
                'time' => Time::orderBy('id','DESC')->get()
            ];
            return view('admin.pages.safari_vehicles.create',$this->outputData);

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
                    'id' => 'required|exists:vehicles',
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'mimes:jpeg,jpg,png,gif',
                    'time_ids' => 'required|array',
                    'tour_id' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'status' => 'required|in:0,1',
                    'no_of_persons' => 'required|integer',
                    'activities_ids' => 'required|array'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                if(isset($request['time_ids']) && !empty($request['time_ids'])){
                    $validated['time_ids']=implode(',',$request['time_ids']);
                }
                if(isset($request['includes_ids']) && !empty($request['includes_ids'])){
                    $validated['includes_ids']=implode(',',$request['includes_ids']);
                }
                if(isset($request['highlight_ids']) && !empty($request['highlight_ids'])){
                    $validated['highlight_ids']=implode(',',$request['highlight_ids']);
                }
                if(isset($request['warning_ids']) && !empty($request['warning_ids'])){
                    $validated['warning_ids']=implode(',',$request['warning_ids']);
                }
                if(isset($request['activities_ids']) && !empty($request['activities_ids'])){
                    $validated['activities_ids']=implode(',',$request['activities_ids']);
                }
                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->getClientOriginalExtension();  
                    $request->image->move(public_path('admin/uploads/vehicle'), $validated['image']);
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = time().'.'.$request->banner_img->getClientOriginalExtension();  
                    $request->banner_img->move(public_path('admin/uploads/vehicle'), $validated['banner_img']);
                }
                Vehicle::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Safari Vehicle Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/safari-vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'time' => Time::orderBy('id','DESC')->get(),
                'tourName' => Tour::where('type','Safari')->select('name','id')->orderBy('id','DESC')->get(),
                'includes' => VehicleInfo::where('type',2)->orderBy('id','DESC')->get(),
                'highlights' => VehicleInfo::where('type',1)->orderBy('id','DESC')->get(),
                'warnings' => VehicleInfo::where('type',3)->orderBy('id','DESC')->get(),
                'activities' => VehicleInfo::where('type',4)->orderBy('id','DESC')->get(),
                'time' => Time::orderBy('id','DESC')->get()
            ];
            $time = $this->outputData['objData']->time_ids;
            $this->outputData['selctdTime'] = explode(',',$time);
            $tourId = $this->outputData['objData']->tour_id;
            $this->outputData['selctdTour'] = explode(',',$tourId);
            $includeId = $this->outputData['objData']->includes_ids;
            $this->outputData['selctdIncludes'] = explode(',',$includeId);
            $warningId = $this->outputData['objData']->warning_ids;
            $this->outputData['selctdWarning'] = explode(',',$warningId);
            $highlightId = $this->outputData['objData']->highlight_ids;
            $this->outputData['selctdHighlight'] = explode(',',$highlightId);
            $activitiesId = $this->outputData['objData']->activities_ids;
            $this->outputData['selctdActivitie'] = explode(',',$activitiesId);
            
            return view('admin.pages.safari_vehicles.create',$this->outputData);

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

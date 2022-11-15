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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100|unique:vehicles',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'time_ids' => 'required|min:1',
                    'tour_id' => 'required|min:1',
                    'includes_ids' => 'required|min:1',
                    'highlight_ids' => 'required|min:1',
                    'warning_ids' => 'required|min:1',
                    'status' => 'required',
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
                 
                $validated['image'] = $request->file('image')->store('uploads','public');
                $validated['banner_img'] = $request->file('banner_img')->store('uploads','public');
                Vehicle::create($validated);
    
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/vehicles/store'),
                'tourName' => Tour::orderBy('id','DESC')->select('name','id')->get(),
                'include' => VehicleInfo::orderBy('id','DESC')->where('type', '=', '2')->get(),
                'highlights' => VehicleInfo::orderBy('id','DESC')->where('type', '=', '1')->get(),
                'warning' => VehicleInfo::orderBy('id','DESC')->where('type', '=', '3')->get(),
                'time' => Time::orderBy('id','DESC')->get()
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
                    'id' => 'required|exists:vehicles',
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'mimes:jpeg,jpg,png,gif',
                    'time_ids' => 'required|min:1',
                    'tour_id' => 'required|min:1',
                    'includes_ids' => 'required|min:1',
                    'highlight_ids' => 'required|min:1',
                    'warning_ids' => 'required|min:1',
                    'status' => 'required',
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
                if ($request->file('image')) {
                $validated['image'] = $request->file('image')->store('uploads','public');
                }
                if ($request->file('banner_img')) {
                $validated['banner_img'] = $request->file('banner_img')->store('uploads','public');
                }
                Vehicle::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'time' => Time::orderBy('id','DESC')->get(),
                'tourName' => Tour::orderBy('id','DESC')->select('name','id')->get(),
                'include' => VehicleInfo::orderBy('id','DESC')->where('type', '=', '2')->get(),
                'highlights' => VehicleInfo::orderBy('id','DESC')->where('type', '=', '1')->get(),
                'warning' => VehicleInfo::orderBy('id','DESC')->where('type', '=', '3')->get(),
                'time' => Time::orderBy('id','DESC')->get()
            ];
            $time = $this->outputData['objData']->time_ids;
            $timeIds=explode(',',$time);
            $tourId = $this->outputData['objData']->tour_id;
            $tour=explode(',',$tourId);
            $includeId = $this->outputData['objData']->includes_ids;
            $includes=explode(',',$includeId);
            $warningId = $this->outputData['objData']->warning_ids;
            $warning=explode(',',$warningId);
            $highlightId = $this->outputData['objData']->highlight_ids;
            $highlight=explode(',',$highlightId);
            $this->outputData['selctdTime'] = $timeIds;
            $this->outputData['selctdTour'] = $tour;
            $this->outputData['selctdIncludes'] = $includes;
            $this->outputData['selctdWarning'] = $warning;
            $this->outputData['selctdHighlight'] = $highlight;
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

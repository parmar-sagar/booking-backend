<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Vehicle;
use App\Handlers\Error;
use App\Helpers\Helper;
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
                $datas = Vehicle::type('Safari')->order()->get();
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

                    $validated['time_ids'] = Helper::implode( $request['time_ids'] );
                    $validated['includes_ids'] = Helper::implode( $request['includes_ids'] );
                    $validated['highlight_ids'] = Helper::implode( $request['highlight_ids'] );
                    $validated['warning_ids'] = Helper::implode( $request['warning_ids'] );
                    $validated['activities_ids'] = Helper::implode( $request['activities_ids'] );

                    if ($request->file('image')) {
                        $path = 'vehicle';
                        $validated['image'] = Helper::uploadFile($request->image, $path);
                    }
                    if ($request->file('banner_img')) {
                        $path = 'vehicle';
                        $validated['banner_img'] = Helper::uploadFile($request->banner_img, $path);
                    }
                    
                    $snowflake = new \Godruoyi\Snowflake\Snowflake;
                    $validated['random_id'] = $snowflake->id();
                    
                $validated['type'] = "Safari";

                Vehicle::create($validated);
    
                return response()->json(['success' => "Safari Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/safari-vehicles/store'),
                'tourName' => Tour::type('Safari')->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::type(1)->order()->get(),
                'includes' => VehicleInfo::type(2)->order()->get(),
                'warnings' => VehicleInfo::type(3)->order()->get(),
                'activities' => VehicleInfo::type(4)->order()->get(),
                'time' => Time::order()->get()
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

                $validated['time_ids'] = Helper::implode( $request['time_ids'] );
                $validated['includes_ids'] = Helper::implode( $request['includes_ids'] );
                $validated['highlight_ids'] = Helper::implode( $request['highlight_ids'] );
                $validated['warning_ids'] = Helper::implode( $request['warning_ids'] );
                $validated['activities_ids'] = Helper::implode( $request['activities_ids'] );

                if ($request->file('image')) {
                    $path = 'vehicle';
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }
                if ($request->file('banner_img')) {
                    $path = 'vehicle';
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, $path);
                }

                Vehicle::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Safari Vehicle Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/safari-vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'tourName' => Tour::type('Safari')->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::type(1)->order()->get(),
                'includes' => VehicleInfo::type(2)->order()->get(),
                'warnings' => VehicleInfo::type(3)->order()->get(),
                'activities' => VehicleInfo::type(4)->order()->get(),
                'time' => Time::order()->get()
            ];
            
            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );
            $this->outputData['selctdTour'] = Helper::explode( $this->outputData['objData']->tour_id );
            $this->outputData['selctdIncludes'] = Helper::explode( $this->outputData['objData']->includes_ids );
            $this->outputData['selctdWarning'] = Helper::explode( $this->outputData['objData']->warning_ids );
            $this->outputData['selctdHighlight'] = Helper::explode( $this->outputData['objData']->highlight_ids );
            $this->outputData['selctdActivitie'] = Helper::explode( $this->outputData['objData']->activities_ids );
            
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

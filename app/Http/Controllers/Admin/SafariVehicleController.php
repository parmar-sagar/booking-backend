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
use App\Models\SafariPrice;
use App\Models\Time;
use App\Models\timeSlote;
use DataTables;

class SafariVehicleController extends Controller
{
    const ControllerCode = "SV_";

    public $outputData = [];

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
                $datas = Vehicle::safari()->order()->get();
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
                    'amount' => 'required',
                    'tour_id' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'status' => 'required|in:0,1',
                    'no_of_persons' => 'required|integer',
                    'activities_ids' => 'required|array',
                    'additional_info_ids' => 'required|array',
                    'tour_itenary' => 'required',
                    'pickup_time' => 'required',
                    'dropoff_time' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                $validated['includes_ids'] = Helper::implode( $request['includes_ids'] );
                $validated['highlight_ids'] = Helper::implode( $request['highlight_ids'] );
                $validated['warning_ids'] = Helper::implode( $request['warning_ids'] );
                $validated['activities_ids'] = Helper::implode( $request['activities_ids'] );
                $validated['additional_info_ids'] = Helper::implode( $request['additional_info_ids'] );

                if ($request->file('image')) {
                    $path = 'vehicle';
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }
                if ($request->file('banner_img')) {
                    $path = 'vehicle';
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, $path);
                }
                $validated['random_id'] = (new Snowflake())->id();
                $validated['type'] = "Safari";
                $lastInsertId = Vehicle::create($validated)->id;
                              
                SafariPrice::create([
                    'amount' => $validated['amount'],
                    'vehicle_id' => $lastInsertId,
                    'tour_id' => $validated['tour_id'],
                ]);
                
                return response()->json(['success' => "Safari Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/safari-vehicles/store'),
                'tourName' => Tour::safari()->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::highlight()->order()->get(),
                'includes' => VehicleInfo::include()->order()->get(),
                'warnings' => VehicleInfo::warning()->order()->get(),
                'activities' => VehicleInfo::activity()->order()->get(),
                'addiInfo' => VehicleInfo::additionalInfo()->order()->get(),
                'time' => Time::order()->get(),
                'timeSlotes' => timeSlote::get()
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
                    'amount' => 'required',
                    'tour_id' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'status' => 'required|in:0,1',
                    'no_of_persons' => 'required|integer',
                    'activities_ids' => 'required|array',
                    'additional_info_ids' => 'required|array',
                    'tour_itenary' => 'required',
                    'pickup_time' => 'required',
                    'dropoff_time' => 'required',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                // $validated['time_ids'] = Helper::implode( $request['time_ids'] );
                $validated['includes_ids'] = Helper::implode( $request['includes_ids'] );
                $validated['highlight_ids'] = Helper::implode( $request['highlight_ids'] );
                $validated['warning_ids'] = Helper::implode( $request['warning_ids'] );
                $validated['activities_ids'] = Helper::implode( $request['activities_ids'] );
                $validated['additional_info_ids'] = Helper::implode( $request['additional_info_ids'] );

            if ($request->file('image')) {
                $path = 'vehicle';
                $validated['image'] = Helper::uploadFile( $request->image, $path );
            }
            if ($request->file('banner_img')) {
                $path = 'vehicle';
                $validated['banner_img'] = Helper::uploadFile( $request->banner_img, $path );
            }
                Vehicle::find($validated['id'])->update($validated);
                SafariPrice::where('vehicle_id',$validated['id'])->update([
                    'amount' => $validated['amount'],
                    'vehicle_id' => $validated['id'],
                    'tour_id' => $validated['tour_id'],
                ]);
    
                return response()->json(['success' => "Vehicle Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/safari-vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'tourName' => Tour::type('Safari')->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::highlight()->order()->get(),
                'includes' => VehicleInfo::include()->order()->get(),
                'warnings' => VehicleInfo::warning()->order()->get(),
                'activities' => VehicleInfo::activity()->order()->get(),
                'addiInfo' => VehicleInfo::additionalInfo()->order()->get(),
                'safariPirce' => SafariPrice::where('vehicle_id',$id)->select('amount')->first(),
            ]; 

            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );
            $this->outputData['selctdTour'] = Helper::explode( $this->outputData['objData']->tour_id );
            $this->outputData['selctdIncludes'] = Helper::explode( $this->outputData['objData']->includes_ids );
            $this->outputData['selctdWarning'] = Helper::explode( $this->outputData['objData']->warning_ids );
            $this->outputData['selctdHighlight'] = Helper::explode( $this->outputData['objData']->highlight_ids );
            $this->outputData['selctdActivitie'] = Helper::explode( $this->outputData['objData']->activities_ids );
            $this->outputData['selctdAddInfo'] = Helper::explode( $this->outputData['objData']->additional_info_ids );
            
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

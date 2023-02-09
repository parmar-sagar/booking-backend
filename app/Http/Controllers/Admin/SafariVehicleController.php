<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\SafariPrice;
use App\Models\Vehicle;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Price;
use App\Models\Tour;
use DataTables;

class SafariVehicleController extends Controller
{
    const ControllerCode = "SV_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Safari Vehicles',
            'dataTables' => url('admin/safaris/vehicles/datatable'),
            'delete' => url('admin/safaris/vehicles/delete'),
            'create' => url('admin/safaris/vehicles/create'),
            'edit' => url('admin/safaris/vehicles/edit')
        ];
        
        return view('admin.pages.safari.vehicle.index',$this->outputData);
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
                    'name' => 'required|string|max:255',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'amount' => 'required|numeric',
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
                    $validated['image'] = Helper::uploadFile($request->image, 'vehicle');
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, 'vehicle');
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

            $tours = Tour::safari()->select('name','id')->order()->get();
            $highlights = VehicleInfo::highlight()->order()->get();
            $includes = VehicleInfo::include()->order()->get();
            $warnings = VehicleInfo::warning()->order()->get();
            $activities = VehicleInfo::activity()->order()->get();
            $addInfos = VehicleInfo::additionalInfo()->order()->get();

            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/safaris/vehicles/store'),
                'tours' => $tours,
                'highlights' => $highlights,
                'includes' => $includes,
                'warnings' => $warnings,
                'activities' => $activities,
                'addInfos' => $addInfos
            ];
            return view('admin.pages.safari.vehicle.create',$this->outputData);

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
                    'name' => 'required|string|max:255',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'nullable|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'nullable|mimes:jpeg,jpg,png,gif',
                    'amount' => 'required|numeric',
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
                    $validated['image'] = Helper::uploadFile( $request->image, 'vehicle' );
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = Helper::uploadFile( $request->banner_img, 'vehicle' );
                }

                Vehicle::find($validated['id'])->update($validated);
                SafariPrice::where('vehicle_id',$validated['id'])->update([
                    'amount' => $validated['amount'],
                    'vehicle_id' => $validated['id'],
                    'tour_id' => $validated['tour_id'],
                ]);
    
                return response()->json(['success' => "Vehicle Updated successfully."]);
            }

            $tours = Tour::safari()->select('name','id')->order()->get();
            $highlights = VehicleInfo::highlight()->order()->get();
            $includes = VehicleInfo::include()->order()->get();
            $warnings = VehicleInfo::warning()->order()->get();
            $activities = VehicleInfo::activity()->order()->get();
            $addInfos = VehicleInfo::additionalInfo()->order()->get();
            $safariPirce = SafariPrice::where('vehicle_id',$id)->select('amount')->first();
            
            $objData = Vehicle::findOrFail($id);

            $objData->time_ids = Helper::explode( $objData->time_ids );
            $objData->includes_ids = Helper::explode( $objData->includes_ids );
            $objData->warning_ids = Helper::explode( $objData->warning_ids );
            $objData->highlight_ids = Helper::explode( $objData->highlight_ids );
            $objData->activities_ids = Helper::explode( $objData->activities_ids );
            $objData->additional_info_ids = Helper::explode( $objData->additional_info_ids );

            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/safaris/vehicles/update/'.$id),
                'objData' => $objData,
                'tours' => $tours,
                'highlights' => $highlights,
                'includes' => $includes,
                'warnings' => $warnings,
                'activities' => $activities,
                'addInfos' => $addInfos,
                'safariPirce' => $safariPirce
            ]; 

            return view('admin.pages.safari.vehicle.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            Vehicle::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

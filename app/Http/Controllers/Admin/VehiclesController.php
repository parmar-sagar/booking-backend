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
use App\Models\Price;
use App\Models\Time;
use App\Models\TimeSlote;
use App\Models\AvailableSlot;
use App\Models\TimeSlot;
use DataTables;


class VehiclesController extends Controller
{
    const ControllerCode = "V_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Vehicles',
            'dataTables' => url('admin/tours/vehicles/datatable'),
            'delete' => url('admin/tours/vehicles/delete'),
            'create' => url('admin/tours/vehicles/create'),
            'edit' => url('admin/tours/vehicles/edit')
        ];
        
        return view('admin.pages.vehicles.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Vehicle::tours()->order()->get();
                return DataTables::of($datas)->toJson();
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
                    'tour_id' => 'required|integer',
                    'time_slots_ids' => 'required|array',
                    'no_of_persons' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'activities_ids' => 'required|array',
                    'additional_info_ids' => 'required|array',
                    'tour_itenary' => 'required',
                    'quantity' => 'required|integer',
                    'status' => 'required|in:0,1',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'time' => 'required|array',
                    'amount' => 'required|array'
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
                $validated['available_quantity'] = $validated['quantity'];
                $lastInsertId = Vehicle::create($validated)->id;
                
                foreach( $validated['amount'] as $index => $amount ) {
                    Price::create([
                        'amount' => $amount,
                        'time' => $validated['time'][$index],
                        'vehicle_id' => $lastInsertId,
                        'tour_id' => $validated['tour_id'],
                    ]);
                }
                foreach( $validated['time_slots_ids'] as $time){
                    AvailableSlot::create([
                        'vehicle_id' => $lastInsertId,
                        'time_slot_id' => $time    
                    ]);
                }
                return response()->json(['success' => "Vehicle Created successfully."]);
            }

            $tours = Tour::tour()->select('name','id')->order()->get();
            $highlights = VehicleInfo::highlight()->order()->get();
            $includes = VehicleInfo::include()->order()->get();
            $warnings = VehicleInfo::warning()->order()->get();
            $activities = VehicleInfo::activity()->order()->get();
            $addInfos = VehicleInfo::additionalInfo()->order()->get();
            $times = Time::order()->get();

            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/tours/vehicles/store'),
                'tours' => $tours,
                'highlights' => $highlights,
                'includes' => $includes,
                'warnings' => $warnings,
                'activities' => $activities,
                'addInfos' => $addInfos,
                'times' => $times,
                'timeSlotes' => TimeSlot::get()
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
                    'name' => 'required|string|max:255',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'tour_id' => 'required|integer',
                    'time_slots_ids' => 'required|array',
                    'no_of_persons' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'activities_ids' => 'required|array',
                    'additional_info_ids' => 'required|array',
                    'tour_itenary' => 'required',
                    'quantity' => 'required|integer',
                    'status' => 'required|in:0,1',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'time' => 'required|array',
                    'amount' => 'required|array'
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
                    $validated['image'] = Helper::uploadFile( $request->image, $path );
                }
                if ($request->file('banner_img')) {
                    $path = 'vehicle';
                    $validated['banner_img'] = Helper::uploadFile( $request->banner_img, $path );
                } 

                $validated['available_quantity'] = $validated['quantity'];
                Vehicle::find($validated['id'])->update($validated);

                AvailableSlot::where('vehicle_id',$validated['id'])->delete();
  
                foreach( $validated['time_slots_ids'] as $time){
                    AvailableSlot::create([
                        'vehicle_id' => $validated['id'],
                        'time_slot_id' => $time
                    ]);
                }
                Price::where('vehicle_id',$id)->delete();

                $array1 = $validated['amount'];
                $array2 = $validated['time'];

                foreach( $validated['amount'] as $index => $amount ) {                    
                    Price::create([
                        'amount' => $amount,
                        'time' => $validated['time'][$index],
                        'vehicle_id' => $validated['id'],
                        'tour_id' => $validated['tour_id'],
                    ]);
                }
    
                return response()->json(['success' => "Vehicle Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/tours/vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'tourName' => Tour::type('Tour')->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::highlight()->order()->get(),
                'includes' => VehicleInfo::include()->order()->get(),
                'warnings' => VehicleInfo::warning()->order()->get(),
                'activities' => VehicleInfo::activity()->order()->get(),
                'addiInfo' => VehicleInfo::additionalInfo()->order()->get(),
                'time' => Time::order()->get(),
                'timeSlotes' => TimeSlote::get()
            ];

            $this->outputData['price'] = Price::where('vehicle_id',$id)->get();

            $timeSlotes = AvailableSlot::where('vehicle_id',$id)->get()->toArray();  

            foreach($timeSlotes as $key => $value){
                $this->outputData['selctdTimeSlots'][] = $value['time_slot_id'];
            }
            
            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );
            $this->outputData['selctdTour'] = Helper::explode( $this->outputData['objData']->tour_id );
            $this->outputData['selctdInclude'] = Helper::explode( $this->outputData['objData']->includes_ids );
            $this->outputData['selctdWarning'] = Helper::explode( $this->outputData['objData']->warning_ids );
            $this->outputData['selctdHighlight'] = Helper::explode( $this->outputData['objData']->highlight_ids );
            $this->outputData['selctdActivitie'] = Helper::explode( $this->outputData['objData']->activities_ids );
            $this->outputData['selctdAddInfo'] = Helper::explode( $this->outputData['objData']->additional_info_ids );

            return view('admin.pages.vehicles.create',$this->outputData);

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

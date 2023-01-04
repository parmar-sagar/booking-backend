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
use App\Models\AvalableSlote;
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
                $datas = Vehicle::type('Tour')->order()->get();
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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'short_name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:20',
                    'description' => 'required|string',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'time' => 'required|array',
                    'amount' => 'required|array',
                    'tour_id' => 'required|integer',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'status' => 'required|in:0,1',
                    'time_slots_ids' => 'required|array',
                    'no_of_persons' => 'required|integer',
                    'activities_ids' => 'required|array',
                    'additional_info_ids' => 'required|array',
                    'tour_itenary' => 'required'
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
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }
                if ($request->file('banner_img')) {
                    $path = 'vehicle';
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, $path);
                }
                $snowflake = new \Godruoyi\Snowflake\Snowflake;
                $validated['random_id'] = $snowflake->id();

                $lastInsertId = Vehicle::create($validated)->id;
                
                $array1 = $validated['amount'];
                $array2 = $validated['time'];
                $array3 = $validated['time_slots_ids'];

                foreach( $array1 as $index => $amount ) {
                    $amounts=$amount;
                    $times=$array2[$index];
                    Price::create([
                        'amount' => $amounts,
                        'time' => $times,
                        'vehicle_id' => $lastInsertId,
                        'tour_id' => $validated['tour_id'],
                    ]);
                }
                foreach( $array3 as $index => $timeSlotes){
                    
                    AvalableSlote::create([
                        'vehicle_id' => $lastInsertId,
                        'time_slots_ids' => $timeSlotes
                        
                    ]);
                }
                return response()->json(['success' => "Vehicle Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Vehicle',
                'action' => url('admin/vehicles/store'),
                'tourName' => Tour::type('Tour')->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::type(1)->order()->get(),
                'includes' => VehicleInfo::type(2)->order()->get(),
                'warnings' => VehicleInfo::type(3)->order()->get(),
                'activities' => VehicleInfo::type(4)->order()->get(),
                'addiInfo' => VehicleInfo::type(7)->order()->get(),
                'time' => Time::order()->get(),
                'timeSlotes' => TimeSlote::get()
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
                    'time_slots_ids' => 'required|array',
                    'tour_id' => 'required|integer',
                    'time' => 'required|array',
                    'amount' => 'required|array',
                    'includes_ids' => 'required|array',
                    'highlight_ids' => 'required|array',
                    'warning_ids' => 'required|array',
                    'status' => 'required|in:0,1',
                    'no_of_persons' => 'required|integer',
                    'activities_ids' => 'required|array',
                    'additional_info_ids' => 'required|array',
                    'tour_itenary' => 'required'
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

                avalableSlote::where('vehicle_id',$validated['id'])->delete();
                $array3 = $validated['time_slots_ids'];   
                foreach( $array3 as $index => $timeSlotes){
                    avalableSlote::create([
                        'vehicle_id' => $validated['id'],
                        'time_slots_ids' => $timeSlotes
                    ]);
                }

                Price::where('vehicle_id',$id)->delete();
                $array1 = $validated['amount'];
                $array2 = $validated['time'];
                foreach( $array1 as $index => $amount ) {
                    $amounts=$amount;
                    $times=$array2[$index];
                    Price::create([
                        'amount' => $amounts,
                        'time' => $times,
                        'vehicle_id' => $validated['id'],
                        'tour_id' => $validated['tour_id'],
                    ]);
                }
    
                return response()->json(['success' => "Vehicle Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Vehicle',
                'action' => url('admin/vehicles/update/'.$id),
                'objData' => Vehicle::findOrFail($id),
                'tourName' => Tour::type('Tour')->select('name','id')->order()->get(),
                'highlights' => VehicleInfo::type(1)->order()->get(),
                'includes' => VehicleInfo::type(2)->order()->get(),
                'warnings' => VehicleInfo::type(3)->order()->get(),
                'activities' => VehicleInfo::type(4)->order()->get(),
                'addiInfo' => VehicleInfo::type(7)->order()->get(),
                'time' => Time::order()->get(),
                'timeSlotes' => TimeSlote::get()
            ];
            //  dd($this->outputData['addiInfo']);
            $this->outputData['price'] = Price::where('vehicle_id',$id)->get();
            // dd($this->outputData['price']);
            $this->outputData['selctdTimeSlots'] = avalableSlote::where('vehicle_id',$id)->select('time_slots_ids')->first()->toArray();  
            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );
            $this->outputData['selctdTour'] = Helper::explode( $this->outputData['objData']->tour_id );
            $this->outputData['selctdIncludes'] = Helper::explode( $this->outputData['objData']->includes_ids );
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
            $res = Vehicle::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

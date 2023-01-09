<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Location;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Tour;
use App\Models\Time;
use DataTables;

class SafariController extends Controller{

    const ControllerCode = "S_";
    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Safaris',
            'dataTables' => url('admin/safaris/datatable'),
            'delete' => url('admin/safaris/delete'),
            'create' => url('admin/safaris/create'),
            'edit' => url('admin/safaris/edit')
        ];
        
        return view('admin.pages.safari.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Tour::safari()->order()->get();
    
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
                    'description' => 'required|string',
                    'min_age' => 'required|integer|digits_between:1,100',
                    'convoy_leader' => 'required|string|max:100',
                    'tour_guide' => 'required|string|max:100',
                    'pickup_and_drop' => 'required|string|max:100',
                    'time_ids' => 'required|array',
                    'location_id' => 'required|integer',
                    'safety_gear_ids' => 'required|array',
                    'refreshments_ids' => 'required|array',
                    'sequence' => 'nullable|integer',
                    'status' => 'required|in:0,1',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                $validated['time_ids'] = Helper::implode($request['time_ids']);
                $validated['safety_gear_ids'] = Helper::implode( $request['safety_gear_ids'] );
                $validated['refreshments_ids'] = Helper::implode( $request['refreshments_ids'] );

                if ($request->file('image')) {
                    $validated['image'] = Helper::uploadFile($request->image, 'tour');
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, 'tour');
                }

                $validated['random_id'] = (new Snowflake())->id();
                $validated['type'] = 'Safari';
                $validated['sequence'] = (($validated['sequence'])) ?? 0;

                Tour::create($validated);
    
                return response()->json(['success' => "Safari Created successfully."]);
            }

            $times = Time::order()->get();
            $locations = Location::order()->get();
            $safetyGears = VehicleInfo::safetyGear()->order()->get();
            $refreshments = VehicleInfo::refreshment()->order()->get();

            $this->outputData = [
                'pageName' => 'New Safari',
                'action' => url('admin/safaris/store'),
                'times' => $times,
                'locations' => $locations,
                'safetyGears' => $safetyGears,
                'refreshments' => $refreshments
            ];
            return view('admin.pages.safari.create',$this->outputData);

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
                    'id' => 'required|exists:tours',
                    'name' => 'required|string|max:255',
                    'description' => 'required|string',
                    'min_age' => 'required|integer|digits_between:1,100',
                    'convoy_leader' => 'required|string|max:100',
                    'tour_guide' => 'required|string|max:100',
                    'pickup_and_drop' => 'required|string|max:100',
                    'time_ids' => 'required|array',
                    'location_id' => 'required|integer',
                    'safety_gear_ids' => 'required|array',
                    'refreshments_ids' => 'required|array',
                    'sequence' => 'nullable|integer',
                    'status' => 'required|in:0,1',
                    'image' => 'nullable|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'nullable|mimes:jpeg,jpg,png,gif'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                $validated['time_ids'] = Helper::implode($request['time_ids']);
                $validated['safety_gear_ids'] = Helper::implode( $request['safety_gear_ids'] );
                $validated['refreshments_ids'] = Helper::implode( $request['refreshments_ids'] );

                if ($request->file('image')) {
                    $validated['image'] = Helper::uploadFile($request->image, 'tour');
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, 'tour');
                }
                
                Tour::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Safari Updated successfully."]);
            }

            $times = Time::order()->get();
            $locations = Location::order()->get();
            $safetyGears = VehicleInfo::safetyGear()->order()->get();
            $refreshments = VehicleInfo::refreshment()->order()->get();
            $objData = Tour::findOrFail($id);

            $objData->time_ids = Helper::explode( $objData->time_ids );
            $objData->safety_gear_ids = Helper::explode( $objData->safety_gear_ids );
            $objData->refreshments_ids = Helper::explode( $objData->refreshments_ids );

            $this->outputData = [
                'pageName' => 'Edit Safari',
                'action' => url('admin/safaris/update/'.$id),
                'objData' => $objData,
                'times' => $times,
                'locations' => $locations,
                'safetyGears' => $safetyGears,
                'refreshments' => $refreshments,
            ];

            return view('admin.pages.safari.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            Tour::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

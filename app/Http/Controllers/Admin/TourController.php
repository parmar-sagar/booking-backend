<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleInfo;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;
use App\Handlers\Error;
use App\Models\Tour;
use App\Models\Time;
use DataTables;

class TourController extends Controller{

    const ControllerCode = "T_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Tours',
            'dataTables' => url('admin/tours/datatable'),
            'delete' => url('admin/tours/delete'),
            'create' => url('admin/tours/create'),
            'edit' => url('admin/tours/edit')
        ];
        
        return view('admin.pages.tour.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Tour::where('type','Tour')->orderBy('id','DESC')->get();
    
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
                    'name' => 'required|string|max:100',
                    'description' => 'required|string',
                    'time_ids' => 'required|array',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
                    'sequence' => 'required|integer',
                    'location_id' => 'required|integer',
                    'min_age' => 'required|integer',
                    'pickup_and_drop' => 'required|string',
                    'tour_guide' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'convoy_leader' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'safety_gear_ids' => 'required|array',
                    'refreshments_ids' => 'required|array',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                $validated['time_ids'] = Helper::implode($request['time_ids']);
                $validated['safety_gear_ids'] = Helper::implode( $request['safety_gear_ids'] );
                $validated['refreshments_ids'] = Helper::implode( $request['refreshments_ids'] );

                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->getClientOriginalExtension();  
                    $request->image->move(public_path('admin/uploads/tour'), $validated['image']);
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = time().'.'.$request->banner_img->getClientOriginalExtension();  
                    $request->banner_img->move(public_path('admin/uploads/tour'), $validated['banner_img']);
                }
                // $validated['image'] = $request->file('image')->store('uploads','public');
                // $validated['banner_img'] = $request->file('banner_img')->store('uploads','public');
                
                $snowflake = new \Godruoyi\Snowflake\Snowflake;
                $validated['random_id'] = $snowflake->id();

                Tour::create($validated);
    
                return response()->json(['success' => "Tour Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Tour',
                'action' => url('admin/tours/store'),
                'time' => Time::orderBy('id','DESC')->get(),
                'locations' => Location::orderBy('id','DESC')->get(),
                'safetyGear' => VehicleInfo::type(5)->order()->get(),
                'refreshment' => VehicleInfo::type(6)->order()->get(),
            ];
            return view('admin.pages.tour.create',$this->outputData);

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
                    'sequence' => 'required|integer|unique:tours,sequence,'.$id,
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    'time_ids' => 'required|array',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
                    'location_id' => 'required|integer',
                    'min_age' => 'required|integer',
                    'pickup_and_drop' => 'required|string',
                    'tour_guide' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'convoy_leader' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'safety_gear_ids' => 'required|array',
                    'refreshments_ids' => 'required|array',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                $validated['time_ids'] = Helper::implode($request['time_ids']);
                $validated['safety_gear_ids'] = Helper::implode( $request['safety_gear_ids'] );
                $validated['refreshments_ids'] = Helper::implode( $request['refreshments_ids'] );

                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->getClientOriginalExtension();  
                    $request->image->move(public_path('admin/uploads/tour'), $validated['image']);
                }
                if ($request->file('banner_img')) {
                    $validated['banner_img'] = time().'.'.$request->banner_img->getClientOriginalExtension();  
                    $request->banner_img->move(public_path('admin/uploads/tour'), $validated['banner_img']);
                }
                
                Tour::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Tour Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Tour',
                'action' => url('admin/tours/update/'.$id),
                'objData' => Tour::findOrFail($id),
                'time' => Time::order()->get(),
                'locations' => Location::order()->get(),
                'safetyGear' => VehicleInfo::type(5)->order()->get(),
                'refreshment' => VehicleInfo::type(6)->order()->get(),
            ];
            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );
            $this->outputData['selctdSftyGear'] = Helper::explode( $this->outputData['objData']->safety_gear_ids );
            $this->outputData['selctdRefreshment'] = Helper::explode( $this->outputData['objData']->refreshments_ids );

            return view('admin.pages.tour.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = Tour::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

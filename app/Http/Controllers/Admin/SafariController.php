<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Tour;
use App\Models\Time;
use DataTables;

class SafariController extends Controller
{
    const ControllerCode = "S_";

    function __construct(){
        $this->outputData = [];
    }

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
                $datas = Tour::type('Safari')->order()->get();
    
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
                    'description' => 'required|string',
                    'time_ids' => 'required|array',
                    'image' => 'required|mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'required|mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
                    'safari_sequence' => 'required|integer',
                    'location_id' => 'required|integer'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                $validated['time_ids'] = Helper::implode($request['time_ids']);

                if ($request->file('image')) {
                    $path = 'tour';
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }
                if ($request->file('banner_img')) {
                    $path = 'tour';
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, $path);
                }
                $validated['random_id'] = resolve('snowflake')->id();
                $validated['type'] = 'Safari';

                Tour::create($validated);
    
                return response()->json(['success' => "Safari Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Safari',
                'action' => url('admin/safaris/store'),
                'time' => Time::order()->get(),
                'locations' => Location::order()->get()
            ];
            return view('admin.pages.Safari.create',$this->outputData);

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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    'time_ids' => 'required|array',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
                    'safari_sequence' => 'required|integer',
                    'location_id' => 'required|integer'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                $validated['time_ids'] = Helper::implode($request['time_ids']);

                if ($request->file('image')) {
                    $path = 'tour';
                    $validated['image'] = Helper::uploadFile($request->image, $path);
                }
                if ($request->file('banner_img')) {
                    $path = 'tour';
                    $validated['banner_img'] = Helper::uploadFile($request->banner_img, $path);
                }
                
                Tour::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Safari Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Safari',
                'action' => url('admin/safaris/update/'.$id),
                'objData' => Tour::findOrFail($id),
                'time' => Time::order()->get(),
                'locations' => Location::order()->get()
            ];
            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );
            
            return view('admin.pages.safari.create',$this->outputData);

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

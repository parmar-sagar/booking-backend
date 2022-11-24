<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Handlers\Error;
use App\Helpers\Helper;
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
                $datas = Tour::type('Tour')->order()->get();
    
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
                
                Tour::create($validated);
    
                return response()->json(['success' => "Tour Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Tour',
                'action' => url('admin/tours/store'),
                'time' => Time::orderBy('id','DESC')->get(),
                'locations' => Location::orderBy('id','DESC')->get()
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
                    'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:100',
                    'description' => 'required|string',
                    'time_ids' => 'required|array',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'banner_img' => 'mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
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
    
                return response()->json(['success' => "Tour Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Tour',
                'action' => url('admin/tours/update/'.$id),
                'objData' => Tour::findOrFail($id),
                'time' => Time::order()->get(),
                'locations' => Location::order()->get()
            ];
            $this->outputData['selctdTime'] = Helper::explode( $this->outputData['objData']->time_ids );

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

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
use App\Models\TourGallary;
use DataTables;

class TourController extends Controller{

    const ControllerCode = "T_";
    
    public $outputData = [];

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
                $datas = Tour::tour()->order()->get();
    
                return DataTables::of($datas)->toJson();;
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function genrateVoucher(){

        $code1 = strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(10, 99));
        $code2 = strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(10, 99));
        $code3 = strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(10, 99));
        $code4 = strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(10, 99));
        $voucherCode = $code1.'-'.$code2.'-'.$code3.'-'.$code4;
        $SecurityCode = $code4.$code2;
        return response()->json(['voucherCode'=>$voucherCode,'securityCode' => $SecurityCode]);
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
                $validated['sequence'] = (($validated['sequence'])) ?? 0;
                $validated['voucher_status'] = $request['voucher_status'];
                $validated['voucher_expiry_date'] = $request['voucher_expiry_date'];
                $validated['voucher'] = $request['voucher'];
                $validated['security_code'] = $request['security_code'];

                $lastId = Tour::create($validated);

                $tourId = $lastId->id;
                if(!empty($request->gallry_images)){    
                    if ($request->hasfile('gallry_images')) {
                        $images = $request->file('gallry_images');
                        foreach($images as $glryImages) {
                            $path = 'gallry_images';
                            $gimages = Helper::uploadFile($glryImages, $path); 
                            $multipleImages = new TourGallary();
                            $multipleImages->fill([
                                'tour_id'=>$tourId,
                                'gallry_images' => $gimages,
                            ])->save();
                        }
                    }
                }
    
                return response()->json(['success' => "Tour Created successfully."]);
            }

            $times = Time::order()->get();
            $locations = Location::order()->get();
            $safetyGears = VehicleInfo::safetyGear()->order()->get();
            $refreshments = VehicleInfo::refreshment()->order()->get();
            
            $this->outputData = [
                'pageName' => 'New Tour',
                'action' => url('admin/tours/store'),
                'times' => $times,
                'locations' => $locations,
                'safetyGears' => $safetyGears,
                'refreshments' => $refreshments,
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
                
                $validated['sequence'] = (($validated['sequence'])) ?? 0;
                $validated['voucher_status'] = $request['voucher_status'];
                $validated['voucher_expiry_date'] = $request['voucher_expiry_date'];
                $validated['voucher'] = $request['voucher'];
                $validated['security_code'] = $request['security_code'];

                Tour::find($validated['id'])->update($validated);

                if(!empty($request->gallry_images)){    
                    if ($request->hasfile('gallry_images')) {

                        TourGallary::where('tour_id',$validated['id'])->delete();

                        $images = $request->file('gallry_images');

                        foreach($images as $glryImages) {
                            $path = 'gallry_images';
                            $gimages = Helper::uploadFile($glryImages, $path); 
                            $multipleImages = new TourGallary();

                            $multipleImages->fill(['tour_id'=>$validated['id'],
                                                   'gallry_images' => $gimages,
                            ])->save();
                        }
                    }
                }
    
                return response()->json(['success' => "Tour Updated successfully."]);
            }

            $times = Time::order()->get();
            $locations = Location::order()->get();
            $safetyGears = VehicleInfo::safetyGear()->order()->get();
            $refreshments = VehicleInfo::refreshment()->order()->get();
            $gallaryImages = TourGallary::where('tour_id',$id)->get();

            $objData = Tour::findOrFail($id);
            $times = Time::order()->get();
            $locations = Location::order()->get();
            $safetyGears = VehicleInfo::safetyGear()->order()->get();
            $refreshments = VehicleInfo::refreshment()->order()->get();
            

            $objData->time_ids = Helper::explode( $objData->time_ids );
            $objData->safety_gear_ids = Helper::explode( $objData->safety_gear_ids );
            $objData->refreshments_ids = Helper::explode( $objData->refreshments_ids );

            $this->outputData = [
                'pageName' => 'Edit Tour',
                'action' => url('admin/tours/update/'.$id),
                'objData' => $objData,
                'times' => $times,
                'locations' => $locations,
                'safetyGears' => $safetyGears,
                'refreshments' => $refreshments,
                'gallaryImages' => $gallaryImages
            ];
            
            return view('admin.pages.tour.create',$this->outputData);

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

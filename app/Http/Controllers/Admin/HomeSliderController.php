<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Handlers\Error;
use App\Helpers\Helper;

use DataTables;

class HomeSliderController extends Controller
{
    const ControllerCode = "HS_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Home Sliders',
            'dataTables' => url('admin/home/sliders/datatable'),
            'delete' => url('admin/home/sliders/delete'),
            'create' => url('admin/home/sliders/create'),
            'edit' => url('admin/home/sliders/edit')
        ];
        
        return view('admin.pages.home_slider.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Slider::order()->get();
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

                $imageVdo = 'mimes:jpeg,jpg,png,gif';
                if($Input['type'] == 2){
                    $imageVdo = 'mimes:mp4,mov,ogg';
                }
                
                // Validation section
                $validator = Validator::make($Input, [
                    'sequence' => 'nullable|integer',
                    'status' => 'required|in:1,0',
                    'image_video' => 'required|'.$imageVdo,
                    'type' => 'required|in:1,2',
                    'link' => 'nullable'
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
 
                $validated = $validator->validated();

                if ($request->file('image_video')) {
                    $path = 'slider';
                    $validated['image_video'] = Helper::uploadFile($request->image_video, $path);
                }
                $validated['sequence'] = (($validated['sequence'])) ?? 0;
                Slider::create($validated);    
                return response()->json(['success' => "Home slider Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Home Sliders',
                'action' => url('admin/home/sliders/store'),
            ];
            return view('admin.pages.home_slider.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
    
    public function edit(Request $request,$id){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();

                $imageVdo = 'mimes:jpeg,jpg,png,gif';
                if($Input['type'] == 2){
                    $imageVdo = 'mimes:mp4,mov,ogg';
                }
                
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:sliders',
                    'sequence' => 'nullable|integer',
                    'status' => 'required|in:1,0',
                    'image_video' => 'nullable|'.$imageVdo,
                    'type' => 'required|in:1,2',
                    'link' => 'nullable'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                if ($request->file('image_video')) {
                    $path = 'slider';
                    $validated['image_video'] = Helper::uploadFile($request->image_video, $path);
                }

                $validated['sequence'] = (($validated['sequence'])) ?? 0;
                Slider::find($validated['id'])->update($validated);
                return response()->json(['success' => "Home Slider Updated successfully."]);
            }

            $objData = Slider::findOrFail($id);

            $this->outputData = [
                'pageName' => 'Edit Home Sliders',
                'action' => url('admin/home/sliders/update/'.$id),
                'objData' => $objData,
            ];
            return view('admin.pages.home_slider.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            Slider::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

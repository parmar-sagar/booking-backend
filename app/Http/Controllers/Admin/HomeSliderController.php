<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\HomeSlider;
use DataTables;

class HomeSliderController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Home Sliders',
            'dataTables' => url('admin/home-sliders/datatable'),
            'delete' => url('admin/home-sliders/delete'),
            'create' => url('admin/home-sliders/create'),
            'edit' => url('admin/home-sliders/edit')
        ];
        
        return view('admin.pages.home_slider.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = HomeSlider::orderBy('id','DESC')->get();
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
                    'sequence' => 'required|integer',
                    'status' => 'required|in:1,0',
                    'image' => 'required|mimes:jpeg,jpg,png,gif,webm,mp4,mpeg|max:4096',
                    'video' => 'mimes:mp4,mov,ogg'

                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
 
                $validated = $validator->validated();
                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('admin/uploads/slider'), $validated['image']);
                }
                if ($request->file('video')) {
                    $validated['video'] = time().'.'.$request->video->extension();  
                    $request->video->move(public_path('admin/uploads/slider'), $validated['video']);
                }

                $validated['link'] = $request->link;
                HomeSlider::create($validated);
    
                return response()->json(['success' => "Home slider Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Home Sliders',
                'action' => url('admin/home-sliders/store'),
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
                
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:home_sliders',
                    'sequence' => 'required|integer',
                    'status' => 'required|in:1,0',
                    'image' => 'mimes:jpeg,jpg,png,gif',
                    'video' => 'mimes:mp4,mov,ogg'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('admin/uploads/slider'), $validated['image']);
                }
                if ($request->file('video')) {
                    $validated['video'] = time().'.'.$request->video->extension();  
                    $request->video->move(public_path('admin/uploads/slider'), $validated['video']);
                }

                $validated['link'] = $request->link;
                HomeSlider::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Home Slider Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Home Sliders',
                'action' => url('admin/home-sliders/update/'.$id),
                'objData' => HomeSlider::findOrFail($id),
            ];
            return view('admin.pages.home_slider.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = HomeSlider::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

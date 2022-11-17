<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Tour;
use App\Models\Time;
use DataTables;


class DealsController extends Controller
{
    const ControllerCode = "D_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Deals',
            'dataTables' => url('admin/deals/datatable'),
            'delete' => url('admin/deals/delete'),
            'create' => url('admin/deals/create'),
            'edit' => url('admin/deals/edit')
        ];
        
        return view('admin.pages.deals.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Tour::orderBy('id','DESC')->where('is_deals', '=', 1)->get();
    
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
                    'status' => 'required|in:1,0',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                if(isset($request['time_ids']) && !empty($request['time_ids'])){
                    $validated['time_ids']=implode(',',$request['time_ids']);
                }

                $validated['image'] = time().'.'.$request->image->extension();  
                $request->image->move(public_path('admin/uploads/tours'), $validated['image']);

                $validated['banner_img'] = time().'.'.$request->banner_img->extension();  
                $request->banner_img->move(public_path('admin/uploads/tours'), $validated['banner_img']);

                $validated['is_deals'] = 1;
                
                Tour::create($validated);
    
                return response()->json(['success' => "Deals Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Deals',
                'action' => url('admin/deals/store'),
                'time' => Time::orderBy('id','DESC')->get()
            ];
            return view('admin.pages.deals.create',$this->outputData);

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
                    'status' => 'required|in:1,0',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                if(isset($request['time_ids']) && !empty($request['time_ids'])){
                    $validated['time_ids']=implode(',',$request['time_ids']);
                }
    
                if ($request->file('image')) {
                    $validated['image'] = time().'.'.$request->image->extension();  
                    $request->image->move(public_path('admin/uploads/tours'), $validated['image']);
                    }
                if ($request->file('banner_img')) {
                $validated['banner_img'] = time().'.'.$request->banner_img->extension();  
                $request->banner_img->move(public_path('admin/uploads/tours'), $validated['banner_img']);
                }

                Tour::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Deals Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Deals',
                'action' => url('admin/deals/update/'.$id),
                'objData' => Tour::findOrFail($id),
                'time' => Time::orderBy('id','DESC')->get(),
            ];
            $time = $this->outputData['objData']->time_ids;
            $timeIds=explode(',',$time);
            $this->outputData['selctdTime'] = $timeIds;
            return view('admin.pages.deals.create',$this->outputData);

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

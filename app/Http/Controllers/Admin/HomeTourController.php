<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Tour;
use DataTables;

class HomeTourController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Home Tours',
            'dataTables' => url('admin/home-tours/datatable'),
            'delete' => url('admin/home-tours/delete'),
            'create' => url('admin/home-tours/create'),
            'edit' => url('admin/home-tours/edit')
        ];
        
        return view('admin.pages.home_tour.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Tour::orderBy('id','DESC')->where('on_home','=',1)->get();
    
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
                    'tourId' => 'required',
                    'on_home_sequence' => 'required|integer',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();
                $validated['on_home'] = 1; 
                Tour::find($validated['tourId'])->update($validated);
    
                return response()->json(['success' => "Home Tour Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Home Tour',
                'action' => url('admin/home-tours/store'),
                'tourName' => Tour::orderBy('id','DESC')->select('name','id')->where('on_home','=',0)->get()
            ];
            return view('admin.pages.home_tour.create',$this->outputData);

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
                    'tourId' => 'required',
                    'on_home_sequence' => 'required|integer',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $editHome['on_home'] = 0; 
                $editHome['on_home_sequence'] = 0; 
                Tour::find($validated['id'])->update($editHome);
                $validated['on_home'] = 1; 
                Tour::find($validated['tourId'])->update($validated);
    
                return response()->json(['success' => "Home Tour Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Home Tour',
                'action' => url('admin/home-tours/update/'.$id),
                'objData' => Tour::findOrFail($id),
                'tourName' => Tour::orderBy('id','DESC')->select('name','id')->get()
            ];
            return view('admin.pages.home_tour.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $onHome['on_home'] = 0; 
            $res = Tour::find($id)->update($onHome);   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

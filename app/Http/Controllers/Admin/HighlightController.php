<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\VehInfo;
use DataTables;

class HighlightController extends Controller
{
    const ControllerCode = "H_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Highlight',
            'dataTables' => url('admin/highlight/datatable'),
            'delete' => url('admin/highlight/delete'),
            'create' => url('admin/highlight/create'),
            'edit' => url('admin/highlight/edit')
        ];
        
        return view('admin.pages.highlight.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = VehInfo::orderBy('id','DESC')->where('type','=','1')->get();
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
                    'title' => 'required|string|min:5|unique:veh_infos',
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 1;
                VehInfo::create($validated);
    
                return response()->json(['success' => "Highlight Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Highlight',
                'action' => url('admin/highlight/store'),
            ];
            return view('admin.pages.highlight.create',$this->outputData);

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
                    'id' => 'required|exists:veh_infos',
                    'title' => 'required|string|min:5|unique:veh_infos,title,'.$id,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['type'] = 1;
                VehInfo::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "highlight Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Include',
                'action' => url('admin/highlight/update/'.$id),
                'objData' => VehInfo::findOrFail($id),
            ];
            return view('admin.pages.include.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = VehInclude::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

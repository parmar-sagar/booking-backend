<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Discount;
use DataTables;

class GroupController extends Controller
{
    const ControllerCode = "G_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Group Discount',
            'dataTables' => url('admin/group-discount/datatable'),
            'delete' => url('admin/group-discount/delete'),
            'create' => url('admin/group-discount/create'),
            'edit' => url('admin/group-discount/edit')
        ];
        
        return view('admin.pages.group.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Discount::order()->get();
    
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
                    'no_of_vehicle' => 'required|integer',
                    'discount' => 'required|integer'
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                
                Discount::create($validated);
    
                return response()->json(['success' => "Group Discount Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Group Discount',
                'action' => url('admin/group-discount/store'),
            ];
            return view('admin.pages.group.create',$this->outputData);

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
                    'id' => 'required|exists:discounts',
                    'no_of_vehicle' => 'required|integer',
                    'discount' => 'required|integer'

                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                Discount::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Group Discount Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit Group Discount',
                'action' => url('admin/group-discount/update/'.$id),
                'objData' => Discount::findOrFail($id),
            ];
            return view('admin.pages.group.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = Discount::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\Admin;
use DataTables;

class SupplierController extends Controller
{
    const ControllerCode = "SUP_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'Suppliers',
            'dataTables' => url('admin/suppliers/datatable'),
            'delete' => url('admin/suppliers/delete'),
            'create' => url('admin/suppliers/create'),
            'edit' => url('admin/suppliers/edit')
        ];
        return view('admin.pages.supplier.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = Admin::where('is_admin',0)->orderBy('id','DESC')->get();
    
                return DataTables::of($datas)
                                    ->addColumn('created_at',function(Admin $data){
                                        return date('d M Y H:i:s',strtotime($data->created_at));
                                    })
                                    ->rawColumns(['created_at'])
                                    ->toJson();
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
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:admins',
                    'status' => 'required|in:0,1',
                    'password' => 'required|string|max:20',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
    
                $validated['password'] = Hash::make($validated['password']);
                
                Admin::create($validated);
    
                return response()->json(['success' => "Supplier Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New Supplier',
                'action' => url('admin/suppliers/store')
            ];
            return view('admin.pages.supplier.create',$this->outputData);

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
                    'id' => 'required|exists:admins',
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:admins,email,'.$id,
                    'status' => 'required|in:0,1',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                
                Admin::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Supplier Updated successfully."]);
            }

            $objAdmin = Admin::findOrFail($id);

            $this->outputData = [
                'pageName' => 'Edit Supplier',
                'action' => url('admin/suppliers/update/'.$id),
                'objData' => $objAdmin
            ];
            return view('admin.pages.supplier.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            Admin::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

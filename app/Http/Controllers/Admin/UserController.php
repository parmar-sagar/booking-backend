<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\User;
use DataTables;

class UserController extends Controller{

    const ControllerCode = "U_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'Users',
            'dataTables' => url('admin/users/datatable'),
            'delete' => url('admin/users/delete'),
            'create' => url('admin/users/create'),
            'edit' => url('admin/users/edit')
        ];
        
        return view('admin.pages.user.index',$this->outputData);
    }

    public function datatable(Request $request){
        try {
            if ($request->ajax()) {
                $datas = User::orderBy('id','DESC')->get();
    
                return DataTables::of($datas)
                                    ->addColumn('created_at',function(User $data){
                                        return date('d M Y H:i:s',strtotime($data->created_at));
                                    })
                                    ->rawColumns(['created_at'])
                                    ->toJson();;
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
                    'email' => 'required|max:100|email:rfc,dns|unique:users',
                    'mobile' => 'required|string|min:10|max:12',
                    'photo' => 'required|mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
                    'password' => 'required|string|max:20',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
    
                $validated['password'] = Hash::make($validated['password']);

                if ($request->file('photo')) {
                    $path = 'users';
                    $validated['photo'] = Helper::uploadFile($request->photo, $path);
                }
                
                User::create($validated);
    
                return response()->json(['success' => "User Created successfully."]);
            }
            $this->outputData = [
                'pageName' => 'New User',
                'action' => url('admin/users/store')
            ];
            return view('admin.pages.user.create',$this->outputData);

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
                    'id' => 'required|exists:users',
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:users,email,'.$id,
                    'mobile' => 'required|string||min:10|max:12',
                    'photo' => 'mimes:jpeg,jpg,png,gif',
                    'status' => 'required|in:0,1',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
    
                if ($request->file('photo')) {
                    $path = 'users';
                    $validated['photo'] = Helper::uploadFile($request->photo, $path);
                }
                
                User::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "User Updated successfully."]);
            }
            $this->outputData = [
                'pageName' => 'Edit User',
                'action' => url('admin/users/update/'.$id),
                'objData' => User::findOrFail($id)
            ];
            return view('admin.pages.user.create',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function destroy($id){
        try {
            $res = User::find($id)->delete();   
            return response()->json(true);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '04');
        }
    }
}

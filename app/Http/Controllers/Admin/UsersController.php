<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DataTables;
use Validator;

class UsersController extends Controller
{

    public function __construct(){
        $this->outputData = array();
    }

    public function index(){
        $this->outputData['pageName'] = 'Users';
        $this->outputData['datatable'] = url('admin/datatables');
        $this->outputData['create']=url('admin/create');
        $this->outputData['delete'] = url('admin/delete');
        $this->outputData['edit'] = url('admin/edit');
        return view('admin.pages.users.index',$this->outputData);
    }

    public function datatable(){
        $datas = User::get();
        return DataTables::of($datas)->toJson();
    }

    public function create(Request $request){
        if ($request->method() == 'POST') {
        //Validation Section
            $rules = [
                'name' => 'required|string|min:4|max:191',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('error' => $validator->getMessageBag()->first()));
            }
             User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'mobile' => $request['mobile'],
                'password' => Hash::make($request['password']),
            ]);
            $msg = 'User Added.';
            return response()->json($msg);
        }
        $this->outputData['pageName']="New Users";
        $this->outputData['action'] = url('admin/store');
        return view('admin.pages.users.create',$this->outputData);
    }

    public function edit(Request $request, $id){
        if($request->method()=="POST"){
           if(empty($request['status'])){
            $status='INACTIVE';
        }else{
            $status=$request['status'];
        }
          
       // validation
           $rules =[
                'name' => 'required|string|min:4|max:191',
                'email' => ['required', 'string', 'email', 'max:255'],
           ];
   
           $validator = Validator::make($request->all(),$rules);
           if($validator->fails()){
               return response()->toJson(array('error'=>$validator->getMessageBag()->first()));
           }
           $objUsers=User::findOrFail($id);
           $objUsers->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            ])->save();
           $msg ="User Updated";
           return response()->json($msg);
   
        }
           $this->outputData['PageName']="Edit User";
           $this->outputData['action'] = url('users/update/'.$id);
           $this->outputData['ObjData'] = User::findOrFail($id);
           $this->outputData['ObjPass'] = bcrypt($this->outputData['ObjData']->password);
           return view('admin.pages.users.create',$this->outputData); 
   
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        $msg = "User Deleted";
        return response()->json($msg);
    }
}

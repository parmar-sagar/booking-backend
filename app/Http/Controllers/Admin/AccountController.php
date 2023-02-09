<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller{

    const ControllerCode = "AC_";

    public $outputData = [];

    public function index(){
        $this->outputData = [
            'pageName' => 'My Account',
            'action' => url('admin/account/update'),
            'action2' => url('admin/account/update-password')
        ];
        
        return view('admin.pages.account.index',$this->outputData);
    }

    public function update(Request $request){
        try {
            $Input = $request->all();
            $id = Auth::user()->id;
            // Validation section
            $validator = Validator::make($Input, [
                'name' => 'required|regex:/^[a-zA-Z0-9_\- ]*$/|max:50',
                'email' => 'required|max:100|unique:users,email,'.$id,
            ]);

            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            
            $validated = $validator->validated();

            $user = Admin::where('id',$id)->update($validated);

            return response()->json(['success' => "User Updated successfully."]);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function updatePassword(Request $request){
        try {
            $Input = $request->all();
            
            // Validation section
            $validator = Validator::make($Input, [
                'confirm_password' => 'required',
                'password' => 'required_with:confirm_password|same:confirm_password',
            ]);

            if($validator->fails()){
                throw new \Exception($validator->errors()->first());
            }
            
            $validated = $validator->validated();

            $user = Admin::where('id',Auth::user()->id)->update([
                'password' => Hash::make($validated['password'])
            ]);

            return response()->json(['success' => "Password successfully changed."]);
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }

}
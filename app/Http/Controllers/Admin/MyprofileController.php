<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Models\Admin;


class MyprofileController extends Controller
{
    const ControllerCode = "M_";

    function __construct(){
        $this->outputData = [];
    }

    public function index(){
        $this->outputData = [
            'pageName' => 'My Profile',
            'edit' => url('admin/my-profile/update'),
            'password' => url('admin/my-profile/edit-password'),
        ];
        
        return view('admin.pages.my_profile.index',$this->outputData);
    }
    public function edit(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:admins',
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:users,email,'.$Input['id'],
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                Admin::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Profile Updated successfully."]);
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }

    public function edit_password(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                // Validation section
                $validator = Validator::make($Input, [
                    'id' => 'required|exists:admins',
                    'password' => 'required|string|max:20|min:6',
                    'confirm' => 'required_with:password|same:password|min:6'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();
                $validated['password'] = Hash::make($validated['password']);

                Admin::find($validated['id'])->update($validated);
    
                return response()->json(['success' => "Profile Password Updated successfully."]);
            }
            $this->outputData = [
                'action' => url('admin/my-profile/update-password'),
            ];
            return view('admin.pages.my_profile.update_password',$this->outputData);

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '03');
        }
    }
}

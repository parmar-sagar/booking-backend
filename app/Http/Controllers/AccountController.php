<?php

namespace App\Http\Controllers;

use App\Handlers\Error;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller{

    const ControllerCode = "AC_";
    public $outputData = [];

    public function account(Request $request){
        try {
            if($request->method() == 'POST'){

                $Input = $request->all();
                // Validation section
                $userId = Auth::user()->id;
                $validator = Validator::make($Input, [
                    'first_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'last_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'mobile' => 'required|integer|min:10|',
                    'email' => 'required|max:100|email:rfc,dns|unique:users,email,'.$userId,
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                User::find($userId)->update($validated);
    
                return response()->json(['success' => "Profile Updated successfully."]);
            }else{
                return view('front.pages.account.index');
            }
        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '01');
        }
    }

    public function password(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();

                // Validation section
                $validator = Validator::make($Input, [
                    'password' => 'required|string|max:20|min:6',
                    'confrim_password' => 'required_with:password|same:password|min:6'
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $userId = Auth::user()->id;
                
                $validated = $validator->validated();
                $validated['password'] = Hash::make($validated['password']);

                User::find($userId)->update($validated);
    
                return response()->json(['success' => "Profile Password Updated successfully."]);
            }else{
                return view('front.pages.account.password');
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Http\Request;
use App\Handlers\Error;
use App\Helpers\Helper;
use App\Models\User;
use App\Mail\RegisterUser;
use Mail;
use DataTables;

class PaymentController extends Controller
{
    const ControllerCode = "PY_";
    public $outputData = [];

    public function payment(Request $request){
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                
                // Validation section
                $validator = Validator::make($Input, [
                    'first_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'last_name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns|unique:users',
                    'number' => 'required|string|max:12',
                ]);
    
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                $validated = $validator->validated();

                $snowflake = new \Godruoyi\Snowflake\Snowflake;
                $validated['random_id'] = $snowflake->id();

                $pass1 = substr($validated['first_name'], 0, 3);
                $pass2 = substr($validated['last_name'], 0, 2);
                $pass3 = rand(100,1000);
                $password = "Admin@123";
                   
                $validated['password'] = Hash::make($password);
                // $data = ['name' => 'sam', 'data'=>'hello'];
                // $user['to'] = 'sandyjamwal292@gmail.com';
                // $mail =Mail::send('mail',$data,function($messages) use($user){
                //     $messages->to($user['to']);
                //     $messages->subject('Hello');

                // });
                // if($mail){
                //     return response()->json(['success' => "Mail send successfully."]);
                // }
                User::create($validated);
    
                // return response()->json(['success' => "User Created successfully."]);
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
}

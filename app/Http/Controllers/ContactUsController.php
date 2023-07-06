<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Handlers\Error;
use App\Models\ContactUs;
use App\Models\SupplierInterest;
use App\Mail\ContactUsMail;
use App\Mail\SupplierInterestMail;
use App\Mail\AdminNotificationMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    const ControllerCode = "CU_";

    public function contactUs(Request $request){

        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                
                // Validation section
                $validator = Validator::make($Input, [
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns',
                    'message' => 'required|string|max:500'
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                ContactUs::create($validated);
                Mail::to($validated['email'])->send(new ContactUsMail());
    
                return response()->json(['success' => "Thanks For Contacting Us."]);
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
    
     public function submitSupplier(Request $request){
       
        try {
            if($request->method() == 'POST'){
                $Input = $request->all();
                
                // Validation section
                $validator = Validator::make($Input, [
                    'name' => 'required|string|regex:/^[a-zA-Z_\- ]*$/|min:3|max:50',
                    'email' => 'required|max:100|email:rfc,dns',
                    'supp_msg' => 'required|string|max:500'
                ]);
                  
                if($validator->fails()){
                    throw new \Exception($validator->errors()->first());
                }
                
                $validated = $validator->validated();

                SupplierInterest::create($validated);
                Mail::to($validated['email'])->send(new SupplierInterestMail());
                Mail::to('quadsdubai@gmail.com')->send(new AdminNotificationMail($validated));
                
                return response()->json(['success' => "Thanks for showing your interest, One of our team members will be in touch with you shortly "]);
            }

        } catch (\Throwable $e) {
            return Error::Handle($e, self::ControllerCode, '02');
        }
    }
}

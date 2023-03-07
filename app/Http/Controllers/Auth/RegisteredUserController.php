<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Godruoyi\Snowflake\Snowflake;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use App\Mail\SupplierRegister;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {        
        if($request->method() == 'POST'){
            $Input = $request->all();

            $validator = Validator::make($Input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'number' => ['required', 'string', 'min:10', 'max:12'],

        ]);
        if($validator->fails()){
            throw new \Exception($validator->errors()->first());
        }
        $validated = $validator->validated();

        $validated['password'] = Hash::make($validated['password']);

        // $snowflake = new \Godruoyi\Snowflake\Snowflake;
        // $validated['random_id'] = $snowflake->id();
        Admin::create($validated);
        $data = [
            'url' => "http://127.0.0.1:8000/admin/login"
        ];
        Mail::to($validated['email'])->send(new SupplierRegister($data));
        return response()->json(['success' => "Thanks for Registration Please check your email"]);
        }

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}

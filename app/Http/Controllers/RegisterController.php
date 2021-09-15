<?php

namespace App\Http\Controllers;

use App\Models\OtpManage;
use App\Models\Register;
use App\Models\Registers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use CreateRegistersTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{

    //function to display the main registeration page
    public function create() {
        return view('register.create');
    }


    //function to diplay the otp and the password page
    public function verify() {
        return view('register.otpverify');
    }


    //function to store the data
    public function store() {

        //take request data and validate them
        $attributes = request()->validate([
            'name' => 'required|min:5|max:60|regex:/^[\pL\s]+$/u',
            'email' => 'bail|required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255|unique:users,email',
            'phone' => 'required|digits:10|unique:users,phone'
        ]);
        
        $attributes['created_at'] = now();

        //sets 6 digit otp 
        $otp = rand(100000,999999);
        //feeds the otp to other variable for mailing
        $data = ['data'=>$otp];
        
        //set the reciptant email address
        $user['to']=$attributes['email'];

        //sending mail using the mail facade
        Mail::send('email.otp',$data,function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('Otp to Register'); 
        });

        
        //create register record 
        $register = Register::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'phone' => $attributes['phone'],
            'otp' => $otp,
            'created_at' => $attributes['created_at']
        ]);

        //create otp record
        $otptab = OtpManage::create([
            'otp' => $otp,
            'register_id' => $register->id,
            'created_at' => now()
        ]);

        
        //put session value to check at verify page
        session()->put('verify','newuser');
        //redirect to otp verify and password get page
        return redirect('createpassword');
    }

    


    //function to get the otp and password and create user record
    public function getverify() {

        //get request data and validate them
        $attributes = request()->validate([
            'otp' => 'required|exists:otp_manages,otp|digits:6',
            'password' => 'required|min:6|max:20',
            'confirm_passowrd' => 'required|min:6|max:20'
        ]);

        if($attributes['password'] != $attributes['confirm_passowrd']) {
            throw ValidationException::withMessages([
                'password' => 'The Passoword and Confirm Password does not match'
            ]);
        }

        //fetching record from otp manage table
        $verify = OtpManage::where('otp',$attributes['otp'])->first();
        
        
        if(!$verify) {
            throw ValidationException::withMessages([
                'otp' => 'The provided otp does not matched'
            ]);
        }

        //fetching record of registerer where the otp matches
        $register = Register::where('id',$verify->register_id)->first();


        //if the record doesn't match in register table throw exception
        if($register->otp != $attributes['otp']) {
            throw ValidationException::withMessages([
                'otp' => 'The provided otp does not matched'
            ]);
        }

        //encrypting the password with password hash function bcrypt()
        $password = bcrypt($attributes['password']);


        //adding values to user table
        $newuser = User::create([
            'name' => $register->name,
            'email' => $register->email,
            'phone' => $register->phone,
            'password' => $password,
            'created_at' => now()
        ]);

        //deleteing record from register and otp table
        $register = Register::find($register->id)->delete();
        $verify = OtpManage::find($verify->id)->delete();
        session()->forget('verify');
        Auth::login($newuser);
        
        return redirect('/')->with('success', 'Welcome !');

    }

    
}

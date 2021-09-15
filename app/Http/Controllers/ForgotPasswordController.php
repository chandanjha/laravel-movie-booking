<?php

namespace App\Http\Controllers;

use App\Models\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    //returns view to forgot page
    public function forgot() {
        return view('sessions.forgot');
    }

    //sends mail and resets page
    public function passreset() {

        //validate the input
        $forgotUser = request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $otp = rand(100000,999999);

        $user = User::where('email',$forgotUser['email'])->first();

        $user->update([
            'otp' => $otp
        ]);

        $forgotRecord = ForgotPassword::create([
            'email' => $forgotUser['email'],
            'otp' => $otp,
            'created_at' => now()
        ]);

        //feeds the otp to other variable for mailing
        $data = ['data'=>$otp];

        //set the reciptant email address
        $receiver['to']=$forgotUser['email'];

        //sending mail using the mail facade
        Mail::send('email.forgot',$data,function($messages) use ($receiver){
            $messages->to($receiver['to']);
            $messages->subject('Otp to Reset Password'); 
        });


        //put session value to check at verify page
        session()->put('verify','newuser');
        //redirect to otp verify and password get page
        return redirect('newpassword');
    }



    //function to diplay the otp and the password page
    public function verify() {
        
        return view('sessions.otpverify');
    }



    //function to check otp
    public function getverify() {
        $oldUser = request()->validate([
            'otp' => 'required|exists:forgot_passwords,otp|digits:6',
            'password' => 'required|min:6|max:20',
            'confirm_passowrd' => 'required|min:6|max:20'
        ]);

        if($oldUser['password'] != $oldUser['confirm_passowrd']) {
            throw ValidationException::withMessages([
                'password' => 'The Passoword and Confirm Password does not match'
            ]);
        }


        $verify = ForgotPassword::where('otp',$oldUser['otp'])->first();

        if(!$verify) {
            throw ValidationException::withMessages([
                'otp' => 'The provided otp does not matched'
            ]);
        }

        $user = User::where('email',$verify->email)->first();


        //validation error id otp not matches
        if($user->otp != $oldUser['otp'])
        {
            throw ValidationException::withMessages([
                'otp' => 'The provided otp does not matched'
            ]);
        }

        //encrypts the password
        $password = bcrypt($oldUser['password']);

        $user->update([
            'otp' => null,
            'password' => $password
        ]);

        $verify->delete();
        session()->forget('verify');
        return redirect('login');

    }
}

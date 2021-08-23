<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    //function to redirect to login lpage
    public function create() {
        return view('sessions.create');
    }

    //function tp check entry and login
    public function store() {

        //validate record
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);

        $rem = request(['remember_me']);
        $remember_me  = (!empty($rem['remember_me']))? TRUE : FALSE;
        
        //login 
        $user = Auth::attempt($attributes);

        if(!$user) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }
        else {

            if($remember_me)
            {
                setcookie('login_email',$attributes['email'],time()+60*60*24*365*10);
                setcookie('login_password',$attributes['password'],time()+60*60*24*365*10);
            }
            else
            {
                setcookie('login_email',$attributes['email'],100);
                setcookie('login_password',$attributes['password'],100);
            }   

            if(auth()->user()->user_role == 'admin')
            {
                //if user role is admin redirct to admin home
                return redirect('/admin_index')->with('success', 'Welcome Back!');
            }
            else {

                //if role is cnsumer redirect to consumer home page
                return redirect('/')->with('success', 'Welcome Back!');
            }
        }

        
    }


    //function tp logout
    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

}

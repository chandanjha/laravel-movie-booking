<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'password' => 'required'
        ]);

        //login 
        $user = auth()->attempt($attributes);

        if(!$user) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }
        else {
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
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

}

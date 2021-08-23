<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    //function to redirect to view all users 
    public function index() {
        
        return view('admin.users', [
            'users' => User::all()
        ]);   
    }


    //function to redirect to add record
    public function create() {
        return view('admin.createuser');
    }


    //function to add user
    public function adduser() {
        $attributes = request()->validate([
            'name' => 'required|min:5|max:60|regex:/[a-zA-Z\s]+/',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
            'phone' => 'required|digits:10|unique:users,phone',
            'user_role' => 'required' 
        ]);

        echo $attributes['password'] . "<br>";

        $attributes['password'] = bcrypt($attributes['password']);

        $attributes['created_at'] = Carbon::now();
        $newuser = User::create($attributes);

        return redirect('/allusers');
    }



    //function to view edit page
    public function edituser($id) {
        $editUser = User::find($id);

        return view('admin.edituser', [
            'user' => $editUser
        ]);
    }



    //function to update record
    public function updateuser($id) {
        //find user with id
        $oldUser = User::find($id);
        $attributes = request()->validate([
            'name' => 'required|min:5|max:60|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10', 
            'user_role' => 'required' 
        ]);

        $checkDuplicateEmail = User::where('email',$attributes['email'])
        ->where('id','!=',$oldUser->id)->get();

        if(count($checkDuplicateEmail) > 0)
        {
            throw ValidationException::withMessages([
                'email' => 'Email already exits'
            ]);
        }

        $checkDuplicatePhone = User::where('phone',$attributes['phone'])
        ->where('id','!=',$oldUser->id)->get();

        if(count($checkDuplicatePhone) > 0)
        {
            throw ValidationException::withMessages([
                'phone' => 'Phone Number already exits'
            ]);
        }

        $oldUser->update($attributes);

        return redirect('/allusers');
        
    }


    //function to delete user
    public function deleteuser($id) {
        $deleteUser = User::find($id)->delete();
        return redirect('/allusers');
    }


    //function to view profile
    public function viewProfile() 
    {
        $id =  auth()->user()->id;
        $user = User::find($id);
        return view('admin.myprofile', [
            'user' => $user
        ]);
    }


    //function to edit password of my prfile
    public function editPassword($id) {
        $oldUser = User::find($id);
        //validate record
        $attributes = request()->validate([
            'current_password' => 'required|min:6|max:20', 
            'new_password' => 'required|min:6|max:20',
            'confirm_password' => 'required|min:6|max:20'
        ]);
        
        if($attributes['current_password'] == $attributes['new_password'])
        {
            throw ValidationException::withMessages([
                'current_password' => 'The current password and new passowrd match'
            ]);
        }

        //checking current password match
        $matchPassword = Hash::check($attributes['current_password'], $oldUser->password);

        if(!$matchPassword) {
            throw ValidationException::withMessages([
                'current_password' => 'Your provided passowrd does not match'
            ]);
        }

        //check if new password and confirm passowrd match
        if($attributes['new_password'] != $attributes['confirm_password']) {
            throw ValidationException::withMessages([
                'confirm_password' => 'new password and confirm password does not match'
            ]);
        }
        
        $attributes['new_password'] = bcrypt($attributes['new_password']);

        $oldUser->update([
            'password' => $attributes['new_password']
        ]);

        return redirect('/logout');
    }


    //function record of my profile
    public function editProfile($id) {
        $user = User::find($id);

        $attributes = request()->validate([
            'name' => 'required|min:5|max:60|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10' 
        ]);

        $checkDuplicateEmail = User::where('email',$attributes['email'])
        ->where('id','!=',$user->id)->get();

        if(count($checkDuplicateEmail) > 0)
        {
            throw ValidationException::withMessages([
                'email' => 'Email already exits'
            ]);
        }

        $checkDuplicatePhone = User::where('phone',$attributes['phone'])
        ->where('id','!=',$user->id)->get();

        if(count($checkDuplicatePhone) > 0)
        {
            throw ValidationException::withMessages([
                'phone' => 'Phone Number already exits'
            ]);
        }

        $user->update($attributes);

        return redirect('/myprofile');
    }
}



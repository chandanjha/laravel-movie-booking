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
            'name' => 'required|min:3|max:255',
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10|unique:users,phone', 
            'user_role' => 'required' 
        ]);

        

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
            'current_password' => 'required|min:7|max:255', 
            'new_password' => 'required|min:7|max:255',
            'confirm_password' => 'required|min:7|max:255'
        ]);
        
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10|unique:users,phone' 
        ]);

        $user->update($attributes);

        return redirect('/myprofile');
    }
}



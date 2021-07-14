<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\States;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TheaterController extends Controller
{

    //function to redirect to view al records 
    public function allTheater() {
        $cities = Cities::all();
        $states = States::all();
        return view('admin.theater.alltheaters', [
            'theaters' => Theater::with('states','cities')->get(),
            'cities' => $cities,
            'states' => $states
        ]);
    }


    //function to redirect to add theater page
    public function addTheater() {
        $states = States::all();
        return view('admin.theater.addtheater',[
            'states' => $states
        ]);
    }

    //function to redirect to add city page
    public function getCity(Request $request) {
        $data['cities'] = Cities::where("state_id",$request->state_id)->get(["name","id"]);
        $data['state'] = States::where("id",$request->state_id)->get(["name","id"]);
        $data['allstate'] = States::all();
        return response()->json($data);
    }


    //function to add record to the database
    public function createTheater() {

        //validate record
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required|max:255'
        ]);

        $attributes['created_at'] = now();

        $checkDuplicate = Theater::where('name', $attributes['name'])
        ->where('state_id', $attributes['state_id'])
        ->where('city_id', $attributes['city_id'])
        ->where('address', $attributes['address'])->get();

        if(count($checkDuplicate) > 0){
            throw ValidationException::withMessages([
                'name' => 'Allready exits'
            ]);
        }

        $addtheater = Theater::create($attributes);

        return redirect('/alltheater');
    }

    //function to delete record
    public function deleteTheater($id) {
        $deleteTheater = Theater::find($id)->delete();
        return redirect('/alltheater');
    }

    //function to redirect to edit page
    public function editTheater($id) {
        $theater = Theater::find($id);
        $states = States::all();
        $cities = Cities::all();
        return view('admin.theater.edittheater', [
            'theater' => $theater,
            'states' => $states,
            'cities' => $cities
        ]);
    }
    
    //function to update record
    public function updateTheater($id) {
        $oldTheater = Theater::find($id);
        $attributes = request()->validate([
            'name' => 'required|min:5|max:255',
            'state_id' => 'required',
            'city_id' => 'required',
            'address' => 'required|min:5|max:255'
        ]);

        $oldTheater->update($attributes);

        return redirect('/alltheater');
        
    }
}

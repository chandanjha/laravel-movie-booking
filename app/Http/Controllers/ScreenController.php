<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use App\Models\Theater;
use Illuminate\Http\Request;

class ScreenController extends Controller
{

    //functio to redirect to view all screen
    public function allScreen($id) {

        $screens = Theater::find($id)->screens;
        return view('admin.screen.allscreen', [
            'screens' => $screens,
            'id' => $id
        ]);
    }


    //function to redirect to add screen page
    public function addScreen($id) {
        $theater = Theater::find($id);
        return view('admin.screen.addscreen', [
            'theater' => $theater
        ]);
        
    }

    //function to add record
    public function createScreen($id) {
        $theater = Theater::find($id);

        //validate record
        $attributes = request()->validate([
            'gold_row' => 'required|numeric|min:1',
            'gold_column' => 'required|numeric|min:1',
            'platinum_row' => 'required|numeric|min:1',
            'platinum_column' => 'required|numeric|min:1',
            'normal_row' => 'required|numeric|min:1',
            'normal_column' => 'required|numeric|min:1'
        ]);

        $attributes['theater_id'] = $theater->id;
        $attributes['created_at'] = now();
        $theater->screen = Screen::create($attributes);

        return redirect('/allscreen/' . $id);
    }

    //function to delete record
    public function deleteScreen($id) {
        //find record
        $screen = Screen::find($id);
        $theaterId = $screen->theater_id;
        $screen->delete();
        return redirect('allscreen/'.$theaterId);
    }


    //function to redirect to edit page
    public function editScreen($id) {
        $screen = Screen::find($id);
        $theater = Theater::where('id', $screen->theater_id)->first();
        return view('admin.screen.editscreen', [
            'screen' => $screen,
            'theater' => $theater
        ]);
    }
    
    //update record
    public function updateScreen($id) {
        $screen = Screen::find($id);
        $theaterId = $screen->theater_id;
        $attributes = request()->validate([
            'gold_row' => 'required|numeric|min:1',
            'gold_column' => 'required|numeric|min:1',
            'platinum_row' => 'required|numeric|min:1',
            'platinum_column' => 'required|numeric|min:1',
            'normal_row' => 'required|numeric|min:1',
            'normal_column' => 'required|numeric|min:1'
        ]);

        $screen->update($attributes);

        return redirect('allscreen/'. $theaterId)->with('success','updated');
    }
}

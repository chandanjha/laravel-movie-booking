<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Screen;
use App\Models\Show;
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
            'gold_row' => 'required|numeric|min:1|max:20',
            'gold_column' => 'required|numeric|min:1|max:20',
            'platinum_row' => 'required|numeric|min:1|max:20',
            'platinum_column' => 'required|numeric|min:1|max:20',
            'normal_row' => 'required|numeric|min:1|max:20',
            'normal_column' => 'required|numeric|min:1|max:20'
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
            'gold_row' => 'required|numeric|min:1|max:20',
            'gold_column' => 'required|numeric|min:1|max:20',
            'platinum_row' => 'required|numeric|min:1|max:20',
            'platinum_column' => 'required|numeric|min:1|max:20',
            'normal_row' => 'required|numeric|min:1|max:20',
            'normal_column' => 'required|numeric|min:1|max:20'
        ]);

        $total = ($attributes['gold_row']*$attributes['gold_column'])+($attributes['platinum_row']*$attributes['platinum_column'])+($attributes['normal_row']*$attributes['normal_column']);
        $shows = Show::where('screen_id',$id)->get();
        foreach($shows as $show)
        {
            $seats =  $show->seats_available;
            $diff = abs($total - $seats);
            if($total > $seats)
            {
                $seats = $seats + $diff;
            }
            else
            {
                $seats = $seats - $diff;
            }
            $show->update(['seats_available'=>$seats]);
            // return $book = Book::where('show_id',$show->id)->first();
            // //echo $book->seats_book;
        }
        $screen->update($attributes);

        return redirect('allscreen/'. $theaterId)->with('success','updated');
    }
}

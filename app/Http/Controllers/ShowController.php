<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screen;
use App\Models\Show;
use App\Models\Theater;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ShowController extends Controller
{
    // function to add show

    public function addshow()
    {
        $movies = Movie::all();
        $theater = Theater::all();
        $screen = Screen::all();

        return view('admin.Show.addshow', [
            "movies" => $movies,
            'theaters' => $theater,
            'screen' => $screen

        ]);
        // add to database

    }
    // add to database
    public function createshow()
    {
        

        //validate record
        $attributes = request()->validate([
            'theater_id' => 'required|numeric',
            'movie_id' => 'required|numeric',
            'screen_id' => 'required|numeric',
            'slot' => 'required',
            
        ]);

        
        $attributes['created_at'] = now();
        $show = show::create($attributes);

        return redirect('/allshow');
    }


    // function to view show

    public function allshow()
    {
        $show = Show::all();



        return view('admin.show.allshow', [
            "shows" => $show
        ]);
    }

    //function to delete the record
    public function deleteshows($id)
    {
        $deleteShows = Show::find($id);
        $deleteShows->delete();
        return redirect('/allshow');
    }

    //function to redirect to view edit page
    public function editshow($id)
    {
        $show = Show::find($id);


        $theater = Theater::all();

        $screen = Screen::all();

        $movie = Movie::all();

        return view('admin.show.editshow', [
            "shows" => $show,
            "theaters" => $theater,
            "screen" => $screen,
            "movies" => $movie

        ]);
    }

    public function updateShow($id)
    {
        $oldshow = Show::find($id);
         //validate record
         $attributes = request()->validate([
            'theater_id' => 'required|numeric',
            'movie_id' => 'required|numeric',
            'screen_id' => 'required|numeric',
            'slot' => 'required',

        ]);

        $oldshow->update($attributes);
        return redirect('/allshow');
    }


   




}

<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Screen;
use App\Models\Seat;
use App\Models\Show;
use App\Models\Theater;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ShowController extends Controller
{

    // function to view show

    public function allshow()
    {
        $show = Show::with('theater', 'screen', 'movie')->get();
        return view('admin.Show.allshow', [
            "shows" => $show
        ]);
    }


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
    }

    // public function date(Request $request)
    // {
    //     $request->validate([
    //         'movie_id' => 'required',
    //     ]);
    //     $check = Movie::where('movie_id', $request->id)->first();
    //     $date = strtotime($check->date);
    //     if ($date < $request) {
    //         $data = $request->all();
    //         Show::create($data);
    //     } else {
    //         return back()->with('error date does not matches with release date');
    //     }
    // }



    public function getscreen(Request $request)
    {
        $data['screens'] = Screen::where("theater_id", $request->theater_id)->get();
        $data['theater'] = Theater::where("id", $request->theater_id)->get(["name", "id"]);
        $data['alltheater'] = Theater::all();
        return response()->json($data);
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
            'show_date' => 'required'

        ]);

        $movie = Movie::where('id',$attributes['movie_id'])->first();

        $release_date =  $movie->release_date;
        if($attributes['show_date'] < $release_date)
        {
            throw ValidationException::withMessages([
                'show_date' => 'Show date should be after the movie Release date'
            ]);
        }
        
        $screen = Screen::where('id', $attributes['screen_id'])->first();

        $totalSeats =  ($screen->gold_row * $screen->gold_column) + ($screen->platinum_row * $screen->platinum_column) + ($screen->normal_row * $screen->normal_column);
        $goldSeats = $screen->gold_row * $screen->gold_column;
        $platinumSeats = $screen->platinum_row * $screen->platinum_column;
        $normalSeats = $screen->normal_row * $screen->normal_column;


        $attributes['seats_available'] = $totalSeats;
        $attributes['created_at'] = now();

        $show = Show::create($attributes);

        $seatGold = Seat::create([
            'show_id' => $show->id,
            'seat_type' => 'gold',
            'seats_available' => $goldSeats
        ]);

        $seatPlatinum = Seat::create([
            'show_id' => $show->id,
            'seat_type' => 'platinum',
            'seats_available' => $platinumSeats
        ]);

        $seatNormal = Seat::create([
            'show_id' => $show->id,
            'seat_type' => 'normal',
            'seats_available' => $normalSeats
        ]);

        return redirect('/allshow');
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

        return view('admin.Show.editshow', [
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
            // 'screen_id' => 'required',
            'slot' => 'required'

        ]);

        $oldshow->update($attributes);
        return redirect('/allshow');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MovieController extends Controller
{

    //function to return view to show all movies
    public function allMovie() {
        $movies = Movie::with('genre','cast')->get();
        return view('admin.movie.allmovies', [
            'movies' => $movies
        ]);
    }

    //function to return view to add movie
    public function addMovie() {
        $genres = Genre::all();
        return view('admin.movie.addmovie',[
            'genres' => $genres
        ]);
    }


    //function to add data to data base
    public function createMovie() {

        //validates the data
        $attributes = request()->validate([
            'name' => 'required|min:1|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'genre_id' => 'required|exists:genres,id',
            'duration' => 'required',
            'release_date' => 'required',
            'movie_banner' => 'image|mimes:jpg,jpeg,gif,png',
            'movie_poster' => 'image|mimes:jpg,jpeg,gif,png'

        ]);


        //validation for duration
        if($attributes['duration'] > '04:30:00') {
            throw ValidationException::withMessages([
                'duration' => 'Duration should not be greater than 4:30 hrs'
            ]);
        }


        //validation for dates
        if($attributes['release_date'] > '2023-01-01') {
            throw ValidationException::withMessages([
                'release_date' => 'Please add date before 01-01-2023'
            ]);
        }

        if($attributes['release_date'] < '2020-01-01') {
            throw ValidationException::withMessages([
                'release_date' => 'Please add date after 01-01-2020'
            ]);
        }

        $checkDuplicate = Movie::where('name', $attributes['name'])
        ->where('genre_id', $attributes['genre_id'])
        ->where('release_date', $attributes['release_date'])->get();

        if(count($checkDuplicate) > 0){
            throw ValidationException::withMessages([
                'name' => 'Allready exits'
            ]);
        }


        //save the image to file format
        $movie_banner = file($attributes['movie_banner']);
        $movie_poster = file($attributes['movie_poster']);


        $banner_name = rand(1000,9999).'.'.$attributes['movie_banner']->extension();
        $poster_name = rand(1000,9999).'.'.$attributes['movie_poster']->extension();


        //moves the image to folder
        $attributes['movie_banner']->move(public_path('movieimage'),$banner_name);
        $attributes['movie_poster']->move(public_path('movieimage'),$poster_name);



        $attributes['created_at'] = now();
        $attributes['movie_banner'] = $banner_name;
        $attributes['movie_poster'] = $poster_name;

        //creates record in database 
        $newMovie = Movie::create($attributes);

        //redirects
        return redirect('addcast/'.$newMovie->id);
    }


    //function to delete the record
    public function deleteMovie($id) {
        $deleteMovie = Movie::find($id)->delete();
        return redirect('/allmovies');
    }


    //function to redirect to view edit page
    public function editMovie($id) {
        $movie = Movie::find($id);
        $genres = Genre::all();
        return view('admin.movie.editmovie',[
            'movie' => $movie,
            'genres' => $genres
        ]);
    }


    //function to update the records
    public function updateMovie($id) {
        //finds the user by id
        $oldMovie = Movie::find($id);


        //valida the data
        $attributes = request()->validate([
            'name' => 'required|min:1|max:255',
            'rating' => 'required|between:0,10',
            'genre_id' => 'required|exists:genres,id',
            'duration' => 'required',
            'release_date' => 'required',
           

        ]);


        //validation for the image
        if($attributes['release_date'] > '2023-01-01') {
            throw ValidationException::withMessages([
                'release_date' => 'Please add date before 2023-01-01'
            ]);
        }

        if($attributes['release_date'] < '2000-01-01') {
            throw ValidationException::withMessages([
                'release_date' => 'Please add date after 2000-01-01'
            ]);
        }

        // if($attributes['movie_banner'] == "")
        // {
        //     'movie_banner' => '',
        //     'movie_poster' => ''

            // //converts the image to the file format
            // $movie_banner = file($attributes['movie_banner']);
            // $movie_poster = file($attributes['movie_poster']);


            // $banner_name = rand(1000,9999).'.'.$attributes['movie_banner']->extension();
            // $poster_name = rand(1000,9999).'.'.$attributes['movie_poster']->extension();

            // $attributes['movie_banner']->move(public_path('movieimage'),$banner_name);
            // $attributes['movie_poster']->move(public_path('movieimage'),$poster_name);

            // $attributes['movie_banner'] = $banner_name;
            // $attributes['movie_poster'] = $poster_name;
        // }
        // else
        // {
        //     $attributes['movie_banner'] = $oldMovie->movie_banner;
        //     $attributes['movie_poster'] = $oldMovie->movie_poster;
        // }

        //update the record
        $oldMovie->update($attributes);

        return redirect('/allmovies');
    }
}


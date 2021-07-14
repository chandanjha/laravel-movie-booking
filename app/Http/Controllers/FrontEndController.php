<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function home(){
        $movies = Movie::with('genre','cast')->orderBy('rating','desc')->latest()->get();
        return view('home', [
            'movies' => $movies
        ]);
        
    }

    public function showAll($slug) {
        if($slug == "upcoming"){
            $movies = Movie::where('release_date' , '>',date('Y-m-d'))->get();
            $pageinfo = "upcoming";
        }
        else {
            $movies = Movie::where('release_date' , '<=',date('Y-m-d'))->get();
            $pageinfo = "released";
        }
        return view('allmovies',[
            'movies' => $movies,
            'pageinfo' => $pageinfo
        ]);
    }


    public function showMovie($id) {
        $movie = Movie::find($id)->with('genre','cast')->first();
        return view('viewmovie',[
            'movie' => $movie
        ]);
    }
}

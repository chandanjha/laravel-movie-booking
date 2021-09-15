<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CastController extends Controller
{

    //return view to add cast of different type
    public function addCast($id) {
        $movie = Movie::find($id);
        $casts = Cast::where('movie_id',$id)->get();
        return view('admin.movie.addcast',[
            'movie' => $movie,
            'casts' => $casts
        ]);
    }

    //adds the cast to database
    public function createCast() {
        $attributes = request()->validate([
            'name' => 'min:5|max:60|regex:/^[\pL\s]+$/u',
            'movie_id' => 'max:255',
            'type' => 'max:255'
        ]);


        //check if duplicate cast is present for same role
        $checkDuplicate = Cast::where('name',$attributes['name'])->
        where('movie_id', $attributes['movie_id'])->
        where('type', $attributes['type'])->get();

        if(count($checkDuplicate) > 0){
            throw ValidationException::withMessages([
                'name' => 'Allready exits'
            ]);
        }

        $newCast = Cast::create($attributes);

        $movieId = $newCast->movie_id;
        return redirect('addcast/' .$movieId); 
        
    }


    //deletes the cast
    public function deleteCast($id) {
        $deleteCast = Cast::find($id)->delete();
        return redirect()->back();
    }
}

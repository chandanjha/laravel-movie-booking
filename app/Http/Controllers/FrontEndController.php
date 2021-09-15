<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cast;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Show;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class FrontEndController extends Controller
{
    //function to display home page
    public function home(){
        $movies = Movie::with('genre','cast')->orderBy('rating','desc')
        ->orderBy('release_date','desc')->get(); //fetch all movies
        return view('home', [
            'movies' => $movies
        ]); //return home page
        
    }


    //function to view all movies according to release date
    public function showAll($slug) {
        if($slug == "upcoming"){
            $movies = Movie::where('release_date' , '>',date('Y-m-d'))
            ->orderBy('rating','desc')
            ->orderBy('release_date','asc')->get();
            $pageinfo = "upcoming";
        }
        else {
            $movies = Movie::where('release_date' , '<=',date('Y-m-d'))
            ->orderBy('rating','desc')
            ->orderBy('release_date','desc')->get();
            $pageinfo = "released";
        }
        return view('allmovies',[
            'movies' => $movies,
            'pageinfo' => $pageinfo
        ]);
    }


    public function showResult() {
        if(isset($_COOKIE['pageinfo']))
        {
            $pageinfo = $_COOKIE['pageinfo'];
        }
        else
        {
            $pageinfo = 'upcoming';
        }
        if($pageinfo == "upcoming"){
            $movies = Movie::where('release_date' , '>',date('Y-m-d'))
            ->orderBy('rating','desc')
            ->orderBy('release_date','asc')->get();
            $pageinfo = "upcoming";
        }
        else {
            $movies = Movie::where('release_date' , '<=',date('Y-m-d'))
            ->orderBy('rating','desc')
            ->orderBy('release_date','desc')->get();
            $pageinfo = "released";
        }
        return view('allmovies',[
            'movies' => $movies,
            'pageinfo' => $pageinfo
        ]);
    }

    //function to search accordiung to search input
    public function searchResult() {
        $attributes = request()->validate([
            'search' => 'max:255',
            'pageinfo' => 'max:255'
        ]);

        $pageinfo = $attributes['pageinfo'];


        $cast = Cast::where('name','like','%'.$attributes['search'].'%')->get();
        $count = count($cast);
        if($count > 0)
        {
            $ids =  $cast->pluck('movie_id');
        }
        

        if(isset($attributes['search'])) {
            if($pageinfo == 'released') {
                
                if($count > 0)
                {
                    $movies = Movie::whereIn('id',$ids)
                    ->where('release_date' , '<=',date('Y-m-d'))->get();
                }
                else
                {
                    $movies = Movie::where('name','like','%'.$attributes['search'].'%')
                    ->where('release_date' , '<=',date('Y-m-d'))->get();
                }
                
                
            }
            else 
            {
                if($count > 0)
                {
                    $movies = Movie::whereIn('id',$ids)
                    ->where('release_date' , '>',date('Y-m-d'))->get();
                }
                else
                {
                    $movies = Movie::where('name','like','%'.$attributes['search'].'%')
                    ->where('release_date' , '>',date('Y-m-d'))->get();
                }
                
            }
            
        }
        else
        {
            if($pageinfo == 'released') {
                $movies = Movie::where('release_date' , '<=',date('Y-m-d'))->get();
            }
            else {
                $movies = Movie::where('release_date' , '>',date('Y-m-d'))->get();
            }
        }
        setcookie('pageinfo',$pageinfo,time()+60*60*24*365*10);
        return view('allmovies',[
            'movies' => $movies,
            'pageinfo' => $pageinfo
        ]);
    }



    
    //function to show particular movie
    public function showMovie($id) {
        $movie = Movie::with('genre','cast')->find($id);
        $releaseDate = $movie->release_date;
        $today = date('Y-m-d');
        if($releaseDate > $today)
        {
            $movies = Movie::where('genre_id', $movie->genre_id)
            ->where('release_date','>',date('Y-m-d'))
        ->orderBy('release_date','desc')->get();
        }
        else
        {
            $movies = Movie::where('genre_id', $movie->genre_id)
            ->where('release_date','<=',date('Y-m-d'))
        ->orderBy('release_date','desc')->get();
        }
        
        return view('viewmovie',[
            'movie' => $movie,
            'allmovies' => $movies
        ]);
    }



    //function to show particular movie
    public function showSlot($id) {
        $movie = Movie::find($id);
        $releaseDate = $movie->release_date;
        $today = date('Y-m-d');
        if($releaseDate > $today)
        {
            $movies = Movie::where('genre_id', $movie->genre_id)
            ->where('release_date','>',date('Y-m-d'))
            ->where('id','!=',$id)
        ->orderBy('release_date','desc')->get();
        }
        else
        {
            $movies = Movie::where('genre_id', $movie->genre_id)
            ->where('release_date','<=',date('Y-m-d'))
            ->where('id','!=',$id)
        ->orderBy('release_date','desc')->get();
        }
        // $date = $movie->release_date; 
        // dd($date = substr($date,5,2));
        // //dd($today = date('m'));
        // $date = strtotime($date);
        // $today = strtotime($today);
        // //dd($result = $today - $date);
        $shows = Show::where('movie_id',$id)->with('theater','screen','movie')->get();
        return view('shows',[
            'shows' => $shows,
            'movie' => $movie,
            'allmovies' => $movies
        ]);
    }


    //function to show bookpage
    public function bookPage($id) {
        $show = Show::find($id);
        return view('book',[
            'show' => $show
        ]);        
    }

    public function confirmBook($id) {
        $attributes = request()->validate([
            'seat_type' => 'required',
            'seats_booked' => 'required|numeric'
        ]);

        if($attributes['seats_booked'] > 20)
        {
            throw ValidationException::withMessages([
                'seats_booked' => 'At Max 20 seats are allowed per booking'
            ]);
        }

        $attributes['show_id'] = $id;
        $attributes['user_id'] = auth()->user()->id;
        $attributes['book_status'] = 'confirm';
        $attributes['booked_at'] = now();

        

        $getShow = Show::find($id);
        $getSeatsCount = $getShow->seats_available;

        if($getSeatsCount < $attributes['seats_booked'])
        {
            throw ValidationException::withMessages([
                'seats_booked' => 'This much seats are not available in this show'
            ]);
        }

        $newCount = $getSeatsCount - $attributes['seats_booked'];
        $getShow->update([
            'seats_available' => $newCount
        ]);

        $getSeats = Seat::where('show_id',$id)->where('seat_type',$attributes['seat_type'])->first();
        $getSeatsCount = $getSeats->seats_available;

        if($getSeatsCount < $attributes['seats_booked'])
        {
            throw ValidationException::withMessages([
                'seats_booked' => 'This much seats are not available in this seat type'
            ]);
        }
        $newCount = $getSeatsCount - $attributes['seats_booked'];
        $getSeats->update([
            'seats_available' => $newCount
        ]);

        $bookRecord = Book::create($attributes);

        return redirect('/mybookings');

    }

    public function myBookings() {
        $user_id = auth()->user()->id;
        $bookings = Book::where('user_id',$user_id)->where('book_status','confirm')
        ->orderBy('booked_at','desc')
        ->with('user','show')->get();
        return view('bookings', [
            'bookings' => $bookings
        ]);
    }


    public function cancelTicket($id) {
        $booking = Book::find($id);
        if($booking->user_id == auth()->user()->id)
        {
            $seats = $booking->seats_booked;
            $showId = $booking->show_id;
            $seatType = $booking->seat_type;

            $booking->update([
                'book_status' => 'cancel'
            ]);

            $show = Show::find($showId);
            $newCount = $show->seats_available + $seats;
            $show->update([
                'seats_available' => $newCount
            ]);

            $seatRecord = Seat::where('show_id',$showId)->where('seat_type',$seatType)->first();
            $newCount = $seatRecord->seats_available + $seats;
            $seatRecord->update([
                'seats_available' => $newCount
            ]);
            
            return redirect('/mybookings');

        }
        else
        {
            return back();
        }
    }



    //function to view profile
    public function viewProfile() 
    {
        $id =  auth()->user()->id;
        $user = User::find($id);
        return view('viewprofile', [
            'user' => $user
        ]);
    }

    
    //function record of my profile
    public function editProfile($id) {
        $user = User::find($id);
        $attributes = request()->validate([
            'name' => 'required|min:5|max:30|regex:/^[\pL\s]+$/u',
            'email' => 'bail|required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255',
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

        return redirect('/viewprofile');
    }


    //function to edit password of my prfile
    public function changePassword($id) {
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
                'current_password' => 'The current password and new passowrd should be different'
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

}

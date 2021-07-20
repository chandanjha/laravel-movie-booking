<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $movie = Movie::with('genre','cast')->find($id);
        return view('viewmovie',[
            'movie' => $movie
        ]);
    }

    public function showSlot($id) {
        $shows = Show::where('movie_id',$id)->with('theater','screen','movie')->get();
        return view('shows',[
            'shows' => $shows
        ]);
    }

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
        $bookings = Book::where('user_id',$user_id)->where('book_status','confirm')->with('user','show')->get();
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
}

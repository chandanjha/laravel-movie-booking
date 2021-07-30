<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Seat;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function allBookings()
    {
        $bookings = Book::with('user', 'show')->get();
        return view('admin.Show.allbookings', [
            'bookings' => $bookings
        ]);
    }


    public function cancelBooking($id)
    {


        $booking = Book::find($id);
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

        $seatRecord = Seat::where('show_id', $showId)->where('seat_type', $seatType)->first();
        $newCount = $seatRecord->seats_available + $seats;
        $seatRecord->update([
            'seats_available' => $newCount
        ]);

        return redirect('allbookings');
    }

    
    public function confirmBooking($id)
    {
        $booking = Book::find($id);
        $seats = $booking->seats_booked;
        $showId = $booking->show_id;
        $seatType = $booking->seat_type;
        

        $booking->update([
            'book_status' => 'confirm'
        ]);

        $show = Show::find($showId);
        $newCount = $show->seats_available - $seats;
        $show->update([
            'seats_available' => $newCount
        ]);

        $seatRecord = Seat::where('show_id', $showId)->where('seat_type', $seatType)->first();
        $newCount = $seatRecord->seats_available - $seats;
        $seatRecord->update([
            'seats_available' => $newCount
        ]);

        return redirect('allbookings');
    }
}

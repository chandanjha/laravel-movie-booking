<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function allBookings() {
        $bookings = Book::with('user','show')->get();
        return view('admin.Show.allbookings', [
            'bookings' => $bookings
        ]);
    }

    public function cancelBooking($id) {
        $bookings = DB::table('books')->where('id', $id)->update([
  
            'book_status' => 'cancel'
        ]);
     
        return redirect('allbookings');

    }

    public function confirmBooking($id) {
        $bookings = DB::table('books')->where('id', $id)->update([
  
            'book_status' => 'confirm'
        ]);
        
        return redirect('allbookings');

    }
}



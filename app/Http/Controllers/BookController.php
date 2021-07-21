<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function allBookings() {
        $bookings = Book::with('user','show')->get();
        return view('admin.Show.allbookings', [
            'bookings' => $bookings
        ]);
    }
}

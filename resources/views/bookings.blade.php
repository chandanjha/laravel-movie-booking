<x-layout>

<x-header />
    <div class="frontend">
        <div class="row" id="ticketcontent">
            <div class="col-lg-12">
                @if(count($bookings) > 0)

                @foreach($bookings as $booking)
                @if($booking->book_status == "confirm")
                <div class="tickets" style="background-color: #999;
                            width:50%; color:black; padding:1%;
                            margin:auto; margin-top:2%;">
                    <h3>Movie: <i>{{ ucwords($booking->show->movie->name) }}</i></h3>
                    <h3>Movie Duration: <i>{{ substr($booking->show->movie->duration, 0, 2) }} HRS {{ substr($booking->show->movie->duration, 3, 2) }} Min</i></h3>
                    <h3>Rating: <i>{{$booking->show->movie->rating}}</i></h3>
                    <h3>Multiplex: <i>{{ ucwords($booking->show->theater->name) }}</i></h3>
                    <h4>({{ $booking->show->theater->state->name }})</h4>
                    <h4>({{ $booking->show->theater->city->name }})</h4>
                    <h3>Screen: <i>{{ $booking->show->screen_id }}</i></h3>
                    <h3>Seat Type: <i>{{ ucwords($booking->seat_type) }}</i></h3>
                    <h3>Total Seats Booked: <i>{{ $booking->seats_booked }}</i></h3>
                    <h3>Show Date: <i>{{ $booking->show->show_date }}</i></h3>
                    @if($booking->show->slot == "slot-1")
                    <?php $slot = "Morning 9-12" ?>
                    @elseif($booking->show->slot == "slot-2")
                    <?php $slot = "Day 12-3" ?>
                    @elseif($booking->show->slot == "slot-3")
                    <?php $slot = "Evening 3-6" ?>
                    @elseif($booking->show->slot == "slot-4")
                    <?php $slot = "Evening 6-9" ?>

                    @else
                    <?php $slot = "not defined" ?>
                    @endif
                    <h3>Time Slot: <i>{{ $slot }}</i></h3>
                    <h3>Booking On: <i>{{ $booking->booked_at }}</i></h3>
                    <h3>Status:- <i>{{ ucwords($booking->book_status) }}</i></h3>


                    <a class="btn btn-primary btn-lg" onClick="javascript: alert('Are you sure you want to cancel booking'); " href="/cancelticket/{{ $booking->id }}">Cancel</a>
                </div>

                @endif
                @endforeach
                @else
                <h1>No Bookings</h1>
                @endif
            </div>
        </div>
    </div>
</x-layout>
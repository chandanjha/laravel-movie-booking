<x-layout>
    <x-admin_header />
    <x-nav />



    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @if( count($bookings) > 0 )
                    <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <section class="panel">
                                        <table class="table table-striped table-advance table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>S.no</td>
                                                    <td>Movie</td>
                                                    <td>Multiplex</td>
                                                    <td>Screen</td>
                                                    <td>Seat Type</td>
                                                    <td>Total Seats Booked</td>
                                                    <td>Show Date</td>
                                                    <td>Time Slot</td>
                                                    <td>Booking Date Time</td>
                                                    <td>status</td>
                                                    <td>Booked By</td>
                                                    <td>
                                                        <class="icon_cogs">Action
                                                    </td>
                                                </tr>
                                                <?php $i = 0 ?>


                                                @foreach($bookings as $booking)

                                                <tr>
                                                    <td>{{ $i=$i+1 }}</td>



                                                    <td>{{ ucwords($booking->show->movie->name) }}</td>
                                                    <td>{{ ucwords($booking->show->theater->name) }}</td>
                                                    <td>{{ $booking->show->screen_id }}</td>
                                                    <td>{{ ucwords($booking->seat_type) }}</td>
                                                    <td>{{ $booking->seats_booked }}</td>
                                                    <td>{{ $booking->show->show_date }}</td>
                                                    <td>@if($booking->slot == "slot-1")
                                                        <?= "Morning 9-12" ?>
                                                        @elseif($booking->show->slot == "slot-2")
                                                        <?= "Day 12-3" ?>
                                                        @elseif($booking->show->slot == "slot-3")
                                                        <?= "Evening 3-6" ?>
                                                        @elseif($booking->show->slot == "slot-4")
                                                        <?= "Evening 6-9" ?>

                                                        @else
                                                        <?= "not defined" ?>
                                                        @endif
                                                    </td>
                                                    </td>
                                                    <td>{{ $booking->booked_at}}</td>
                                                    <td>{{ ucwords($booking->book_status) }}</td>
                                                    <td>{{ $booking->user->name}}</td>
                                                    <td><a onClick="javascript: alert('Are you sure you want to confirm');" href="{{'confirm_booking/'.$booking->id }}" class=" btn btn-secondary">Confirm</a>

                                                        <a onClick="javascript: alert('Are you sure you want to cancel');" href="{{'cancel_booking/'.$booking->id }}" class=" btn btn-secondary">Cancel</a>
                                                    </td>


                </div>


                @endforeach
                @else
                <h1>No Bookings</h1>
                @endif

                </tr>
                </tbody>
                </table>
        </section>

        </div>
        </div>

    </section>
    </section>

</x-layout>
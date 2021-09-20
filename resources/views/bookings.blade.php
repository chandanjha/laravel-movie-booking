<x-layout>

<x-header />
<?php $date = date('Y-m-d') ?>
    <div style="float: right; width:10%; margin-top:60px;">
        <a href="{{ URL::previous() }}" style="background-color:black; color:white;" class="btn">Back</a>
    </div>
    <div class="frontend">

        <div class="row">
            <h1>My Bookings</h1>
            @if(count($bookings) > 0)
            
            
                <div class="col-lg-12" style="margin-top: 10px;">
                    <h2>Recent Bookings</h2>
                </div>

                <div class="col-lg-12" style="margin-top: 10px;">
                    <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <td>S.no</td>
                                    <td>Movie</td>
                                    <td>Theater</td>
                                    <td>Show</td>
                                    <td>Total Tickets</td>
                                    <td>State/City</td>
                                    <td><i class="icon_cogs"></i>Cancel</th>
                                </tr>
                                <?php $i = 0 ?>
                                @foreach($bookings as $booking)
                                    @if($booking->show->show_date >= $date)
                                    <tr>
                                        <td>{{ $i=$i+1 }}</td>
                                        <td>{{ ucwords($booking->show->movie->name) }}</td>  
                                        <td>{{ ucwords($booking->show->theater->name) }}</td>
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
                                        <td>{{ $booking->show->show_date }}/{{ $slot }}</td>
                                        <td>{{ $booking->seats_booked }}</td>
                                        <td>{{ $booking->show->theater->state->name }}/{{ $booking->show->theater->city->name }}</td>
                                        <td><a class="btn btn-primary btn-sm" onClick="javascript: alert('Are you sure you want to cancel booking'); " href="/cancelticket/{{ $booking->id }}">Cancel</a></td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @if($i == 0)
                            <h2>No Recent Bookings</h2>
                        @endif
                    </section>
                </div>

                <div class="col-lg-12" style="margin-top: 10px;">
                    <h2>Previous Bookings</h2>
                </div>

                <div class="col-lg-12" style="margin-top: 10px;">    
                    <section class="panel">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <td>S.no</td>
                                    <td>Movie</td>
                                    <td>Theater</td>
                                    <td>Show</td>
                                    <td>Total Tickets</td>
                                    <td>State/City</td>
                                    <td><i class="icon_cogs"></i>Cancel</th>
                                </tr>
                                <?php $i = 0 ?>
                                @foreach($bookings as $booking)
                                    @if($booking->show->show_date < $date)
                                    <tr>
                                        <td>{{ $i=$i+1 }}</td>
                                        <td>{{ ucwords($booking->show->movie->name) }}</td>  
                                        <td>{{ ucwords($booking->show->theater->name) }}</td>
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
                                        <td>{{ $booking->show->show_date }}/{{ $slot }}</td>
                                        <td>{{ $booking->seats_booked }}</td>
                                        <td>{{ $booking->show->theater->state->name }}/{{ $booking->show->theater->city->name }}</td>
                                        <td><a class="btn btn-primary btn-sm" onClick="javascript: alert('Are you sure you want to cancel booking'); " href="/cancelticket/{{ $booking->id }}">Cancel</a></td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @if($i == 0)
                            <h2>No Previous Bookings</h2>
                        @endif
                    </section>    
                </div>
            @else
                <h1>No Bookings</h1>
            @endif
        </div>
    </div>
</x-layout>
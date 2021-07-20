<x-layout>
    <x-header />
    <div class="frontend">
        <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
            <h1>Booking Details</h1>
            <form action="/book/{{ $show->id }}" method="post">
                @csrf
                <div class="form-group col-8">
                    <label for="seat_type">Seat Type</label>
                    <input class="form-control" type="radio" name="seat_type" id="seat_type" value="gold">Gold
                    <input class="form-control" type="radio" name="seat_type" id="seat_type" value="platinum">Platinum
                    <input class="form-control" type="radio" name="seat_type" id="seat_type" value="normal">Normal
                    @error('seat_type')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="seats_booked">Number of Seats</label>
                    <input type="text" name="seats_booked" id="seats_booked" class="form-control" placeholder="Number of Seats" value="{{ old('seats_booked') }}" >
                    @error('seats_booked')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-sm btn-primary" type="submit">Book</button>
                    <button class="btn btn-sm btn-danger" type="reset">Reset</button>
                </div>

            </form>
        </div>

    </div>
</x-layout>
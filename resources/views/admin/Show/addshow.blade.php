<x-layout>
    <x-admin_header />
    <x-nav />
    {{-- Add Show Page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Show</h1>

        <form method="POST" action="/addshow" class="mt-10" enctype="multipart/form-movies">
            @csrf
            <label for="theater_id">Theater</label>

            <select name="theater_id" class="form-control" id="theater_id">
                <option value="">Select Theater</option>
                @foreach($theaters as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
            @error('theater_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <br>

            <label for="screen_id">Screen</label>

            <select name="screen_id" class="form-control" id="screen_id">
                <option value="">Select Screen</option>
            </select>
            @error('screen_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <br>

            <label for="movie_id">Movie</label>
            <select name="movie_id" class="form-control" id="movie_id">
                <option value="">Select Movie</option>
                @foreach($movies as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
            @error('movie_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror
            <br>

            <div class="form-group col-8">
                <label for="show_date">Show Date</label>
                <input type="date" name="show_date" class="form-control" id="show_date">
                @error('show_date')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <label for="slot_id">Slot</label>
            <select class="form-control" name="slot" id="slot-id">
                <option value="">Select Slot</option>
                <option value="slot-1">Morning 9-12</option>
                <option value="slot-2">Day 12-3</option>
                <option value="slot-3">Evening 3-6</option>
                <option value="slot-4">Evening 6-9</option>
            </select>

            @error('slot')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @enderror

            <br>
            
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <a class="btn btn-danger btn-sm" href="/addshow">Reset</a>
            </div><br>

        </form>



        </form>
    </div>
</x-layout>
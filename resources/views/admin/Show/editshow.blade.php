<x-layout>
    <x-admin_header />
    <x-nav />
    {{-- Edit Show Page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Edit Show</h1>

        <form method="POST" action="/editshow/{{ $shows->id }}" class="mt-10" enctype="multipart/form-movies">
            @csrf
            <label for="theater_id">Theater</label>

            <select name="theater_id" class="form-control" id="Theater_id">
                @foreach($theaters as $row)
                @if($row->id == $shows->theater_id)
                <option value="{{$shows->theater_id}}">{{$row->name}}</option>
                @endif
                @endforeach

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

            <select name="screen_id" class="form-control" id="schreen_id">
                <option value="">Select Screen</option>
                <?php $i = 0; ?>
                @foreach($screen as $row)
                <?php $i = $i + 1; ?>
                <option value="{{$row->id}}">Screen {{ $i }}
                    ( {{ ($row->gold_row*$row->gold_column)+($row->platinum_row*$row->platinum_column)+($row->normal_row*$row->normal_column) }} )</option>
                @endforeach
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

            <label for="slot_id">Slot</label>
            <select class="form-control" name="slot" id="slot-id">
                <option value="{{ $shows->slot }}">{{ $shows->slot }}</option>
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
                <button class="btn btn-primary btn-sm" type="submit">Update</button>

            </div><br>

        </form>
    </div>
</x-layout>
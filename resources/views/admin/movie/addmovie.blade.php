<x-layout>
    <x-admin_header />
    <x-nav />
    {{-- Add Movie Page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Movie</h1>
        <form method="POST" action="/addmovie" class="mt-10" enctype="multipart/form-data">

            @csrf

            <div class="form-group col-8">
                <label for="name">Name</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie Name" value="{{ old('name') }}" required>

                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>



            

            <div class="form-group col-8">
                <label for="rating">Rating</label>

                <input class="form-control" type="text" name="rating" id="rating" placeholder="Enter Movie Rating" value="{{ old('rating') }}" required>

                @error('rating')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group col-8">
                <label for="release_date">Release Date</label>

                <input class="form-control" type="date" name="release_date" id="release_date" placeholder="Enter Movie Release Date" value="{{ old('release_date') }}" required>

                @error('release_date')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            

            <div class="from-group">
                <label for="duration">Duration</label>
                <br>
                <label for="hour">Hour</label>
                <input type="number" name="hour" id="" class="form-control" value="{{ old('hour') }}" >
                @error('hour')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
                
                <label for="minute">Minute</label>
                <input type="number" name="minute" id="" class="form-control" value="{{ old('minute') }}" >
                @error('minute')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            
            <div class="form-group col-8">
                <label for="genre_id">Genre</label>
                <select class="form-control" name="genre_id" id="genre_id">
                    @if(old('release_date'))
                        @foreach($genres as $genre)
                            @if($genre->id == old('genre_id'))
                            <option value="{{ $genre->id }}">{{ ucwords($genre->name) }}</option>
                            @endif
                        @endforeach
                    @else
                    
                    <option value="">Select  Genre</option>
                    @endif
                    <option value="" value="old('genre_id') }}">{{ old('genre_id') }} Select  Genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ ucwords($genre->name) }}</option>
                    @endforeach                    
                </select>
                @error('genre_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>



            <div class="form-group col-4">
                <label for="movie_banner">Movie Banner</label>

                <input class="form-control" type="file" name="movie_banner" id="movie_banner" required>
                
                @error('movie_banner')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            <div class="form-group col-4">
                <label for="movie_poster">Movie Poster</label>

                <input class="form-control" type="file" name="movie_poster" id="movie_poster" required>
                @error('movie_poster')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>
            

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>

        </form>
    </div>
</x-layout>
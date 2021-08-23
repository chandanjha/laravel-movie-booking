<x-layout>
    <x-admin_header />
    <x-nav />
    {{-- edit Movie page --}}  


    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Movie</h1>
        <form method="POST" action="/editmovie/{{ $movie->id }}" class="mt-10" enctype="multipart/form-data">

            @csrf

            <div class="form-group col-8">
                <label for="name">Name</label>

                <input class="form-control" type="text" name="name" id="name"  value="{{ $movie->name }}" value="{{ old('name') }}" required>

                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            

            <div class="form-group col-8">
                <label for="rating">Rating</label>

                <input class="form-control" type="text" name="rating" id="rating"  value="{{ $movie->rating }}" value="{{ old('rating') }}" required>

                @error('rating')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group col-8">
                <label for="release_date">Release Date</label>

                <input class="form-control" type="date" name="release_date" id="release_date"  value="{{ $movie->release_date }}" value="{{ old('release_date') }}" required>

                @error('release_date')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="from-group col-4">
                <label for="duration">Duration</label>
                <br>
                <label for="hour">Hour</label>
                <input type="number" name="hour" max="4" min="0" id="" value="{{ $hour }}" class="form-control">
                <label for="minutes">Minute</label>
                <input type="number" name="minute" max="60" min="0" id="" value="{{ $minute }}" class="form-control">
            </div>

            <br>
            <div class="form-group col-8">
                <label for="genre_id">Genre</label>
                <select class="form-control" name="genre_id" id="genre_id">
                    <option value="{{ $movie->genre_id }}">{{ $movie->genre->name }}</option>
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

                <input class="form-control" type="file" name="movie_banner" value="{{ $movie->movie_banner }}" id="movie_banner"  >
                
                @error('movie_banner')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            <div class="form-group col-4">
                <label for="movie_poster">Movie Poster</label>

                <input class="form-control" type="file" name="movie_poster" value="{{ $movie->movie_poster }}" id="movie_poster"  >
                
                @error('movie_poster')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>
            

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Update</button>
            </div><br>

        </form>
    </div>
</x-layout>
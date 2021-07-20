<x-layout>
    <x-header />
    <div class="frontend">


        <div class="row">
            <img src="/movieimage/{{$movie->movie_poster}}" alt="" width="90%" height="300px">
        </div>


        <div class="row" id="moviecontent">
            <div class="col-md-6">
                <h2>Name: <i>{{ucwords($movie->name) }}</i></h2>
                <h2>Duration: <i>{{ $movie->duration }}</i></h2>
                <h2>Rating: <i>{{ $movie->rating }}</i></h2>
                <h2>Genre: <i>{{ $movie->genre->name }}</i></h2>
            </div>
            <div class="col-md-6">
                <h2 style="border-bottom: 1px solid black;">Cast</h2>
                <h3>Actor</h3>
                
                @foreach($movie->cast as $cast)
                    @if($cast->type == "actor")
                        {{ $cast->name  }}
                        
                    @endif
                @endforeach
                
                <h3>Actress</h3>
                
                @foreach($movie->cast as $cast)
                    @if($cast->type == "actress")
                        {{ $cast->name }}
                        
                    @endif
                @endforeach
                
                <h3>Director</h3>
                
                @foreach($movie->cast as $cast)
                    @if($cast->type == "director")
                        {{ $cast->name }}
                        
                    @endif
                @endforeach
                
                <h3>Producer</h3>
                
                @foreach($movie->cast as $cast)
                    @if($cast->type == "producer")
                        {{ $cast->name  }}
                        
                    @endif
                @endforeach
                
                
            </div>
        </div>

        <div class="row">
            <div class="pull-right">
                <a class="btn btn-primary btn-lg" href="/showslots/{{ $movie->id }}">Shows</a>
            </div>
        </div>
    </div>
</x-layout>
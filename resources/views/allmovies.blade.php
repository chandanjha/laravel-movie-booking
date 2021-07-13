<x-layout>
    <x-header />

    <div class="frontend">
        <div class="row"  id="frontheading">
          <div class="col-lg-12">
              @if($pageinfo == "released")
            <h3 class="page-header">Released Movies</h3>
            @else
            <h3 class="page-header">Upcoming Movies</h3>
            @endif
          </div>
        </div>
        <div class="row" id="allcontent">
            @foreach($movies as $movie)
            <div class="col-md-6" id="frontcontent">
                <div class="movie_banner">
                    <a href="/viewmovie/{{ $movie->id }}"><img src="/movieimage/{{ $movie->movie_banner }}" alt="" width="80%" height="300px"></a>
                </div>
                <h4><a href="/viewmovie/{{ $movie->id }}">{{ ucwords($movie->name) }}</a></h4>
                <h4>Duration {{ $movie->duration }}</h4>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
<x-layout>
    <x-header />
    <?php $date = date('Y-m-d') ?> {{-- get date --}}
    <div class="frontend">
        <div style="float: right; width:10%; ">
            <a href="{{ URL::previous() }}" style="background-color:black; color:white;" class="btn">Back</a>
        </div>
        <div class="row" style="height: 10px; background-color:blue; width:50%; margin:auto;">
            <form action="/searchresult" method="POST">
                <div class="form-group">
                    @csrf
                    <input type="hidden" name="pageinfo" value="{{ $pageinfo }}">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search" ><br>
                    <button class="btn btn-default btn-rounded btn-lg" type="submit">search</button>
                </div>
            </form>   
        </div>

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
            @if(count($movies) > 0)
            @foreach($movies as $movie)
            <div class="col-md-3" id="frontcontent">
                <div class="movie_banner">
                    <a href="/viewmovie/{{ $movie->id }}"><img src="/movieimage/{{ $movie->movie_banner }}" alt="" width="80%" height="300px"></a>
                </div>
                <h4><a href="/viewmovie/{{ $movie->id }}">{{ ucwords($movie->name) }}</a></h4>
                @if( $pageinfo == "released")
                <h4>Rating : {{ ucwords($movie->rating) }}/10</h4>
                @endif
                <h4>Duration : {{ substr($movie->duration, 0, 5) }} HRS</h4>
                @if( $pageinfo == "released")
                <h4><a class="btn btn-primary btn-round" href="/showslots/{{ $movie->id }}">Book Now</a></h4>
                @endif
            </div>
            @endforeach
            @else
            <h1>No Records</h1>
            @endif
        </div>
    </div>
</x-layout>
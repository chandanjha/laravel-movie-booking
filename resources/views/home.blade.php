<x-layout>
    <x-header />
    <?php $date = date('Y-m-d') ?> {{-- get date --}}


    <div class="frontend">
        <div class="row" id="frontslide">

            <div class="slideshow-container">

                <?php $i = 0; ?>
                @foreach($movies as $movie)
                @if($movie->release_date <= $date)
                    <?php $i = $i + 1 ?>
                    <div class="mySlides">
                        <a href="/viewmovie/{{ $movie->id }}"><img src="/movieimage/{{ $movie->movie_poster }}" alt="" style="width:100%"></a>
                        <div class="text"><a href="/viewmovie/{{ $movie->id }}">{{ ucwords($movie->name) }}</a></div>
                    </div>
                @endif
                @if($i>2)
                    @break
                @endif
                @endforeach
                

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>


        </div>

        <div class="row" style="background-color: #fff;">
            <?php $i = 0; ?>
            <h1>Released Movies</h1>
            @foreach($movies as $movie)
            @if($movie->release_date <= $date)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php $i = $i + 1 ?>
                <div class="movie_banner">
                    <a href="/viewmovie/{{ $movie->id }}"><img src="/movieimage/{{ $movie->movie_banner }}" alt="" width="100" height="100"></a>
                </div>

                <h4><a href="/viewmovie/{{ $movie->id }}">{{ ucwords($movie->name) }}</a></h4>
            </div>
            @endif
            @if($i>3)
            @break
            @endif
            @endforeach
            <a class="btn btn-info pull-right" href="/viewmore/released">View More</a>
        </div>
        <div class="row">
            <?php $i = 0; ?>
            <h1>Upcoming Movies</h1>
            @foreach($movies as $movie)
            @if($movie->release_date > $date)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php $i = $i + 1 ?>
                <div class="movie_banner">
                    <a href="/viewmovie/{{ $movie->id }}"><img src="/movieimage/{{ $movie->movie_banner }}" alt="" width="100" height="100"></a>
                </div>

                <h4><a href="/viewmovie/{{ $movie->id }}">{{ $movie->name }}</a></h4>
            </div>
            @endif
            @if($i>3)
            @break
            @endif
            @endforeach
            <a class="btn btn-info pull-right" href="/viewmore/upcoming">View More</a>
        </div>
    </div>

</x-layout>
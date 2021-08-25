<x-layout>
    <x-header />
    <?php $date = date('Y-m-d') ?> {{-- get date --}}


    <div class="frontend">
        

        <section class="panel" style="height: 300px;">
            <div id="c-slide" class="carousel slide auto panel-body">
            
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    @foreach($movies as $movie)
                    @if($movie->release_date <= $date)
                    <?php $i = $i + 1 ?>
                    <div class="item text-center {{ $i == '1' ? 'active':'' }}">
                    <a href="/viewmovie/{{ $movie->id }}"><img src="/movieimage/{{ $movie->movie_poster }}" alt="" style="width:100%; height:250px"></a>
                    <div class="text"><a href="/viewmovie/{{ $movie->id }}">{{ ucwords($movie->name) }}</a></div>
                    </div>
                    @endif
                    @if($i>2)
                    @break
                    @endif
                    @endforeach
                </div>
                <a data-slide="prev" href="#c-slide" class="left carousel-control">
                    <i class="arrow_carrot-left_alt2"></i>
                </a>
                <a data-slide="next" href="#c-slide" class="right carousel-control">
                    <i class="arrow_carrot-right_alt2"></i>
                </a>
            </div>
        </section>

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
                <h5>Rating : {{ ucwords($movie->rating) }}</h5>
                <h5>Duration : {{ substr($movie->duration, 0, 5) }} HRS</h5>
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

                <h4><a href="/viewmovie/{{ $movie->id }}">{{ ucwords($movie->name) }}</a></h4>
                <h5>Rating : {{ ucwords($movie->rating) }}/10</h5>
                <h5>Duration : {{ substr($movie->duration, 0, 5) }} HRS</h5>
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
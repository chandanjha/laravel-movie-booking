<x-layout>
    <x-header />
    <?php $date = date('Y-m-d') ?>
    <div class="frontend">

        <div style="float: right; width:10%; ">
            <a href="{{ URL::previous() }}" style="background-color:black; color:white;" class="btn">Back</a>
        </div>

        <div class="row">
            <img src="/movieimage/{{$movie->movie_banner}}" alt="" width="90%" height="300px">
        </div>


        <div class="row" id="moviecontent">
            <div class="col-md-6">
                <h2>Name: <i>{{ucwords($movie->name) }}</i></h2>
                <h2>Duration: <i>{{ substr($movie->duration, 0, 2) }} HRS {{ substr($movie->duration, 3, 2) }} Min</i></h2>
                <h2>Rating: <i>{{ $movie->rating }}</i></h2>
                @php
                $tense = $movie->genre->name[0];
                if($tense == 'a' || $tense == 'e'|| $tense == 'i'|| $tense == 'o'|| $tense == 'u')
                {
                    $preposition = 'an';
                }
                else
                {
                    $preposition = 'a';
                }
                @endphp
                @if($movie->release_date > $date)
                
                <h2>Synopsis: <i>This movie is {{ $preposition }} {{ $movie->genre->name }} movie</i></h2>
                @endif
                <h2>Release Date: <i>{{ $movie->release_date }}</i></h2>
                <h2>Genre: <i>{{ ucwords($movie->genre->name) }}</i></h2>
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

        <div class="row" style="height: 10px;">
            <div class="pull-right">
                <a class="btn btn-primary btn-lg" href="/showslots/{{ $movie->id }}">
                    @if($movie->release_date > $date)
                        Advance Booking
                    @else
                        Book Now
                    @endif
                </a>
            </div>
        </div>
        
        <div class="row" style="background-color: white; height:10px;">
            <div class="col-lg-12">
                <h1>You May Also Like</h1>
            </div>
        </div>

        <div class="row">
            @if(count($allmovies)>0)
            <?php $i=0; ?>
                @foreach($allmovies as $row)
                    @if($row->id != $movie->id)
                    <?php $i= $i+1; ?>
                    <div class="col-md-3">
                        <div class="movie_banner">
                        <a href="/viewmovie/{{ $row->id }}"><img src="/movieimage/{{ $row->movie_banner }}" alt="" width="80%" height="300px"></a>
                        </div>
                        <h4><a href="/viewmovie/{{ $row->id }}">{{ ucwords($row->name) }}</a></h4>
                    </div>
                    @endif
                    @if($i >= 3)
                        @break
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</x-layout>
<x-layout>
    <x-header />
    <?php $date = date('Y-m-d') ?>
    <div style="float: right; width:10%; margin-top:60px;">
        <a href="{{ URL::previous() }}" style="background-color:black; color:white;" class="btn">Back</a>
    </div>

    <div class="frontend">
        
        <div class="row">
            <img src="/movieimage/{{$movie->movie_banner}}" alt="" width="90%" height="300px">
        </div>
        <div class="row" id="moviecontent">
            <div class="col-md-6">
                <h2>Name: <i>{{ucwords($movie->name) }}</i></h2>
                <h2>Duration: <i>{{ substr($movie->duration, 0, 2) }} HRS {{ substr($movie->duration, 3, 2) }} Min</i></h2>
                <h2>Rating: <i>{{ $movie->rating }}</i></h2>
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

        <div class="row"  style="margin-top: 70px;">
            
            <div class="col-lg-12">
                @if(count($shows) > 0)
                <section class="panel">
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <td>S.no</td>
                                <td>Theater</td>
                                <td>Screen Name</td>
                                <td>Movie</td>
                                <td>Date</td>
                                <td>Slot</td>
                                <td>Seats Available</td>
                                <td><i class="icon_cogs"></i>Action</td>
                            </tr>
                            <?php $i = 0 ?>


                            @foreach($shows as $show)
                            
                            @if($show->show_date >= $date)
                            <tr>
                                
                                <td>{{ $i=$i+1 }}</td>
                                <td>{{ ucwords($show->theater->name) }}</td>
                                <td>Screen {{ $show->screen_id }}</td>
                                <td>{{ ucwords($show->movie->name) }}</td>
                                <td>{{ $show->show_date}}</td>
                                <td>
                                    @if($show->slot == "slot-1")
                                    <?= "Morning 9-12" ?>
                                    @elseif($show->slot == "slot-2")
                                    <?= "Day 12-3" ?>
                                    @elseif($show->slot == "slot-3")
                                    <?= "Evening 3-6" ?>
                                    @elseif($show->slot == "slot-4")
                                    <?= "Evening 6-9" ?>

                                    @else
                                    <?= "not defined" ?>
                                    @endif
                                </td>

                                <td>{{ $show->seats_available }}</td>

                                <td>
                                   <a class="btn btn-primary btm-md" href="/book/{{ $show->id }}">Proceed</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </section>
                @else
                <h1>No Shows Found</h1>
                @endif

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
                    <?php $i= $i+1; ?>
                    <div class="col-md-3">
                        <div class="movie_banner">
                        <a href="/viewmovie/{{ $row->id }}"><img src="/movieimage/{{ $row->movie_banner }}" alt="" width="80%" height="300px"></a>
                        </div>
                        <h4><a href="/viewmovie/{{ $row->id }}">{{ ucwords($row->name) }}</a></h4>
                    </div>
                    @if($i >= 3)
                        @break
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</x-layout>
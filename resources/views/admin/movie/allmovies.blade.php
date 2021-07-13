<x-layout>
  <x-admin_header />
  <x-nav />

  {{-- All Movies Display --}}
  <section id="main-content">
    <section class="wrapper">
      
      
      <div class="row">
        <div class="col-lg-12">
            <div><a class="btn btn-success" href="/addmovie">Add Movie</a></div>
            
            @if(count($movies) > 0)
            <section class="panel">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                <td>S.no</td>
                <td>Name</td>
                <td>Actor</td>
                <td>Actress</td>
                <td>Director</td>
                <td>Producer</td>
                <td>Rating</td>
                <td>Duration</td>
                <td>Release Date</td>
                <td>Genre</td>
                <td>Movie Banner</td>
                <td><i class="icon_cogs"></i>Action</td>
                </tr>
                <?php $i=0 ?>
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $i=$i+1 }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>
                    @foreach($movie->cast as $cast)
                      @if($cast->type == "actor" )
                        {{ $cast->name }}
                      @endif
                    @endforeach


                    <a class="btn btn-primary btn-sm" href="/addcast/{{ $movie->id }}"><i class="icon_plus_alt2"></i></a>
                    </td>
                    <td>
                    @foreach($movie->cast as $cast)
                      @if($cast->type == "actress" )
                        {{ $cast->name }}
                      @endif
                    @endforeach
                    <a class="btn btn-primary btn-sm" href="/addcast/{{ $movie->id }}"><i class="icon_plus_alt2"></i></a>

                    </td>
                    <td>
                    @foreach($movie->cast as $cast)
                      @if($cast->type == "director" )
                        {{ $cast->name }}
                      @endif
                    @endforeach
                    <a class="btn btn-primary btn-sm" href="/addcast/{{ $movie->id }}"><i class="icon_plus_alt2"></i></a>
                    </td>
                    <td>
                    @foreach($movie->cast as $cast)
                      @if($cast->type == "producer" )
                        {{ $cast->name }}
                      @endif
                    @endforeach
                    <a class="btn btn-primary btn-sm" href="/addcast/{{ $movie->id }}"><i class="icon_plus_alt2"></i></a>
                    </td>
                    <td>{{ $movie->rating }}</td>
                    <td>{{ $movie->duration }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td><img src="/movieimage/{{ $movie->movie_banner }}" alt="" width="100" height="100"></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="editmovie/{{ $movie->id }}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                        <x-delete><a style="color:black;"  href="/deletemovie/{{ $movie->id }}">Confirm</a></x-delete>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </section>
            @else
            <h1>No Movies Found</h1>
            @endif

        </div>
      </div>

      
    </section>
  </section>

</x-layout>
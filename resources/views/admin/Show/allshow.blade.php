<x-layout>
  <x-admin_header />
  <x-nav />

  {{-- All Show Display --}}
  <section id="main-content">
    <section class="wrapper">


      <div class="row">
        <div class="col-lg-12">
          <div><a class="btn btn-success" href="/addshow">Add Show</a></div>

          @if(count($shows) > 0)
          <section class="panel">
            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <td>S.no</td>
                  <td>Theater</td>
                  <td>Schreen Name</td>
                  <td>Movie</td>
                  <td>Date</td>
                  <td>Slot</td>

                  <td><i class="icon_cogs"></i>Action</td>
                </tr>
                <?php $i = 0 ?>


                @foreach($shows as $show)
                <tr>
                  <td>{{ $i=$i+1 }}</td>
                  <td>{{ $show->theater_id }}</td>
                  <td>{{ $show->screen_id }}</td>
                  <td>{{ $show->movie_id }}</td>
                  <td>{{ $show->created_at}}</td>
                  <td>{{ $show->slot }}</td>



                  <td>
                    <a class="btn btn-success btn-sm" href="editshow/{{ $show->id }}"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                    <x-delete><a style="color:black;" href="/deleteshow/{{ $show->id }}">Confirm</a></x-delete>
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
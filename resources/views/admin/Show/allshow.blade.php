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
                  <td>Screen Name</td>
                  <td>Movie</td>
                  <td>Date</td>
                  <td>Slot</td>
                  <td>Seats Available</td>
                  <td><i class="icon_cogs"></i>Action</td>
                </tr>
                <?php $i = 0 ?>


                @foreach($shows as $show)
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
                    <a class="btn btn-success btn-sm" href="editshow/{{ $show->id }}"><i class="icon_plus_alt2"></i></a>
                    <a class="btn btn-danger btn-sm" onClick="javascript: alert('Are you sure you want to delete show'); " href="/deleteshow/{{ $show->id }}"><i class="icon_close_alt2"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </section>
          @else
          <h1>No Shows Found</h1>
          @endif

        </div>
      </div>


    </section>
  </section>

</x-layout>
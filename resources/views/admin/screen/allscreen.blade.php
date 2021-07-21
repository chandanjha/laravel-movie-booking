<x-layout>
    <x-admin_header />
    <x-nav />
    <section id="main-content">
    <section class="wrapper">
      
      
      <div class="row">
        <div class="col-lg-12">
    <div><a class="btn btn-success" href="/addscreen/{{ $id }}">Add</a></div>
    
    @if(count($screens) > 0)
    <section class="panel">
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr>
                    <th>Screen Num:- </th>
                    <th>Gold Row</th>
                    <th>Gold Column</th>
                    <th>Gold Seat Count</th>
                    <th>Platinum Row</th>
                    <th>Platinum Column</th>
                    <th>Platinum Seat Count</th>
                    <th>Normal Row</th>
                    <th>Normal Column</th>
                    <th>Normal Seat Count</th>
                    <th><i class="icon_cogs"></i>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0  ?>
                @foreach($screens as $screen)
                <tr>
                    <?php $i = $i+1 ?>
                    <td>{{ $i }}</td>
                    <td>{{ $screen->gold_row }}</td>
                    <td>{{ $screen->gold_column }}</td>
                    <td>{{ $screen->gold_row*$screen->gold_column }}</td>
                    <td>{{ $screen->platinum_row }}</td>
                    <td>{{ $screen->platinum_column }}</td>
                    <td>{{ $screen->platinum_row*$screen->platinum_column }}</td>
                    <td>{{ $screen->normal_row }}</td>
                    <td>{{ $screen->normal_column }}</td>
                    <td>{{ $screen->normal_row*$screen->normal_column }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/editscreen/{{ $screen->id }}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger btn-sm" href="/deletescreen/{{ $screen->id }}"><i class="icon_close_alt2"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </section>
    @else
    <h1>No Record Found</h1>
    @endif
    </div>
      </div>

      
    </section>
  </section>
</x-layout>
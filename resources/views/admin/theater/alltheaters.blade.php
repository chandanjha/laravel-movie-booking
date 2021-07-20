<x-layout>
  <x-admin_header />
  <x-nav />


  <section id="main-content">
    <section class="wrapper">
      
      
      <div class="row">
        <div class="col-lg-12">
        <div><a class="btn btn-success" href="/addtheater">Add Theater</a></div>
        @if(count($theaters) > 0 )
          <section class="panel">


            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>S.no</th>
                  <th><i class="icon_profile"></i>Name</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Screen</th>
                  <th><i class="icon_cogs"></i>Action</th>             
                </tr>
                <?php $i = 0; ?>
                @foreach($theaters as $theater)
                  <tr>
                  <td>{{ $i = $i + 1 }}</td>
                  <td>{{ $theater->name }}</td>
                    <td>
                    @foreach($states as $state)
                      @if($state->id == $theater->state_id)
                      {{ $state->name }}
                      @endif
                    @endforeach
                    </td>
                    <td>
                    @foreach($cities as $city)
                      @if($city->id == $theater->city_id)
                      {{ ucwords($city->name) }}
                      @endif
                    @endforeach
                    </td>
                    <td>{{ substr($theater->address, 0, 60) }} ...</td>
                    <td><a class="btn btn-primary btn-sm" href="allscreen/{{ $theater->id }}">Manage</a></td>
                    <td>
                        <a class="btn btn-success btn-sm" href="edittheater/{{ $theater->id }}"><i class="icon_plus_alt2"></i></a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                        <x-delete><a style="color:black;"  href="/deletetheater/{{ $theater->id }}">Confirm</a></x-delete>
                    </td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </section>
        @else
          <h1>No theaters found</h1>
        @endif
        </div>
      </div>

      
    </section>
  </section>

</x-layout>
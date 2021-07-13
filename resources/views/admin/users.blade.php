<x-layout>
  <x-admin_header />
  <x-nav />


  <section id="main-content">
    <section class="wrapper">
      
      
      <div class="row">
        <div class="col-lg-12">
        <div><a class="btn btn-success" href="/createuser">Add</a></div>
        @if(count($users) > 0 )
          <section class="panel">


            <table class="table table-striped table-advance table-hover">
              <tbody>
                <tr>
                  <th>S.no</th>
                  <th><i class="icon_profile"></i>Name</th>
                  <th><i class="icon_mail_alt"></i>Email</th>
                  <th><i class="icon_mobile"></i> Mobile</th>
                  <th>Role</th>
                  <th>Created At</th>
                  <th><i class="icon_cogs"></i> Action</th>
                </tr>
                <tr>
                  <?php $i = 0; ?>
                  @foreach($users as $user)
                  <td>{{ $i = $i + 1 }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->user_role }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-success" href="/edituser/{{ $user->id }}"><i class="icon_plus_alt2"></i></a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" href="#myModal2"><i class="icon_close_alt2"></i></a>
                      <x-delete><a style="color:black;"  href="/deleteuser/{{ $user->id }}">Confirm</a></x-delete>
                    </div>
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </section>
        @else
          <h1>No users found</h1>
        @endif
        </div>
      </div>

      
    </section>
  </section>

</x-layout>
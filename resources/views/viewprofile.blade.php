<x-layout>
    <x-header />
    <div class="frontend">
        <div style="float: right; width:10%; ">
            <a href="{{ URL::previous() }}" style="background-color:black; color:white;" class="btn">Back</a>
        </div>

        <div id="allcontent" style="margin: auto; width:50%;">
            <h1 style="text-align: center;">My Profile</h1>
            <form method="POST" action="/editpro/{{ $user->id }}" style="margin-top:50px;">

                @csrf

                <div class="form-group col-8">
                    <label for="name">Name</label>

                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}" required>

                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>


                <div class="form-group col-8">
                    <label for="email">Email</label>

                    <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" value="{{ old('email') }}" required>

                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="form-group col-8">
                    <label for="phone">Phone</label>

                    <input class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone }}" value="{{ old('phone') }}" required>

                    @error('phone')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>





                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                </div><br>

            </form>

            <form action="/changepassword/{{ $user->id }}" method="post">
        
                @csrf
                <div class="form-group col-8">
                    <label  for="password">Current Password</label>

                    <input  class="form-control" type="password" name="current_password"  id="password" required>

                    @error('current_password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>


                <div class="form-group col-8">
                    <label  for="password">New Password</label>

                    <input  class="form-control" type="password" name="new_password"  id="password" required>

                    @error('new_password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="form-group col-8">
                    <label  for="password">Confirm Password</label>

                    <input  class="form-control" type="password" name="confirm_password"  id="password" required>

                    @error('confirm_password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div><br>
            

                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Change Password</button>
                </div><br>
            </form>
        </div>

    </div>
</x-layout>
<x-layout>
    <x-admin_header />
    <x-nav />
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center">edit user</h1>
        <form method="POST" action="/edituser/{{ $user->id }}" class="mt-10">

            @csrf

            <div class="form-group col-8">
                <label  for="name">Name</label>

                <input  class="form-control" type="text" name="name" id="name" value="{{ $user->name }}"  required>

                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            
            <div class="form-group col-8">
                <label  for="email">Email</label>

                <input  class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" value="{{ old('email') }}" required>

                @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <!-- <div class="form-group col-8">
                <label  for="password">Password</label>

                <input  class="form-control" type="password" name="password" value="{{ $user->password }}" id="password" required>

                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br> -->


            <div class="form-group col-8">
                <label  for="phone">Phone</label>

                <input  class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone }}" value="{{ old('phone') }}" required>

                @error('phone')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group col-8">
                <label for="user_role">User Role</label>
                <select class="form-control" name="user_role" id="user_role">
                    <option value="{{ $user->user_role }}">{{ $user->user_role }}</option>
                    <option value="consumer">consumer</option>
                    <option value="admin">admin</option>
                </select>
                @error('user_role')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Update User</button>
            </div><br>

            
        </form>
    </div>
</x-layout>
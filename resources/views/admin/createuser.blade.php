<x-layout>
<x-admin_header />
    <x-nav />

    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">create user</h1>
        <form method="POST" action="/createuser" class="mt-10">

            @csrf

            <div class="form-group col-8">
                <label  for="name">Name</label>

                <input  class="form-control" type="text" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}" required>

                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            
            <div class="form-group col-8">
                <label  for="email">Email</label>

                <input  class="form-control" type="email" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" required>

                @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            <div class="form-group col-8">
                <label  for="phone">Phone</label>

                <input  class="form-control" type="text" name="phone" id="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}" required>

                @error('phone')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group col-8">
                <label  for="password">Password</label>

                <input  class="form-control" type="password" name="password" placeholder="Enter Password" id="password" required>

                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            <div class="form-group col-8">
                <label for="user_role">User Role</label>
                <select class="form-control" name="user_role" id="user_role">
                    <option value="">select role</option>
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
                <button class="btn btn-primary btn-sm" type="submit">Create User</button>
            </div><br>

            
        </form>
    </div>
</x-layout>
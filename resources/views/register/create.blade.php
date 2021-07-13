<x-layout>
<x-header />
    
    {{-- Register Page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center">Register</h1>
        <form method="POST" action="/register" class="mt-10">

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

            

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Register</button>
            </div><br>

            
        </form>
    </div>
</x-layout>
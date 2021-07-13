<x-layout>
    <x-header />

    {{-- otp and passoword page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h2 style="text-align:center;">Generate Password</h2>
        <form action="/newpassword" method="post">
            @csrf

            <div class="form-group col-8">
                <label for="otp">Otp</label>
                <input class="form-control" type="text" name="otp" id="otp" placeholder="Enter the Otp" value="{{ old('otp') }}" required >
                @error('otp')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br/>

            <div class="form-group col-8">
                <label  for="password">Password</label>

                <input  class="form-control" type="password" name="password" id="password" placeholder="Enter the password" required>

                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group col-8">
                <label  for="confirm_passowrd">Confirm Password</label>

                <input  class="form-control" type="password" name="confirm_passowrd" id="confirm_passowrd" placeholder="Enter the confirm password" required>

                @error('confirm_passowrd')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">New Password</button>
            </div><br>
        </form>
    </div>
</x-layout>
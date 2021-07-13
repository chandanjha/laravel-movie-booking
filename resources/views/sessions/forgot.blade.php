<x-layout>
    <x-header />

    {{-- forgot page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Forgot Password</h1>
        <form method="POST" action="/forgot_password" class="mt-10">

            @csrf


            <div class="form-group col-8">
                <label for="email">Email</label>

                <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" required>

                @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Get Reset Code</button>
            </div><br>
        </form>
        
    </div>
</x-layout>
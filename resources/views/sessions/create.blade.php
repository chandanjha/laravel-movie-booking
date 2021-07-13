<x-layout>
    <x-header />
    <div class="container">
        {{-- Login page --}}
        <form class="login-form" method="POST" action="/login" >
            @csrf
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" class="form-control"  name="password" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                    @enderror
                </div>
                <label class="checkbox">
                    <span class="pull-right"> <a href="/forgot_password"> Forgot Password?</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                </div>
        </form>
    </div>
</x-layout>


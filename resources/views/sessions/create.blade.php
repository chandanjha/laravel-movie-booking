<x-layout>
    <x-header />
    <div class="container">
        @php
            if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_password']))
            {
                $login_email = $_COOKIE['login_email'];
                $login_password = $_COOKIE['login_password'];
                $is_remember = "checked='checked'";
            }
            else
            {  
                $login_email = '';
                $login_password = '';
                $is_remember = "";
            }
        @endphp
        {{-- Login page --}}
        <form class="login-form" method="POST" action="/login" autocomplete="off">
            @csrf
            <div class="login-wrap">
                <p class="login-img"><i class="icon_lock_alt"></i></p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_profile"></i></span>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ $login_email }}" value="{{ old('email') }}"  required>
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input type="password" class="form-control" name="password" id="myInput" placeholder="Password" value="{{ $login_password }}" required>
                    <span class="input-group-addon"> <i class="fa fa-fw fa-eye" 
                    onclick="myFunction()"
                    ></i></span>
                    
                    
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <label class="checkbox">
                    <input type="checkbox" name="remember_me" value="1" {{$is_remember}} > Remember me
                    <span class="pull-right"> <a href="/forgot_password"> Forgot Password?</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </div>
        </form>

    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") 
            {
                x.type = "text";
            } 
            else
            {
                x.type = "password";
            }
        }
    </script>
</x-layout>
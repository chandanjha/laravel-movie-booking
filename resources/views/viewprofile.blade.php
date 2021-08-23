<x-layout>
    <x-header />
    <div class="frontend">
        <div id="allcontent">
            <h1 style="text-align: center;">My Profile</h1>
            <form method="POST" action="/editpro/{{ $user->id }}" class="mt-10">

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
        </div>

    </div>
</x-layout>
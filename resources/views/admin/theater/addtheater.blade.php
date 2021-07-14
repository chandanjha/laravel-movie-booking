<x-layout>
    <x-admin_header />
    <x-nav />
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Add Theater</h1>
        <form method="POST" action="/addtheater" class="mt-10">

            @csrf

            <div class="form-group col-8">
                <label for="name">Name</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Theater Name" value="{{ old('name') }}" required>

                @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>


            <div class="form-group col-8">
                <label for="state">State</label>
                <select class="form-control" name="state_id" id="state_id">
                    <option value="">Select State</option>
                    @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                @error('state_id')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group col-8">
                <label for="city">City</label>
                <select class="form-control" name="city_id" id="city_id">
                    <option value="">Select City</option>
                </select>
            </div><br>

            <div class="form-group col-8">
                <label for="address">Address</label>

                <input class="form-control" type="text" name="address" placeholder="Enter Address" id="password" value="{{ old('address') }}"required>

                @error('address')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>

        </form>
    </div>


</x-layout>
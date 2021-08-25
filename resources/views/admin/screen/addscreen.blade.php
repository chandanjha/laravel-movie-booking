<x-layout>
    <x-admin_header />
    <x-nav />
    
        <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
            <h1 style="text-align:center;">Add Screen <i>for</i> {{ ucwords($theater->name) }}</h1>
            <form method="POST" action="/addscreen/{{ $theater->id }}" class="mt-10">

                @csrf

                <div class="form-group">
                    <label for="gold_seat">Gold Seat</label>
                    <span id="gold_seat" style="height:auto;"></span>
                </div>

                <div class="form-group col-8">
                    <label  for="gold_row">Gold Row</label>

                    <input  class="form-control" type="number" onchange="goldSeat()" name="gold_row" id="gold_row" value="{{ old('gold_row') }}" required>

                    @error('gold_row')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="form-group col-8">
                    <label  for="gold_column">Gold Column</label>

                    <input  class="form-control" type="number" onchange="goldSeat()" name="gold_column" id="gold_column" value="{{ old('gold_column') }}" required>

                    @error('gold_column')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>


                <div class="form-group">
                    <label for="platinum_seat">Platinum Seat</label>
                    <span id="platinum_seat" style="height:auto;"></span>
                </div>

                <div class="form-group col-8">
                    <label  for="platinum_row">Platinum Row</label>

                    <input  class="form-control" type="number" onchange="platinumSeat()" name="platinum_row" id="platinum_row" value="{{ old('platinum_row') }}" required>

                    @error('platinum_row')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="form-group col-8">
                    <label  for="platinum_column">Platinum Column</label>

                    <input  class="form-control" type="number" onchange="platinumSeat()" name="platinum_column" id="platinum_column" value="{{ old('platinum_column') }}" required>

                    @error('platinum_column')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>


                <div class="form-group">
                    <label for="normal_seat">Normal Seat</label>
                    <span id="normal_seat" style="height:auto;"></span>
                </div>

                <div class="form-group col-8">
                    <label  for="normal_row">Normal Row</label>

                    <input  class="form-control" type="number" onchange="normalSeat()" name="normal_row" id="normal_row" value="{{ old('normal_row') }}" required>

                    @error('normal_row')
                    <div class="alert alert-danger" role="alert">
                    {{ $message }}
                    </div>
                    @enderror
                </div><br>

                <div class="form-group col-8">
                    <label  for="normal_column">Normal Column</label>

                    <input  class="form-control" type="number" onchange="normalSeat()" name="normal_column" id="normal_column" value="{{ old('normal_column') }}" required>

                    @error('normal_column')
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
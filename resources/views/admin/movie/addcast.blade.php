<x-layout>
    <x-admin_header />
    <x-nav />
    {{-- Add Cast Page --}}
    <div class="col-5" style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Movie</h1>
        @if($errors->any())      
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="/addcast" method="post" class="mt-10" >
            @csrf
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <input type="hidden" name="type" value="actor">
                <label for="actor">Actor</label>
                
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie actor"  >

            </div><br>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>
        <table class="table  table-advance table-hover">
        <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "actor")
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            @endif
            @if($i == 1)
                @break
            @endif
            @endforeach
            <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "actor")
            <tr style="background-color: #666;">
                <td>{{ $i=$i+1 }}</td>
                <td>{{ $cast->name }}</td>
                <td>
<<<<<<< HEAD
                    <a class="btn btn-danger btn-sm" onClick="javascript: alert('Are you sure you want to delete cast'); " href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>             
=======
                    <a class="btn btn-danger btn-sm"  href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>     
>>>>>>> 3b094669decd0218f300bc59e3538eed4818b92d
                </td>
            </tr>
            
            @endif
            @endforeach
            
            </tbody>
        </table>
        
        <br>


        <form action="/addcast" method="post" class="mt-10" >
            @csrf
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <input type="hidden" name="type" value="actress">
                <label for="actress">Actress</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie actress"  > 
            </div><br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>

        <table class="table  table-advance table-hover">
        <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "actress")
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            @endif
            @if($i == 1)
                @break
            @endif
            @endforeach
            
            <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "actress")
            <tr style="background-color: #666;">
                <td>{{ $i=$i+1 }}</td>
                <td>{{ $cast->name }}</td>
                <td>
<<<<<<< HEAD
                <a class="btn btn-danger btn-sm" onClick="javascript: alert('Are you sure you want to delete cast'); " href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>             
=======
                    <a class="btn btn-danger btn-sm"  href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>            
>>>>>>> 3b094669decd0218f300bc59e3538eed4818b92d
                </td>
            </tr>
            @endif
            @endforeach
            
            </tbody>
        </table>
        <br>


        <form action="/addcast" method="post" class="mt-10" >
            @csrf
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <input type="hidden" name="type" value="director">
                <label for="director">Director</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie director"  >

               
            </div><br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>

        <table class="table  table-advance table-hover">
            <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "director")
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            @endif
            @if($i == 1)
                @break
            @endif
            @endforeach
            <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "director")
            <tr style="background-color: #666;">
                <td>{{ $i=$i+1 }}</td>
                <td>{{ $cast->name }}</td>
                <td>
<<<<<<< HEAD
                <a class="btn btn-danger btn-sm" onClick="javascript: alert('Are you sure you want to delete cast'); " href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>             
=======
                    <a class="btn btn-danger btn-sm"  href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>          
>>>>>>> 3b094669decd0218f300bc59e3538eed4818b92d
                </td>
            </tr>
            
            @endif
            @endforeach
            
            </tbody>
        </table>
        <br>


        <form action="/addcast" method="post" class="mt-10" >
            @csrf
            <div class="form-group col-8">
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <input type="hidden" name="type" value="producer">
                <label for="producer">Producer</label>

                <input class="form-control" type="text" name="name" id="name" placeholder="Enter Movie producer"  >

               
            </div><br>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Add</button>
                <button class="btn btn-danger btn-sm" type="reset">Reset</button>
            </div><br>
        </form>

        <table class="table  table-advance table-hover">
            <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "producer")
            <?php $i = $i+1; ?> 
            <tbody>
            <tr style="background-color: #222;">
                <th>S.no</th>
                <th>Name</th>
                <th><i class="icon_cogs"></i>Action</th>
            </tr>
            @endif
            @if($i == 1)
                @break
            @endif
            @endforeach
            <?php $i=0 ?>
            @foreach($casts as $cast)
            @if($cast->type == "producer")
            <tr style="background-color: #666;">
                <td>{{ $i=$i+1 }}</td>
                <td>{{ $cast->name }}</td>
                <td>
<<<<<<< HEAD
                <a class="btn btn-danger btn-sm" onClick="javascript: alert('Are you sure you want to delete cast'); " href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>             
=======
                    <a class="btn btn-danger btn-sm" href="/deletecast/{{ $cast->id }}"><i class="icon_close_alt2"></i></a>            
>>>>>>> 3b094669decd0218f300bc59e3538eed4818b92d
                </td>
            </tr>
            @endif
            @endforeach
            
            </tbody>
        </table>

        <a class="btn btn-danger btn-m" href="/allmovies">Save</a>
    </div>
</x-layout>
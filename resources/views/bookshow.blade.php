<?php date_default_timezone_set("Asia/Kolkata"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Movie booking web app">
    <meta name="author" content="Yatin Verma">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>CineMbs</title>

    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/homeheader.css">
</head>

<body>
    {{-- Add Show Page --}}
    <div style="width: 50%; margin:auto; padding: 4%; background-color:darkgrey;color:black; height:auto;">
        <h1 style="text-align:center;">Book Show</h1>

        <form class="form-inline">
            <div class="custom-select my-1 mr-sm-2" id="theater_id">
                <label for="theater_id">Theater</label>
                
                    <option selected>Choose...</option>
                    @foreach($theaters as $row)
                    @if($row->id == $show->theater_id)
                    <td>{{$row->name}}</td>
                    @endif
                    @endforeach

                    @error('Theater')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror


                </select>
            </div><br>

            <div class="custom-select my-1 mr-sm-2">
                <label for="screen">Screen</label>
                <select id="screen_id">
                    <option selected>Choose...</option>
                    <?php $count = 0; ?>
                    @foreach($screen as $row)
                    <?php $count = $count + 1; ?>
                    @if($row->id == $show->screen_id)
                    <td>screen {{$count}}</td>
                    @endif
                    @endforeach

                    @error('Theater')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror


                </select>
            </div><br>

            <div class="form-control">
                <label for="slot_id">Slot</label>
                <select name="slot" id="slot-id">
                    <option value="">Select Slot</option>
                    <option value="slot-1">Morning 9-12</option>
                    <option value="slot-2">Day 12-3</option>
                    <option value="slot-3">Evening 3-6</option>
                    <option value="slot-4">Evening 6-9</option>
                </select>
            </div><br>

            <div class="form-group col-8">
                <label for="gold_column">No Of Seat</label>

                <input class="form-control" type="text" name="No_of_seat" id="seat_id" required>

                @error('No of Seat')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div><br>

    </div><br>




    <div>



    </div>


    <button type="submit" class="btn btn-primary my-1">Book Slot</button>
    </form>

</body>

</html>
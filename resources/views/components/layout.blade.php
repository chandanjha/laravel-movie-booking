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
    <!-- container section start -->
    <section id="container" class="">
    {{ $slot }}

    @if (session()->has('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>

    @endif
    </section>
    <!-- container section end -->
    <!-- javascripts -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="/js/jquery.scrollTo.min.js"></script>
    <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('#state_id').on('change', function() {
                var state_id = this.value;
                $("#state_id").html('');
                $.ajax({
                    url: "{{url('getcity')}}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city_id').html('<option value="">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        
                        $.each(result.state, function(key, value) {
                            $("#state_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $.each(result.allstate, function(key, value) {
                            $("#state_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    }
                });
            });
            
        });
    </script>
</body>
</html>



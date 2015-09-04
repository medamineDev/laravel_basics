<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

    <title>Hello_laravel</title>


    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}


    <link rel="stylesheet" href="{{ URL::asset('libs/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('libs/css/bootstrap-theme.min.css') }}">


    <script src="{{ URL::asset('libs/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('libs/js/bootstrap.min.js') }}"></script>


    <script language="JavaScript">

        var host = "http://laravel.dev:8000/";

    </script>
    <script src="{{ URL::asset('javascrypt/main.js') }}"></script>


    <style>

        .container {

        rgba(211, 211, 211, 0.5);
            border: 1px solid rgb(162, 133, 133);

        }

        .list-group-item:hover {

            background: rgba(95, 158, 160, 0.5);
        }

        .list-group-item:active {
            background: cadetblue;
        }

    </style>

</head>
<body>


<div class="container" style="">

    <center><h2>Hello Laravel</h2></center>
    <br>

    @yield("container")


</div>

<div class="footer">

    @yield("footer")

</div>


@yield("javascript_section")


</body>


</html>
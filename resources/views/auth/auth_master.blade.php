<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.png">


    @yield("title")


    <link href="{{URL::asset('template/bs3/css/bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{URL::asset('template/css/bootstrap-reset.css')  }}" rel="stylesheet">
    <link href="{{URL::asset('template/font-awesome/css/font-awesome.css')  }}" rel="stylesheet">


    <link href="{{URL::asset('template/css/style.css')  }}" rel="stylesheet">
    <link href="{{URL::asset('template/css/style-responsive.css')  }}" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('template/js/ie8-responsive-file-warning.js')  }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script language="JavaScript">

        var host = "http://laravel.dev:8000/";

    </script>
    <script src="{{ URL::asset('javascrypt/main.js') }}"></script>


    <style>

        .login-body {

            background: url('/imgs/auth_back.jpg');
        }

    </style>

</head>

<body class="login-body">

<a href="javascript:void(0)" onclick="auth_fn.set_lang('fr')"><img src="/imgs/fr.png"> </a>
<a href="javascript:void(0)" onclick="auth_fn.set_lang('en')"><img src="/imgs/gb.png"> </a>

<div id="msg"></div>


<div class="container">


    @yield('auth_content')


</div>


<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="{{ URL::asset('template/js/jquery.js')  }}"></script>
<script src="{{ URL::asset('template/bs3/js/bootstrap.min.js')  }}"></script>


@yield('jsSection')


<script language="javascript">


</script>


</body>
</html>

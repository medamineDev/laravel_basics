<!-- resources/views/auth/login.blade.php -->


@extends("auth.auth_master")


@section("title")

    <title>Login</title>

@endsection


@section("auth_content")





    {!! Form::open(array( 'id'=>'login_form',  'class'=>"form-signin"))  !!}
    {!! csrf_field() !!}

    {{-- {{ trans('forms.Login_msg') }}--}}


    <h2 class="form-signin-heading">@lang("forms.login_msg")</h2>

    <div class="login-wrap">
        <div class="user-login-info">

            @lang("forms.mail_input_msg")
            {!! Form::text('email', Input::old('email'), array( 'class'=>'form-control','placeholder' => 'awesome@awesome.com')) !!}
            {!! $errors->first('email') !!}




            @lang("forms.password_input_msg")
            {!! Form::password('password' , array('class'=>"form-control",'placeholder'=>'Password :)')) !!}
            {!! $errors->first('password') !!}
        </div>
        <label class="checkbox">
            <input type="checkbox" name="remember" value="remember-me">@lang("forms.remember_me_msg")
            <span class="pull-right">
                   <a data-toggle="modal" href="#myModal">  @lang("forms.password_forget_msg")</a>

               </span>
        </label>

        {!! Form::submit(Lang::get('forms.submit_msg'),array('class'=>'btn btn-lg btn-login btn-block')) !!}
        {!! Form::close() !!}

        <div class="registration">
            @lang("forms.dont_have_account")
            <a class="" href="/auth/register">
                @lang("forms.create_account")
            </a>
        </div>

    </div>

    <!-- Modal -->

    <!-- modal -->



@endsection

<script src="{{ URL::asset('template/js/jquery.js')  }}"></script>



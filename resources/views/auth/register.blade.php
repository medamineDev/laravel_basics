<!-- resources/views/auth/login.blade.php -->


@extends("auth.auth_master")

@section("title")

    <title>Register</title>

@endsection

@section("auth_content")


    {!! Form::open(array('id'=>"regForm", 'class'=>"regForm"))  !!}
    {!! csrf_field() !!}


    <h2 class="form-signin-heading">@lang("forms.register_msg")</h2>

    <div class="login-wrap">
        <div class="user-login-info">

            @lang("forms.mail_input_msg")
            {!! Form::text('email', Input::old('email'), array('class'=>'form-control','placeholder' => 'your_mail@mail.com')) !!}
            {!! $errors->first('email') !!}

            @lang("forms.password_input_msg")
            {!! Form::password('password' , array('class'=>"form-control",'placeholder'=>'Password :)')) !!}

            @lang("forms.Rpassword_input_msg")
            {!! Form::password('password_confirmation' , array('class'=>"form-control",'placeholder'=>'Password :)')) !!}

            {!! $errors->first('password') !!}
        </div>

        {!! Form::submit(Lang::get('forms.submit_msg'),array('class'=>'btn btn-lg btn-login btn-block')) !!}
        {!! Form::close() !!}

        <div class="registration">
            @lang("forms.have_account")
            <a class="" href="/auth/login">
                @lang("forms.login_msg")
            </a>
        </div>

    </div>


    @if($errors->has())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif



@endsection



<script src="{{ URL::asset('template/js/jquery.js')  }}"></script>

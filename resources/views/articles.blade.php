@extends("master")
@section("container")


    <h1>Nouveau Article </h1>


    <center>

        <div class="my_from" style="width: 50%">


            <div class="form-group">
                {!! Form::label('Nom de l article  ') !!}
                {!! Form::text('title', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Nom de l"article ')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('prixx') !!}
                {!! Form::text('prixx', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Prixx')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Your Message') !!}
                {!! Form::textarea('message', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your message')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Contact Us!',
                  array('class'=>'btn btn-primary')) !!}
            </div>


        </div>
        {{ Html::ul($errors->all()) }}

    </center>



    <center>

        <!-- 'url' => 'add_art' -->
        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {!! Form::open(array('id'=>'add_art_form')) !!}
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="form-group">
            {!! Form::label('titre', 'titre') !!}
            {!! Form::text('titre', Input::old('titre'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('prix', 'prix') !!}
            {!! Form::text('prix', Input::old('prix'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('n', 'Nerd Level') !!}
            {!! Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) !!}
        </div>

        {!! Form::submit('Ajouter!', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}


    </center>


    <h1>On Article</h1>

    <h1>Showing {{ $one_art->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $one_art->title }}</h2>

        <p>
            <strong>Price:</strong> {{ $one_art->price }}<br>
            <strong>Created At:</strong> {{ $one_art->created_at }}
        </p>
    </div>



    <h1>Mes Articles </h1>
    <br>

    <ul class="list-group">

        @foreach($articles as $article)
            <li class="list-group-item">
                <b>    {{ $article->title }} </b>
                {{ $article->price }}


            </li>
        @endforeach

    </ul>


@stop

@section("footer")


    @include("footer");

@stop



@section("javascript_section")


    <script language="javascript">

        var array = {'titre': 'Acer', 'price': '1200'};
        articles_fn.add_art();
        articles_fn.delete_art(1);
        articles_fn.get_art(1);
        articles_fn.get_all_arts();
        articles_fn.update_art(1, array);


    </script>
@stop




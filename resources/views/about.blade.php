@extends("master")
@section("container")


    <h1>Successful About Page Mr {{ $nom}}:) lool </h1>
    <br>

    <h3>

        Poste : {{ $poste }}
        {{--Skills : {{ $skills }}--}}
    </h3>


    <ul class="list-group">

        @foreach($skills as $skill)
            <li class="list-group-item">
                <b>    {{ $skill }}</b>
                @if($skill=="laravel")

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, facere.</p>

                @else
                    <p>
                        Not laravel :))
                    </p>
                @endif


            </li>
        @endforeach

    </ul>

@stop

@section("footer")


    @include("footer");

@stop




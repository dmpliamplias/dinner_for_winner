@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(count($recipes) === 0)
            @else
            @foreach($recipes as $recipe)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <a href="/recipe/{{ $recipe->id }}"><img class="card-img-top" src="{{ asset($recipe->imagePath) }}" style="height: 255px; width: 100%"></a>
                    <div class="card-body">
                        <p class="card-text"><b>{{ $recipe->name }}</b></p>
                        <p class="card-text">
                            {{ $recipe->description }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {!! Form::open(['action' => 'Recipe\CalendarController@store', 'method' => 'POST']) !!}
                                {{Form::submit('Übernehmen', ['class' => 'btn btn-sm btn-outline-secondary'])}}
                                {!! Form::close() !!}

                                {!! Form::open(['action' => 'Recipe\CalendarController@store', 'method' => 'POST']) !!}
                                {{Form::submit('Neu', ['class' => 'btn btn-sm btn-outline-secondary'])}}
                                {!! Form::close() !!}

                                {!! Form::open(['action' => 'Recipe\CalendarController@', 'method' => 'POST']) !!}
                                {{Form::submit('Löschen', ['class' => 'btn btn-sm btn-outline-secondary'])}}
                                {!! Form::close() !!}
                            </div>
                            <small class="text-muted">{{ $recipe->time }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection

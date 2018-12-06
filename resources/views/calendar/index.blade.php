@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(sizeof($recipes) === 0)
                <p>Sie müseen zuerst Rezepte erfassen!</p>
            @elseif(sizeof($recipes) < 21)
                @for($i = 0; $i < sizeof($recipes); $i++)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <a href="/recipe/{{ $recipes[$i]->id }}"><img class="card-img-top" src="{{ asset($recipes[$i]->imagePath) }}" style="height: 255px; width: 100%"></a>
                            <div class="card-body">
                                <p class="card-text"><b>{{ $recipes[$i]->name }}</b></p>
                                <p class="card-text">
                                    {{ $recipes[$i]->description }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        {!! Form::open(['action' => 'Calendar\CalendarController@store', 'method' => 'POST']) !!}
                                        {{ Form::text('index', $i, ['hidden' => true]) }}
                                        {{ Form::text('recipeId', $recipes[$i]->id, ['hidden' => true]) }}
                                        {{ Form::submit('Übernehmen', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                        {!! Form::close() !!}

                                        {!! Form::open(['action' => 'Calendar\CalendarController@store', 'method' => 'POST']) !!}
                                        {{ Form::submit('Neu', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                        {!! Form::close() !!}

                                        {!! Form::open(['action' => 'Calendar\CalendarController@store', 'method' => 'POST']) !!}
                                        {{ Form::submit('Löschen', ['class' => 'btn btn-sm btn-outline-secondary'] )}}
                                        {!! Form::close() !!}
                                    </div>
                                    <small class="text-muted">{{ $recipes[$i]->time }} Minuten</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @for($i = 0; $i < 20; $i++)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <a href="/recipe/{{ $recipes[$i]->id }}"><img class="card-img-top" src="{{ asset($recipes[$i]->imagePath) }}" style="height: 255px; width: 100%"></a>
                            <div class="card-body">
                                <p class="card-text"><b>{{ $recipes[$i]->name }}</b></p>
                                <p class="card-text">
                                    {{ $recipes[$i]->description }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        {!! Form::open(['action' => 'Calendar\CalendarController@store', 'method' => 'POST']) !!}
                                        {{ Form::text('index', $i, ['hidden' => true]) }}
                                        {{ Form::text('recipeId', $recipes[$i]->id, ['hidden' => true]) }}
                                        {{ Form::submit('Übernehmen', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                        {!! Form::close() !!}

                                        {!! Form::open(['action' => 'Calendar\CalendarController@store', 'method' => 'POST']) !!}
                                        {{ Form::submit('Neu', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                        {!! Form::close() !!}

                                        {!! Form::open(['action' => 'Calendar\CalendarController@store', 'method' => 'POST']) !!}
                                        {{ Form::submit('Löschen', ['class' => 'btn btn-sm btn-outline-secondary'] )}}
                                        {!! Form::close() !!}
                                    </div>
                                    <small class="text-muted">{{ $recipes[$i]->time }} Minuten</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>
@endsection

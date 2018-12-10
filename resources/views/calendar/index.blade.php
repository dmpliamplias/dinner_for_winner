@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($amountOfRecipes < 21)
                @for($x = 0; $x < $amountOfRecipes; $x++)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <a href="/recipe/{{ $calendars[$x]->recipe()->getResults()->id }}"><img class="card-img-top" src="{{ asset($calendars[$x]->recipe()->getResults()->imagePath) }}" style="height: 255px; width: 100%"></a>
                            <div class="card-body">
                                <p class="card-text"><b>{{ $calendars[$x]->recipe()->getResults()->name }}</b></p>
                                <p class="card-text">
                                    Kategorien: {{ $calendars[$x]->recipe()->getResults()->categories }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        {!! Form::open(['action' => ['Calendar\CalendarController@store', $calendars[$x]->id], 'method' => 'POST']) !!}
                                        {{ Form::text('day', 'monday', ['hidden' => true]) }}
                                        {{ Form::text('daytime', 'morning', ['hidden' => true ] ) }}
                                        {{ Form::submit('Übernehmen', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                        {!! Form::close() !!}

                                        {!! Form::open(['action' => ['Calendar\CalendarController@newRecipe', $calendars[$x]->id], 'method' => 'POST']) !!}
                                        {{Form::text('recipeId', $calendars[$x]->recipe()->getResults()->id, ['hidden' => true])}}
                                        {{ Form::submit('Neu', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                        {!! Form::close() !!}

                                        {!! Form::open(['action' => ['Calendar\CalendarController@unconfirm', $calendars[$x]->id], 'method' => 'POST']) !!}
                                        {{ Form::submit('Löschen', ['class' => 'btn btn-sm btn-outline-secondary'] )}}
                                        {!! Form::close() !!}
                                    </div>
                                    <div>
                                        @if($calendars[$x]->confirmed)
                                            ✔
                                        @endif
                                    </div>
                                    <small class="text-muted">{{ $calendars[$x]->recipe()->getResults()->time }} Minuten</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @for($i = 0; $i < sizeof($calendars) - 1; $i++)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href="/recipe/{{ $calendars[$i]->recipe()->getResults()->id }}"><img class="card-img-top" src="{{ asset($calendars[$i]->recipe()->getResults()->imagePath) }}" style="height: 255px; width: 100%"></a>
                        <div class="card-body">
                            <p class="card-text"><b>{{ $calendars[$i]->recipe()->getResults()->name }}</b></p>
                            <p class="card-text">
                                {{ $calendars[$i]->recipe()->getResults()->categories }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    {!! Form::open(['action' => ['Calendar\CalendarController@store', $calendars[$i]->id], 'method' => 'POST']) !!}
                                    {{Form::text('day', 'monday', ['hidden' => true])}}
                                    {{Form::text('daytime', 'morning', ['hidden' => true])}}
                                    {{ Form::submit('Übernehmen', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                    {!! Form::close() !!}

                                    {!! Form::open(['action' => ['Calendar\CalendarController@newRecipe', $calendars[$i]->id], 'method' => 'POST']) !!}
                                    {{Form::text('recipeId', $calendars[$i]->recipe()->getResults()->id, ['hidden' => true])}}
                                    {{ Form::submit('Neu', ['class' => 'btn btn-sm btn-outline-secondary']) }}
                                    {!! Form::close() !!}

                                    {!! Form::open(['action' => ['Calendar\CalendarController@unconfirm', $calendars[$i]->id], 'method' => 'POST']) !!}
                                    {{ Form::submit('Löschen', ['class' => 'btn btn-sm btn-outline-secondary'] )}}
                                    {!! Form::close() !!}
                                </div>
                                <div>
                                    @if($calendars[$i]->confirmed)
                                        ✔
                                    @endif
                                </div>
                                <small class="text-muted">{{ $calendars[$i]->recipe()->getResults()->time }} Minuten</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            @endif
        </div>
    </div>
    @if($amountOfRecipes > 0)
        <div class="container" style="margin-top: 40px">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kalorien</th>
                            <th>Kolenhydrate</th>
                            <th>Fett</th>
                            <th>Fettsäuren</th>
                            <th>Zucker</th>
                            <th>Protein</th>
                        </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>{{ $values[0] }} kcal</td>
                           <td>{{ $values[1] }} g</td>
                           <td>{{ $values[2] }} g</td>
                           <td>{{ $values[3] }} g</td>
                           <td>{{ $values[4] }} g</td>
                           <td>{{ $values[5] }} g</td>
                       </tr>
                       </tbody>
                    </table>
                    <div class="alert alert-info" role="alert">
                        <b>Gesamtkosten für bestätigte Rezepte: {{ $values[6] }} CHF</b>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

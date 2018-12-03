@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Über "Dinner für Gewinner"</h1>
        <p> Dinner für Gewinner ist die ideale Plattform für alle, die:
            <ul>
                <li>Zeit sparen möchten</li>
                <li>nicht wissen, was sie kochen sollen</li>
                <li>es genau nehmen mit der Ernährung</li>
                <li>die sich einfach gesund ernähren möchten</li>
                <li>die genau aufs Budget schauen</li>
                <li>Kalorien zählen</li>
                <li>etwas Unterstützung beim Abnehmen gebrauchen können</li>
                <li>nicht gerne einkaufen gehen</li>
                <li>Lust haben unserere Webseite zu benützen</li>
            </ul>
            So schnell haben Sie noch nie einen Einkaufszettel geschrieben! Sparen Sie Zeit, die Sie fürs Kochen brauchen können.
        </p>

        <h2> Das Team </h2>
        <p>
            Hinter dem Projekt stehen drei Wirtschaftsinformatiker die sich während des Studiums an der FHNW kennen gelernt haben.
        </p>

        <div class="row">
             <div class="col-12 col-sm-4">
                <div class="card" >
                    <img class="card-img-top rounded" src="{{ asset('img/dyoni.JPG') }}"  alt="Dyoni">
                    <div class="card-body">
                        <h5 class="card-title">Dyoni Plämpläm</h5>
                        <p>Der, der mit dem Code tanzt</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card">
                    <img class="card-img-top rounded" src="{{ asset('img/adrian.jpg') }}" alt="Ädu">
                    <div class="card-body">
                        <h5 class="card-title">Ädu Widmer</h5>
                        <p>Der Agile</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card">
                    <img class="card-img-top rounded" src="{{ asset('img/nico.jpg') }}" alt="Nico Wäuti">
                    <div class="card-body">
                        <h5 class="card-title">Nico</h5>
                        <p>Der Grossmaulige</p>
                    </div>
                </div>
            </div>
        </div>
        <h2>Kontakt</h2>
        <p>Haben Sie Veresserungsvorschläge oder eine Frage? Zögern Sie nicht uns zu kontaktieren:</p>

        {!! Form::open(['action'=>'About\AboutController@contactUSPost','method'=>'POST']) !!}
            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}

            </div>
        {!! Form::close() !!}


    </div>
@endsection

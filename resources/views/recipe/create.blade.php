@extends('layouts.app')

@section('title')
    Person hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => 'Person\PersonController@add', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('tageszeit', 'Tageszeit')}}
        {{Form::select('tageszeit', ['Mo' => 'Morgen', 'Mi' => 'Mittag', 'Ab' => 'Abend'])}}
    </div>
    <div class="form-group">
        {{Form::label('beschreibung', 'Beschreibung')}}
        {{Form::textarea('beschreibung', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Beschreibung'])}}
    </div>
    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection
@extends('layouts.app')

@section('tltle')
    Person hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => 'PersonController@add', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::label('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('beschreibung', 'Beschreibung')}}
            {{Form::textarea('beschreibung', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Beschreibung'])}}
        </div>
        {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
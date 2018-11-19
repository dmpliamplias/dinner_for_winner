@extends('layouts.app')

@section('title')
    Rezept hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => 'Recipe\RecipeController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('daytime', 'Tageszeit')}}
        {{Form::select('daytime', ['morning' => 'Frühstück', 'midday' => 'Mittagessen', 'evening' => 'Abendessen'], null, ['class' => 'form-control', 'multiple', 'data-placeholder' => 'Bitte wählen'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Beschreibung')}}
        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Beschreibung'])}}
    </div>
    <div class="form-group">
        {{Form::label('time', 'Zeit')}}
        {{Form::number('time', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection

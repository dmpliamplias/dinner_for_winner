@extends('layouts.app')

@section('title')
    Rezept bearbeiten
@endsection

@section('content')

    {!! Form::open(['action' => ['Recipe\RecipeController@update', $recipe->id], 'method' => 'PUT']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $recipe->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('daytime', 'Tageszeit')}}
        {{Form::select('daytime[]', ['morning' => 'Frühstück', 'midday' => 'Mittagessen', 'evening' => 'Abendessen'], $recipe->daytime, ['class' => 'form-control', 'multiple' => true, 'data-placeholder' => 'Bitte wählen'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Beschreibung')}}
        {{Form::textarea('description', $recipe->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Beschreibung'])}}
    </div>
    <div class="form-group">
        {{Form::label('time', 'Zeit')}}
        {{Form::number('time', $recipe->time, ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    {!! Form::open(['action' => ['Recipe\RecipeController@destroy', $recipe->id], 'method' => 'DELETE']) !!}
    {{Form::submit('Löschen', ['class' => 'btn btn-secondary'])}}
    {!! Form::close() !!}

@endsection

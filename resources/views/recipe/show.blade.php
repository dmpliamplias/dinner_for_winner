@extends('layouts.app')

@section('title')
    Rezept bearbeiten
@endsection

@section('content')

    {!! Form::open(['action' => ['Recipe\RecipeController@update', $recipe->id], 'method' => 'POST', 'files' => 'true']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $recipe->name, ['class' => 'form-control', 'placeholder' => 'Name'] )}}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Beschreibung') }}
        {{ Form::textarea('description', $recipe->description, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('products', 'Produkte') }}
        {{ Form::select('products[]', $products, null, ['class' => 'form-control', 'multiple' => true, 'data-placeholder' => 'Bitte wählen']) }}
    </div>
    <div class="form-group">
        {{ Form::label('categories', 'Kategorien') }}
        {{ Form::select('categories[]', $categories, null, ['class' => 'form-control', 'multiple' => true, 'data-placeholder' => 'Bitte wählen']) }}
    </div>
    <div class="form-group">
        {{ Form::label('time', 'Zeit') }}
        {{ Form::number('time', $recipe->time, ['class' => 'form-control'] )}}
    </div>
    <div class="form-group">
        {{Form::label('file', 'Bild')}}
        {{Form::file('file', ['class' => 'form-control-file'])}}
    </div>
    <div class="btn-group">
        {{ Form::submit('Speichern', ['class' => 'btn btn-primary'] )}}
        {!! Form::close() !!}

        {!! Form::open(['action' => ['Recipe\RecipeController@destroy', $recipe->id], 'method' => 'DELETE']) !!}
        {{Form::submit('Löschen', ['class' => 'btn btn-danger'])}}
        {!! Form::close() !!}
    </div>

@endsection

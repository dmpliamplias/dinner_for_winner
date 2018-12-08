@extends('layouts.app')

@section('title')
    Rezept hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => 'Recipe\RecipeController@store', 'method' => 'POST', 'files' => 'true']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'] )}}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Beschreibung') }}
        {{ Form::textarea('description', '', ['class' => 'form-control']) }}
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
        {{ Form::number('time', '', ['class' => 'form-control'] )}}
    </div>
    <div class="form-group">
        {{Form::label('file', 'Bild')}}
        {{Form::file('file', ['class' => 'form-control-file'])}}
    </div>
    {{ Form::submit('Speichern', ['class' => 'btn btn-primary'] )}}
    {!! Form::close() !!}

@endsection

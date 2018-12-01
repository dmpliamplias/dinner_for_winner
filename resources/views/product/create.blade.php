@extends('layouts.app')

@section('title')
    Produkt erfassen
@endsection

@section('content')

    {!! Form::open(['action' => 'Product\ProductController@store', 'method' => 'POST']) !!}
      <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
      </div>
      <div class="form-group">
        {{Form::label('calorie', 'Kalorien')}}
        {{Form::text('calorie', '', ['class' => 'form-control', 'placeholder' => 'Kalorien eingeben (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos pro 100g</small>
      </div>
      <div class="form-group">
        {{Form::label('carb', 'Kohlenhydrate')}}
        {{Form::text('carb', '', ['class' => 'form-control', 'placeholder' => 'Kohlenhydrate eingeben (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos pro 100g</small>
      </div>
      <div class="form-group">
        {{Form::label('fat', 'Fett')}}
        {{Form::text('fat', '', ['class' => 'form-control', 'placeholder' => 'Fett eingeben (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos pro 100g</small>
      </div>
      <div class="form-group">
        {{Form::label('salt', 'Salz')}}
        {{Form::text('salt', '', ['class' => 'form-control', 'placeholder' => 'Salz eingeben (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos pro 100g</small>
      </div>
      {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
      {!! Form::close() !!}

@endsection

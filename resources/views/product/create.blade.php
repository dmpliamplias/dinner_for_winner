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
        {{Form::text('calorie', '', ['class' => 'form-control', 'placeholder' => 'Kalorien eingeben'])}}
        <small id="calorieHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
      </div>
      <div class="form-group">
        {{Form::label('carb', 'Kohlenhydrate')}}
        {{Form::text('carb', '', ['class' => 'form-control', 'placeholder' => 'Kohlenhydrate eingeben'])}}
        <small id="carbHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
      </div>
      <div class="form-group">
        {{Form::label('fat', 'Fett')}}
        {{Form::text('fat', '', ['class' => 'form-control', 'placeholder' => 'Fett eingeben'])}}
        <small id="fatHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
      </div>
      <div class="form-group">
        {{Form::label('salt', 'Salz')}}
        {{Form::text('salt', '', ['class' => 'form-control', 'placeholder' => 'Salz eingeben'])}}
        <small id="saltHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
      </div>
      {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
      {!! Form::close() !!}

@endsection

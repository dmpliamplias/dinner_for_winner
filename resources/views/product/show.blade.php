@extends('layouts.app')

@section('title')
    Produkt bearbeiten
@endsection

@section('content')

    {!! Form::open(['action' => ['Product\ProductController@update', $product->id], 'method' => 'PUT']) !!}
    <div class="form-group">
      {{Form::label('name', 'Name')}}
      {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
      {{Form::label('calorie', 'Kalorien')}}
      {{Form::text('calorie', $product->calorie_amount, ['class' => 'form-control', 'placeholder' => 'Kalorien eingeben'])}}
      <small id="calorieHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
    </div>
    <div class="form-group">
      {{Form::label('carb', 'Kohlenhydrate')}}
      {{Form::text('carb', $product->carb_amount, ['class' => 'form-control', 'placeholder' => 'Kohlenhydrate eingeben'])}}
      <small id="carbHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
    </div>
    <div class="form-group">
      {{Form::label('fat', 'Fett')}}
      {{Form::text('fat', $product->fat_amount, ['class' => 'form-control', 'placeholder' => 'Fett eingeben'])}}
      <small id="fatHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
    </div>
    <div class="form-group">
      {{Form::label('salt', 'Salz')}}
      {{Form::text('salt', $product->salt_amount, ['class' => 'form-control', 'placeholder' => 'Salz eingeben'])}}
      <small id="saltHelp" class="form-text text-muted">in Gramm pro Portion (100g)</small>
    </div>
    <div class="btn-group">
    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    {!! Form::open(['action' => ['Product\ProductController@destroy', $product->id], 'method' => 'DELETE']) !!}
    {{Form::submit('Löschen', ['class' => 'btn btn-secondary'])}}
    {!! Form::close() !!}
    </div>

@endsection

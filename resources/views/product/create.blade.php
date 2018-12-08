@extends('layouts.app')

@section('title')
    Produkt erfassen
@endsection

@section('content')

  <head>
    <script>

      function validateForm() {
        var grammFat = parseInt(document.forms["productForm"]["fat"].value);
        var grammCarb = parseInt(document.forms["productForm"]["carb"].value);
        var grammSalt = parseInt(document.forms["productForm"]["salt"].value);
          if (grammFat + grammCarb + grammSalt > 100) {
            document.getElementById("validationGrammTotal").style.visibility='visible';
            document.getElementById('validationGrammTotal').scrollIntoView();
            return false;
          }
          if (grammCarb > 100) {
            document.getElementById("validationCarb").style.visibility='visible';
            }
          if (grammFat > 100) {
            document.getElementById("validationFat").style.visibility='visible';
            }
          if (grammSalt > 100) {
            document.getElementById("validationSalt").style.visibility='visible';
          }
          else {
            return false;
          }
        }
    </script>
  </head>

    {!! Form::open(['action' => 'Product\ProductController@store', 'method' => 'POST', 'name' => 'productForm']) !!}
    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'onchange' => 'myScript', 'placeholder' => 'Name eingeben'])}}
      </div>
    </div>
    <div class="col-12 col-sm-5">

    </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('calorie', 'Kalorien')}}
        {{Form::text('calorie', '', ['class' => 'form-control', 'placeholder' => 'z.B. 155 (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div class="alert alert-warning" role="alert" style="visibility: hidden">
        Platzhalter
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('carb', 'Kohlenhydrate')}}
        {{Form::text('carb', '', ['class' => 'form-control', 'placeholder' => 'z.B. 55 (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationCarb" class="alert alert-warning" role="alert" style="visibility: hidden">
        Wert für Kohlenhydrate darf nicht grösser als 100 sein.
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('fat', 'Fett')}}
        {{Form::text('fat', '', ['class' => 'form-control', 'placeholder' => 'z.B. 25 (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationFat" class="alert alert-warning" role="alert" style="visibility: hidden">
        Wert für Fett darf nicht grösser als 100 sein.
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('salt', 'Salz')}}
        {{Form::text('salt', '', ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
        <small id="calorieHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationSalt" class="alert alert-warning" role="alert" style="visibility: hidden">
        Wert für Salz darf nicht grösser als 100 sein.
      </div>
    </div>
    </div>

      {{Form::submit('Speichern', [
      'class' => 'btn btn-primary',
      'onclick' => 'return validateForm()',
      ])}}

      {!! Form::close() !!}
    </br>
      <div id="validationGrammTotal" class="hidden alert alert-warning" role="alert" style="visibility: hidden">
      Die Nährwertangaben dürfen zusammen nicht über 100g sein.
      </div>

@endsection

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
        var grammSugar = parseInt(document.forms["productForm"]["sugar"].value);
        var grammProtein = parseInt(document.forms["productForm"]["protein"].value);
        var grammFattyAcid = parseInt(document.forms["productForm"]["fattyAcid"].value);

          if (grammCarb > 100) {
            document.getElementById("validationCarb").style.visibility='visible';
          }else {
            document.getElementById("validationCarb").style.visibility='hidden';
          }
          if (grammFat > 100) {
            document.getElementById("validationFat").style.visibility='visible';
          }else {
            document.getElementById("validationFat").style.visibility='hidden';
          }
          if (grammProtein > 100) {
            document.getElementById("validationProtein").style.visibility='visible';
          }else {
            document.getElementById("validationProtein").style.visibility='hidden';
          }
          if (grammSugar > 100) {
            document.getElementById("validationSugar").style.visibility='visible';
          }else {
            document.getElementById("validationSugar").style.visibility='hidden';
          }
          if (grammFattyAcid > grammFat) {
            document.getElementById("validationFattyAcid").style.visibility='visible';
            return false;
          }else {
            document.getElementById("validationFattyAcid").style.visibility='hidden';
          }
          if (grammFat + grammCarb + grammSugar + grammProtein > 100) {
            document.getElementById("validationGrammTotal").style.visibility='visible';
            document.getElementById('validationGrammTotal').scrollIntoView();
            return false;
          }else {
            document.getElementById("validationGrammTotal").style.visibility='hidden';
            return true;
          }
        }
          /*if (grammCarb > 100) {
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
          }*/
    </script>
  </head>

    {!! Form::open(['action' => 'Product\ProductController@store', 'method' => 'POST', 'name' => 'productForm']) !!}
    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Produktbezeichung eingeben'])}}
      </div>
    </div>
    <div class="alert alert-warning" role="alert" style="visibility: hidden">
      Platzhalter
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
        <small id="carbHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
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
        <small id="fatHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
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
        {{Form::label('fattyAcid', 'Gesättigte Fettsäuren')}}
        {{Form::text('fattyAcid', '', ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
        <small id="fattyAcidHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationFattyAcid" class="alert alert-warning" role="alert" style="visibility: hidden">
        Der Anteil der gesättigten Fettsäuren darf den Fettwert nicht übersteigen.
      </div>
    </div>
    </div>


    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('sugar', 'Zucker')}}
        {{Form::text('sugar', '', ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
        <small id="sugarHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationSugar" class="alert alert-warning" role="alert" style="visibility: hidden">
        Wert für Zucker darf nicht grösser als 100 sein.
      </div>
    </div>
    </div>


    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('protein', 'Protein')}}
        {{Form::text('protein', '', ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
        <small id="proteinHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationProtein" class="alert alert-warning" role="alert" style="visibility: hidden">
        Wert für Protein darf nicht grösser als 100 sein.
      </div>
    </div>
    </div>

  <div class="row">
      <div class="col-12 col-sm-3">
          <div class="form-group">
              {{Form::label('unit', 'Einheit')}}
              {{Form::select('unit', ['g', 'ml'], null, ['class' => 'form-control', 'placeholder' => 'Bitte wählen'])}}
              <small id="priceHelp" class="form-text text-muted">Einheit des Produktes</small>
          </div>
      </div>
      <div class="alert alert-warning" role="alert" style="visibility: hidden">
          Platzhalter
      </div>
  </div>

    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('price', 'Preis')}}
        {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'z.B. 3.50 (ohne Einheit)'])}}
        <small id="priceHelp" class="form-text text-muted">Preis in CHF & pro 100g</small>
      </div>
    </div>
    <div class="alert alert-warning" role="alert" style="visibility: hidden">
      Platzhalter
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

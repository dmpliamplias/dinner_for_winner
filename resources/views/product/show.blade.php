@extends('layouts.app')

@section('title')
    Produkt bearbeiten
@endsection

@section('content')

    {!! Form::open(['action' => ['Product\ProductController@update', $product->id], 'method' => 'PUT']) !!}
    <div class="row">
      <div class="col-12 col-sm-3">
      <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Produktbezeichung eingeben'])}}
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
        {{Form::text('calorie', $product->calorie, ['class' => 'form-control', 'placeholder' => 'z.B. 155 (Ganze Zahl ohne Einheit)'])}}
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
        {{Form::text('carb', $product->carb, ['class' => 'form-control', 'placeholder' => 'z.B. 55 (Ganze Zahl ohne Einheit)'])}}
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
        {{Form::text('fat', $product->fat, ['class' => 'form-control', 'placeholder' => 'z.B. 25 (Ganze Zahl ohne Einheit)'])}}
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
        {{Form::text('fattyAcid', $product->fattyAcid, ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
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
        {{Form::text('sugar', $product->sugar, ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
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
        {{Form::text('protein', $product->protein, ['class' => 'form-control', 'placeholder' => 'z.B. 3 (Ganze Zahl ohne Einheit)'])}}
        <small id="proteinHelp" class="form-text text-muted">Nährwertinfos in g & pro 100g</small>
      </div>
    </div>
    <div class="col-12 col-sm-5">
      <div id="validationProtein" class="alert alert-warning" role="alert" style="visibility: hidden">
        Wert für Zucker darf nicht grösser als 100 sein.
      </div>
    </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="form-group">
                {{Form::label('unit', 'Einheit')}}
                {{Form::select('unit', ['g', 'ml'], $product->unit, ['class' => 'form-control', 'placeholder' => 'Bitte wählen'])}}
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
        {{Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'z.B. 3.50 (ohne Einheit)'])}}
        <small id="priceHelp" class="form-text text-muted">Preis in CHF & pro 100g</small>
      </div>
    </div>
    <div class="alert alert-warning" role="alert" style="visibility: hidden">
      Platzhalter
    </div>
    </div>


    <div class="row">
      <div class="col-12 col-sm-2">
    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
<div class="col-12 col-sm-2">
    {!! Form::open(['action' => ['Product\ProductController@destroy', $product->id], 'method' => 'DELETE']) !!}
    {{Form::submit('Löschen', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
</div>
    </div>

@endsection

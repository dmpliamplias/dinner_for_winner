@extends('layouts.app')

@section('content')
<h1>Hallo {{ $person['name'] }}</h1>
<p>Was willst du tun?</p>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseWochenplan" aria-expanded="false" aria-controls="collapseWochenplan">
    Wochenplan
  </button>
</p>
<div class="collapse" id="collapseWochenplan">
  <div class="card card-body">
    Im Wochenplan siehst du die Menüs für die ganze Woche. Du kannst
    einzelne Menüs austauschen, entfernen oder bestätigen. Die bestätigten Menüs
    werden für die Einkaufsliste berücksichtigt.
    <div class="row">
      <div class="col-12 col-sm-3">
      <a class="btn btn-outline-primary" href="{{ route('calendar.index') }}" role="button">Zum Wochenplan</a>
  </div>
</div>
</div>
  <br>
</div>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFamily" aria-expanded="false" aria-controls="collapseFamily">
    Familienmitglieder
  </button>
</p>
<div class="collapse" id="collapseFamily">
  <div class="card card-body">
    Hier kannst du deine Familienmitglieder mit deren Essgewohnheiten erfassen. Die Menüs werden in der Einkaufsliste
    automatisch auf die Anzahl der Familienmitglieder skaliert.
    <div class="row">
      <div class="col-12 col-sm-3">
        <a class="btn btn-outline-primary" href="{{ route('familyMember.index') }}" role="button">Zu den Familienmitgliedern</a>
  </div>
</div>
  </div>
  <br>
</div>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
    Produkte
  </button>
</p>
<div class="collapse" id="collapseProducts" >
  <div class="card card-body">
    Wir haben in unserer Datenbank bereits mehrere Tausend Produkte erfasst. Falls die für ein Rezept noch ein Produkt fehlt,
    kannst du dieses ganz einfach erfassen.
    <div class="row">
      <div class="col-12 col-sm-3">
        <a class="btn btn-outline-primary" href="{{ route('product.create') }}" role="button">Produkt hinzufügen</a>
  </div>
</div>
  </div>
  <br>
</div>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseRecipes" aria-expanded="false" aria-controls="collapseRecipes">
    Rezepte
  </button>
</p>
<div class="collapse" id="collapseRecipes">
  <div class="card card-body">
    In unserer Rezeptdatenbank sind viele Standardrezepte und Rezepte von anderen Usern erfasst. Du kannst
    ganz einfach deine eigenen Rezepte erfassen.
    <div class="row">
      <div class="col-12 col-sm-3">
        <a class="btn btn-outline-primary" href="{{ route('recipe.create') }}" role="button">Rezept hinzufügen</a>
  </div>
</div>
  </div>
  <br>
</div>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseShopping" aria-expanded="false" aria-controls="collapseShopping">
    Einkaufszettel
  </button>
</p>
<div class="collapse" id="collapseShopping">
  <div class="card card-body">
    Die im Wochenplan bestätigten Menüs erscheinen auf deinem persönlichen Einkaufszettel. Die Mengen
    der Produkte sind bereits auf die Anzahl deiner Familienmitglieder angepasst.
    <div class="row">
      <div class="col-12 col-sm-3">
        <a class="btn btn-outline-primary" href="{{url('/buylist') }}" role="button">Zum aktuellen Einkaufszettel</a>
  </div>
</div>
  </div>
  <br>
</div>


@endsection

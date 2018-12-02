@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href="{{ route('dashboard.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.jpg') }}" style="height: 255px; width: 100%"></a>
                <div class="card-body">

                    <h5 class="card-title">
                        Schnellstart
                    </h5>
                    <div class="d-flex justify-content-between align-items-center">

                    </div>
                </div>
            </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('recipe.index') }}"><img class="card-img-top" src="{{ asset('img/recipes.jpg') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <h5 class="card-title">
                        Rezepte
                   </h5>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('familyMember.index') }}"><img class="card-img-top" src="{{ asset('img/family.jpg') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <h5 class="card-title">
                        Familienverwaltung
                   </h5>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('product.index') }}"><img class="card-img-top" src="{{ asset('img/products2.jpg') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <h5 class="card-title">
                        Produkte
                   </h5>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('calendar.index') }}"><img class="card-img-top" src="{{ asset('img/calendar.jpg') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <h5 class="card-title">
                        Wochenplan
                   </h5>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('dashboard.index') }}"><img class="card-img-top" src="{{ asset('img/shoppinglist.jpg') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <h5 class="card-title">
                        Einkaufszettel/Bestellungen
                   </h5>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

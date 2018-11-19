@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href="{{ route('dashboard.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.PNG') }}" style="height: 255px; width: 100%"></a>
                <div class="card-body">

                    <p class="card-text">
                        Schnellstart
                    </p>
                    <div class="d-flex justify-content-between align-items-center">

                    </div>
                </div>
            </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('recipe.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.PNG') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <p class="card-text">
                        Rezepte
                   </p>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('familyMember.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.PNG') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <p class="card-text">
                        Familienverwaltung
                   </p>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('dashboard.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.PNG') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <p class="card-text">
                        Events
                   </p>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('calendar.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.PNG') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <p class="card-text">
                        Wochenplan
                   </p>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-4">
           <div class="card mb-4 box-shadow">
               <a href="{{ route('dashboard.index') }}"><img class="card-img-top" src="{{ asset('img/rocket.PNG') }}" style="height: 255px; width: 100%"></a>
               <div class="card-body">
                   <p class="card-text">
                        Einkaufszettel/Bestellungen
                   </p>
                   <div class="d-flex justify-content-between align-items-center">

                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

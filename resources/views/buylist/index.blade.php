@extends('layouts.app')

@section('content')
    @isset($error)
        <div class="alert alert-danger">
            Keine bestätigte Rezepte vorhanden
        </div>
    @else
        @include('buylist.buylist')
        <a class="btn btn-primary" href="{{url('/buylist/pdf') }}" role="button">Einkaufszettel drucken</a>
    @endisset
@endsection

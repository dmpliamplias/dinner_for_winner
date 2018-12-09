@extends('layouts.app')

@section('content')
    @include('buylist.buylist')
    <a class="btn btn-primary" href="{{url('/buylist/pdf') }}" role="button">Einkaufszettel drucken</a>
@endsection

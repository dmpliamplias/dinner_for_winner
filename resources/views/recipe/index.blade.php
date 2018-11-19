@extends('layouts.app')

@section('title')
    Rezepte
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(count($recipes) > 1)
                    @foreach($recipes as $recipe)
                        <div class="well">
                            <h3>{{$recipe->name}}</h3>
                            {{--<small>Erfasst von {{$recipe->person}}</small>--}}
                        </div>
                    @endforeach
                @else
                    <p>Keine Rezepte vorhanden</p>
                @endif
                <a class="btn-primary" href="{{ route('recipe.create') }}">Neues Rezept hinzufügen</a>
            </div>
        </div>
    </div>
@endsection

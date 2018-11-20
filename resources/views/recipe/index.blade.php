@extends('layouts.app')

@section('title')
    Rezepte
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(count($recipes) > 0)
                    @foreach($recipes as $recipe)
                        <div class="well">
                            <h3><a style="text-decoration: none" href="{{ URL::route('recipe.show', $recipe->id) }}">{{$recipe->name}}</a></h3>
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

@extends('layouts.app')

@section('title')
    Rezepte
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(count($recipes) > 0)
                @foreach($recipes as $recipe)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <a href="{{ URL::route('recipe.show', $recipe->id) }}}"><img class="card-img-top" src="{{ asset($recipe->imagePath) }}" style="height: 255px; width: 100%"></a>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $recipe->name }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12">
                    <p>Keine Rezepte vorhanden</p>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-4">
              <a class="btn btn-primary" href="{{ route('recipe.create') }}" role="button">Neues Rezept hinzufügen</a>
            </div>
        </div>
    </div>
@endsection

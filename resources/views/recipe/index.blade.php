@extends('layouts.app')

@section('title')
    Rezepte
@endsection

@section('content')
    <div class="container">
        @if(count($recipes) > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Zeit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($recipes as $recipe)
                    <tr onclick="window.location = '/recipe/{{ $recipe->id }}'">
                        <td>{{ $recipe->name }}</td>
                        <td>{{ $recipe->time }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $recipes->links() }}
        @else
            <p>Keine Rezepte erfasst</p>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <a class="btn btn-primary" href="{{ route('recipe.create') }}" role="button">Neues Rezept hinzufügen</a>
            </div>
        </div>
    </div>
@endsection

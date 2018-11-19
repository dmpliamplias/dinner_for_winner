@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <th>Montag</th>
                    <th>Dienstag</th>
                    <th>Mittwoch</th>
                    <th>Donnerstag</th>
                    <th>Freitag</th>
                    <th>Samstag</th>
                    <th>Sonntag</th>
                </tr>
                <tr>
                @foreach($recipes['recipesMorning'] as $recipe)
                    <td>
                       {{ $recipe->name }}
                    </td>
                @endforeach
                </tr>
                <tr>
                    @foreach($recipes['recipesMidday'] as $recipe)
                        <td>
                            {{ $recipe->name }}
                        </td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($recipes['recipesEvening'] as $recipe)
                        <td>
                            {{ $recipe->name }}
                        </td>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
@endsection

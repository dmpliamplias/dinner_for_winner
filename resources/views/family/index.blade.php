@extends('layouts.app')

@section('title')
    Familie
@endsection

@section('content')
    <div class="container">
        @if(count($families) > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Ziel</th>
                    <th scope="col">Essgewohnheit</th>
                    <th scope="col">Geschlecht</th>
                </tr>
                </thead>
                <tbody>
                @foreach($families as $familyMember)
                    <tr onclick="window.location = '/familyMember/ {{ $familyMember->id }}'">
                        <td>{{$familyMember->name}}</td>
                        <td>{{$familyMember->goal}}</td>
                        <td>{{$familyMember->eat}}</td>
                        <td>{{$familyMember->gender}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info" role="alert">
                Keine Familiehmitglieder erfasst
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('familyMember.create') }}" role="button">Neues Familienmitglied
            hinzufügen</a>
    </div>
@endsection

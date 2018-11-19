@extends('layouts.app')

@section('title')
    Familie
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(count($families) > 1)
                    @foreach($families as $familyMember)
                        <div class="well">
                            <h3>{{$familyMember->name}}</h3>
                            {{--<small>Erfasst von {{$recipe->person}}</small>--}}
                        </div>
                    @endforeach
                @else
                    <p>Keine Familienmitglieder erfasst</p>
                @endif
                <a class="btn-primary" href="{{ route('familyMember.create') }}">Neues Familienmitglied hinzufügen</a>
            </div>
        </div>
    </div>
@endsection

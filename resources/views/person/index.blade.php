@extends('layouts.app')

@section('title')
    Profil
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-body">
                            <h2>Hallo {{ $person['name'] }}</h2>
                            <p>Was willst du tun?</p>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="btn btn-primary" href="{{ URL::route('person.edit', $person->id) }}">Profil anpassen</a>
                                </div>
                                <div class="col-md-2">
                                  <a class="btn btn-primary" href="{{ route('familyMember.create') }}" role="button">Familienmitglied hinzufügen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

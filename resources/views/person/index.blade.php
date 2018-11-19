@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Person</div>
                        <div class="card-body">
                            <h2>Hallo {{ $person['name'] }}</h2>
                            <p>Was willst du tun?</p>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="btn btn-primary" href="{{ URL::route('person.edit', $person->id) }}">Anpassen</a>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary" href="{{ URL::route('person.create'), $person->id}}">Weitere Personen erfassen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

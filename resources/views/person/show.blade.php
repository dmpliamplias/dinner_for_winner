@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Person</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <p>{{ $person->id }}</p>
                        <p>{{ $person->firstName }}</p>
                        <p>{{ $person->lastName }}</p>
                        <p>{{ $person->birthday }}</p>
                        <p>{{ $person->user_id }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

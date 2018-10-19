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
                                <a class="btn btn-primary">Weitere Personen erfassen</a>
                            </div>
                        </div>
                        {{--                            <p>{{ $person->name }}</p>--}}
                        {{--<table class="table table-hover">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                        {{--<th>Email</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                        {{--<td>John</td>--}}
                        {{--<td>Doe</td>--}}
                        {{--<td>john@example.com</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Mary</td>--}}
                        {{--<td>Moe</td>--}}
                        {{--<td>mary@example.com</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>July</td>--}}
                        {{--<td>Dooley</td>--}}
                        {{--<td>july@example.com</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}
                        {{--</table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Person</div>

                        <div class="card-body">
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

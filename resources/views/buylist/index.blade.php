@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Einkaufszettel</h2>
        <table class="table">
            <thead>
            <tr>
                <th style="width: 5%">Menge</th>
                <th style="width: 10%">Einheit</th>
                <th style="width: 60%">Artikel</th>
                <th style="width: 20%">Preis</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1500</th>
                <td>Gramm</td>
                <td>Meerschweinchenhackfleisch</td>
                <td>12.35</td>
            </tr>
            </tbody>
        </table>

        <p> Total Preis: 24.45</p>

        <a class="btn btn-primary" href="{{url('/buylist/pdf') }}" role="button">Einkaufszettel drucken</a>
    </div>
@endsection

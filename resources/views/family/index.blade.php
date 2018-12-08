@extends('layouts.app')

@section('title')
    Familie
@endsection

@section('content')
<p>
<div class="container">
        @if(count($families) > 0)
              <ul class="list-group list-group-flush">
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Ziel</th>
                          <th scope="col">Essgewohnheit</th>
                          <th scope="col">Geschlecht</th>
                          <th scope="col"> </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($families as $familyMember)
                        <tr>
                          <td>{{$familyMember->name}}</td>
                          <td>{{$familyMember->goal}}</td>
                          <td>{{$familyMember->eat}}</td>
                          <td>{{$familyMember->gender}}</td>
                          <td><button type="button" class="btn btn-outline-danger">Löschen</button></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </ul>
                @else
                    <p>Keine Familiehmitglieder erfasst</p>
                @endif
                <p>
                  <a class="btn btn-primary" href="{{ route('familyMember.create') }}" role="button">Neues Familienmitglied hinzufügen</a>
            </div>
    </div>
@endsection

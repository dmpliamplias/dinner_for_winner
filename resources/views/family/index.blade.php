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
                          <th scope="col">Erfasst am</th>
                          <th scope="col">Geändert am</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($families as $familyMember)
                        <tr>
                          <td>{{$familyMember->name}}</td>
                          <td>{{$familyMember->created_at}}</td>
                          <td>{{$familyMember->updated_at}}</td>
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

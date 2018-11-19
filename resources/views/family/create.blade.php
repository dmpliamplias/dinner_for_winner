@extends('layouts.app')

@section('title')
    Familienmitglied hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => 'FamilyMember\FamilyMemberController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection

@extends('layouts.app')

@section('tltle')
    Person hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => 'PersonController@add', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::label('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
    {!! Form::close() !!}

@endsection
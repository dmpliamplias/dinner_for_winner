@extends('layouts.app')

@section('title')
    Import
@endsection

@section('content')

    {!! Form::open(['action' => 'Import\ImportController1@upload', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group">
        {{Form::label('file', 'Datei')}}
        {{Form::file('file', ['class' => 'form-control-file'])}}
    </div>
    {{Form::submit('Importieren', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection

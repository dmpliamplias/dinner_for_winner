@extends('layouts.app')

@section('title')
    Familienmitglied hinzufügen
@endsection

@section('content')

    {!! Form::open(['action' => ['FamilyMember\FamilyMemberController@update', $member->id], 'method' => 'PUT']) !!}
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $member->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="form-group">
                {{Form::label('gender', 'Geschlecht')}} <br>
                {{Form::select('gender', array('Mann'=>'Mann','Frau'=>'Frau'), $member->gender, array('class'=>'form-control','style'=>'' ))}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="form-group">
                {{Form::label('goal', 'Ziel')}} <br>
                {{Form::select('goal', array(
                'Abnehmen'=>'Abnehmen',
                'Gewicht halten'=>'Gewicht halten',
                'Muskeln aufbauen'=>'Muskeln aufbauen',
                'Zunehmen'=>'Zunehmen'),
                $member->goal,
                array('class'=>'form-control','style'=>'' )
                )}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="form-group">
                {{Form::label('eat', 'Ernährungsform')}} <br>
                {{Form::select('eat', array(
                'Mischkost'=>'Mischkost',
                'Vegetarisch'=>'Vegetarisch',
                'Pescatarisch'=>'Pescatarisch',
                'Vegan'=>'Vegan'),
                $member->eat,
                array('class'=>'form-control','style'=>'' )
                )}}
            </div>
        </div>
    </div>

    {{Form::submit('Speichern', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection

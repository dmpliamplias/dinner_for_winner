@extends('layouts.app')

@section('content')
    <h1>Kontaktieren Sie uns</h1>
    <p>
    Haben Sie Fragen oder Verbesserungsvorschläge für unsere Applikation? Dann zögern Sie nicht uns zu kontaktieren.
    </p>

    {!! Form::open(['action' => 'Product\ProductController@store', 'method' => 'POST', 'name' => 'productForm']) !!}
      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Ihr Name'])}}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            {{Form::label('email', 'Ihre E-Mailadresse')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Ihre E-Mailadresse'])}}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            {{Form::label('subject', 'Betreff')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Betreff'])}}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            {{Form::label('message', 'Nachricht')}}
            {{Form::textarea('name', '', ['class' => 'form-control', 'placeholder' => 'Ihr Nachricht'])}}
          </div>
        </div>
      </div>





      {{Form::submit('Absenden', ['class' => 'btn btn-primary', 'onclick' => 'return validateForm()'])}}

      {!! Form::close() !!}

@endsection

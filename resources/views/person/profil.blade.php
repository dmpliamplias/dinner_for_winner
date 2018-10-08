@extends('layouts.app')

@section('title')
Profil
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="profil/edit">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-5">
                                <input id="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{$person->name}}" required autofocus>
                                @if ($erros->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$errors->first('name')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>7
                        <div class="form-group row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

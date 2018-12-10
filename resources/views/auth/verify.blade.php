@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bestätigen Sie Ihre E-Mail Adresse') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ein Bestätigungslink ist für Ihre E-Mail Adresse versendet worden.') }}
                        </div>
                    @endif

                    {{ __('Überprüfen Sie Ihr Postfach nach einem Bestätigungslink, bevor Sie fortfahren.') }}
                    {{ __('Falls Sie kein Bestätigungsmail erhalten haben') }}, <a href="{{ route('verification.resend') }}">{{ __('klicken Sie hier um einen neuen Link anzufordern.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

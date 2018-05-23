@extends('layouts.app')

@section('content')
    {{--@if(Auth::user()->activated)
        User activated
    @else
        <div class="notification is-danger">
            Vous êtes connecté mais vous devez être validé par un membre pour avoir accès aux fonctionnalités du site.
        </div>
    @endif--}}
    {{--<div class="container">
        Welcome !
    </div>--}}

    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Full Height title
                </h1>
                <h2 class="subtitle">
                    Full Height subtitle
                </h2>
                <a class="button is-primary is-medium">Primary</a>
            </div>
        </div>
    </section>

@endsection

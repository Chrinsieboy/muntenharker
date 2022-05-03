@extends('errors::minimal')

@section('title', __('419 | Muntenharker'))
{{-- @section('code', '404') --}}
{{-- @section('message', __('Dit is niet de pagina die je zoekt. Zullen we terug gaan naar het dashboard?')) --}}

<div class="errror-404">
    <img style="text-align: center;display: flex;flex-direction: column;"
        src="{{ asset('TEMP/muntenharker-404.png') }}" alt="404logo">
    <h1 style="text-align: center;display: flex;flex-direction: column;">Deze pagina is verlopen, herlaad de pagina om verder te gaan.</h1>
    {{-- <a href="/" class="btn-404">Ja, ga terug naar het dashboard</a> --}}
    {{-- <a href="/kennisbank" class="btn-404">Nee, ik heb een vraag</a> --}}
</div>


@extends('layouts.base')

@section('title', 'Home')

@section('top-bar-right')
@guest
    <div class="grid-x">
        <div class="cell large-6 medium-6 small-12 align-middle align-right flex-container">
            <a href="{{ route('login') }}">Login</a>
        </div>
        <div class="cell large-6 medium-6 small-12 align-center-middle flex-container">
            <a href="{{ route('register') }}" class="button bold margin-0">Get Started</a>
        </div>
    </div>
@endguest
@endsection

@section('content')
    <div class="grid-container">
        <div class="grid-x main">
            <div class="auto cell flex-container align-center-middle">
                <h1>Welcome to rdr.</h1>
            </div>
        </div>
    </div>
@endsection
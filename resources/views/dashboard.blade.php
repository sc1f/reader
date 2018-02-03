@extends('layouts.base')
@section('title', 'Dashboard')
@section('top-bar-right')
    <div class="grid-x">
        <div class="cell flex-container align-right align-middle">
            <ul class="dropdown menu background-none" data-dropdown-menu>
                <li>
                    <a href="#">{{ $email }}</a>
                    <ul class="menu vertical">
                        <li class="dropdown-menu__element">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <!-- vue.js app entry point -->
    <div id="app" class="animated fadeIn animation-delay-15">
        <dashboard></dashboard>
    </div>
@endsection

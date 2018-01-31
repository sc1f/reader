@extends('layouts.base')
@section('title', 'Login')
@section('top-bar-right')
    <div class="grid-x">
        <div class="cell auto align-middle align-right flex-container">
            <a href="{{ route('register') }}" class="button bold margin-0">Register</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="grid-container">
        <div class="grid-y grid-margin-y grid-y__center">
            <div class="cell">
                <h4>Login</h4>
                <div class="grid-y grid-padding-y">
                    <form data-abide novalidate method="POST" action="{{ route('login') }}">
                        <div data-abide-error class="alert callout" style="display: none;">
                            <p><i class="fi-alert"></i> There are some errors!</p>
                        </div>
                        {{ csrf_field() }}
                        <div>
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                   required autofocus>
                            <span class="form-error">Please enter a valid email.</span>
                        </div>

                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember Me
                            </label>
                        </div>
                        <button type="submit" class="button margin-bottom-0 margin-right-1">Login</button>
                        {{--<a href="{{ route('password.request') }}" class="small">Forgot Your Password?</a>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

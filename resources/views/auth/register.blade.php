@extends('layouts.base')
@section('title', 'Register')
@section('top-bar-right')
    <div class="grid-x">
        <div class="cell auto align-middle align-right flex-container">
            <span>Already have an account? </span>
            <a href="{{ route('login') }}" class="margin-bttom-0 margin-left-1">Login</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="grid-container">
        <div class="grid-y grid-margin-y grid-y__center">
            <h4>Register</h4>
            <p class="italic">Create a new account to get started!</p>
            <div class="grid-y grid-padding-y">
                <form data-abide novalidate method="POST" action="{{ route('register') }}">
                    <div data-abide-error class="alert callout" style="display: none;">
                        <p><i class="fi-alert"></i> There are some errors!</p>
                    </div>
                    {{ csrf_field() }}
                    <div>
                        <label for="email" class="col-md-4 control-label">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" pattern="email" required autofocus>
                        <span class="form-error">Please enter a valid email.</span>
                    </div>

                    <div>
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <input id="password" type="password" name="password" required>
                        <p class="help-text">Passwords must be at least 6 characters and contain at least 1 letter and 1 number. Passwords are case sensitive.</p>
                    </div>

                    <div>
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" name="password_confirmation" data-equalto="password" required>
                        <span class="form-error">Your passwords do not match!</span>
                    </div>
                    <button type="submit" class="button margin-bottom-0">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

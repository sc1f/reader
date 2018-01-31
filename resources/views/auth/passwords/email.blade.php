@extends('layouts.base')

@section('content')
    <div class="grid-container">
        <div class="grid-y grid-margin-y grid-y__center">
            <div class="cell">
                <h4>Reset Password</h4>
                <div class="grid-y grid-padding-y">
                    <form data-abide novalidate method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div>
                            <label for="email" class="col-md-4 control-label">Your E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            <span class="form-error">Please enter a valid email.</span>
                        </div>
                        <button type="submit" class="button">
                            Send Password Reset Link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

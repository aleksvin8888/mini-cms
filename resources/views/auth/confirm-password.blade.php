@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('auth_header', 'Confirm Password')

@section('auth_body')
    <p class="text-muted">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </p>

    <form action="{{ route('password.confirm') }}" method="POST">
        @csrf

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-lock"></i> {{ __('Confirm') }}
            </button>
        </div>
    </form>
@stop

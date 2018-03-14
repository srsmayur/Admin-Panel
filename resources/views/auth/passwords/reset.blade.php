@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="form" id="form1">
            <form class="login-form" method="POST" action="{{ route('password.request') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email"  required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

                <input id="password" type="password" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>



                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>

@endsection

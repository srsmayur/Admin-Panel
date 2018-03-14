
@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="form" id="form1">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf


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


                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>

                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>

            <form class="register-form" method="POST" action="{{ route('register') }}">
                @csrf


                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name"  required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

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
                    {{ __('Register') }}
                </button>



                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
        </div>
    </div>


@endsection

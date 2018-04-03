
@extends('layouts.login_register')


@section('content')
    <div class="login-page">
        @if(Session::has('danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('message', '') }}
            </div>
        @endif
        <div class="form" id="form1">
            <form class="login-form" method="POST" action="<?php echo URL::to('registration'); ?>">
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

            <input id="country" type="text" name="country" value="{{ old('country') }}" placeholder="Country (Optional)">
            <input id="occupation" type="text" name="occupation" value="{{ old('occupation') }}" placeholder="Occupation (Optional)">
            <input id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="Phone (Optional)">
            <input id="weburl" type="text" name="weburl" value="{{ old('weburl') }}" placeholder="
Website URL
 (Optional)">


            <button type="submit" class="btn btn-primary">
                {{ __('register') }}
            </button>



            <p class="message">Already registered? <a href="<?php echo URL::to('home'); ?>">Sign In</a></p>
            </form>


        </div>
    </div>


@endsection

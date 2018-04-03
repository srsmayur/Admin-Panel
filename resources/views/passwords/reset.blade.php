@extends('layouts.login_register')

@section('content')
    <div class="login-page">
        <div class="form" id="form1">
            <form class="login-form" method="POST" action="<?php echo URL::to('/password/resetpassword'); ?>">
                @csrf

               <input type="hidden" name="password_token" value="{{$verification_code}}">

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

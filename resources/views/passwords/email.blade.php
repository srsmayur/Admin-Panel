@extends('layouts.login_register')

@section('content')
    <div class="login-page">
        <div class="form" id="form1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="login-form" method="POST" action="<?php echo URL::to('password/email'); ?>">
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email"  required autofocus>
                @csrf
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>

            </form>
        </div>
    </div>
@endsection
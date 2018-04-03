
@extends('layouts.login_register')


@section('content')
    <div class="login-page">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('message', '') }}
            </div>
        @endif
        @if(Session::has('info'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message', '') }}
                </div>
        @endif
        @if(Session::has('warning'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message', '') }}
                </div>
        @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message', '') }}
                </div>
            @endif

        <div class="form" id="form1">
            <form class="login-form" method="POST" action="<?php echo URL::to('login'); ?>">
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

                <a class="btn btn-link" href="<?php echo  URL::to('password/reset');?>">
                    {{ __('Forgot Your Password?') }}
                </a>

                <p class="message">Not registered? <a href="<?php echo URL::to('register'); ?>">Create an account</a></p>
            </form>


        </div>
    </div>


@endsection

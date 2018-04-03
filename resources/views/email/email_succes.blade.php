
@extends('layouts.login_register')


@section('content')
    <div class="login-page">
        <div class="form" id="form1">
            <div class=”col-md-8 col-md-offset-2">
            <div class=”panel panel-default”>
                <div class=”panel-heading”><h3>Registration Confirmed</h3></div>
                <div class=”panel-body”>
                    Your Email is successfully verified. Click here to <a href=<?php echo URL::to('home'); ?>>Login</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@extends('layouts.users')

@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fa fa-user-md"></i>Profile</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                    <div class="panel-body">
                        <div class="col-lg-2 col-sm-2">
                            <h4>{{ Auth::user()->name }} </h4>
                            <div class="follow-ava">
                                <img src="img/profile-widget-avatar.jpg" alt="">
                            </div>
                            <h6>Administrator</h6>
                        </div>
                        <div class="col-lg-4 col-sm-4 follow-info">
                            <p>Hello I’m '{{ Auth::user()->name }}', a leading expert in interactive and creative design.</p>
                            <p>{{ Auth::user()->email }} </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-info">
                        <ul class="nav nav-tabs">
                            <li>

                                <a data-toggle="button" href="{{ route('user.edit',Auth::user()) }}">
                                    <i class="icon-edit"></i>
                                    Edit
                                </a>
                            </li>
                        </ul>
                    </header>
                            <!-- profile -->
                            <div id="profile" class="tab-pane active">
                                <section class="panel">
                                    <div class="bio-graph-heading">
                                        Hello I’m '{{ Auth::user()->name }}', a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication.
                                    </div>
                                    <div class="panel-body bio-graph-info">
                                        <h1>Bio Graph</h1>
                                        <div class="row">
                                            <div class="bio-row">
                                                <p><span>Full Name </span>: {{ Auth::user()->name }} </p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Country </span>: {{ Auth::user()->country }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Occupation </span>: {{ Auth::user()->occupation }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Email </span>: {{ Auth::user()->email    }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Mobile </span>: {{ Auth::user()->mobile }}</p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Phone </span>: {{ Auth::user()->weburl }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                    </div>
                                </section>
                            </div>
                            <!-- edit-profile -->

                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->

@endsection
@extends('layouts.users')

@section('content')

    <div id="edit-profile" class="tab-pane">
    <section class="panel">
        <div class="panel-body bio-graph-info">
            <h1> Profile Info</h1>
            <form class="form-horizontal" role="form" action="{{ route('user.edit',Auth::user()) }}" method="POST">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Full Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" value="{{ Auth::user()->name }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Country</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="c-name" value="{{ Auth::user()->country }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Occupation</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="occupation" value="{{ Auth::user()->occupation }} ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="email" value="{{ Auth::user()->email }} ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Mobile</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="mobile" value="{{ Auth::user()->mobile }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Website URL</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="url" value="{{ Auth::user()->weburl }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary" >Save</button>
                        <button type="button" class="btn btn-danger" href="{{ route('user.profile') }}">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
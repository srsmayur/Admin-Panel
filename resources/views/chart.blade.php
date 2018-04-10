@extends('layouts.app')

@section('content')
        <section id="container" class="">
                @include('layouts.header')
                @include('layouts.sidebar')
                <section id="main-content">
                        <section class="wrapper">
                                <!--overview start-->
                                <div class="row">
                                        <div class="col-lg-12">
                                                <h3 class="page-header"><i class="fa fa-laptop"></i> Chart</h3>
                                                <ol class="breadcrumb">
                                                        <li><i class="fa fa-home"></i><a href="{{URL::to('dashboard')}}">Home</a></li>
                                                        <li><i class="fa fa-laptop"></i>Chart</li>
                                                </ol>
                                        </div>
                                </div>
                         </section>
                    <form class="form-group" method="POST" action="<?php echo URL::to('/chart/dosomething'); ?>">
                        @csrf
                    <div class="container">

                        <div class='col-md-8'>
                            <label for="dtp_input2" class="col-md-2 control-label">From :</label>
                            <div class="form-group">
                                <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss p " data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" id="date_from" name="date_from"  value="">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-8'>
                            <label for="dtp_input2" class="col-md-2 control-label">To :</label>
                            <div class="form-group">
                                <div class="input-group date form_datetime col-md-5" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss p " data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" size="16" type="text" id="date_to" name="date_to"  value="">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Search') }}
                        </button>
                    </div>
                    </form>
                    <div id="myDiv"></div>

                </section>

                <script>

                        $(document).ready(function(){


                                var url = 'http://localhost/Admin-panel/public/chart/readdata';
                                $.ajax({
                                        url: url,  //Server script to process data
                                        type: 'GET',
                                        dataType: 'json',
                                        success: function (response) {

                                            var array = response.data;
                                            if(array.length >= 0){

                                                var var1 = new Array();
                                                var var2 = new Array();

                                                for (var i = 0; i < array.length; i++) {

                                                    var1.push(array[i].MWCT_BR_001_ACT);
                                                    var2.push(array[i].MWCT_BR_002_ACT);
                                                }
                                                var trace = {
                                                    x: var1,
                                                    y: var2,
                                                    type: 'scatter'
                                                };
                                                var data = [trace];

                                                console.log(trace);
                                                Plotly.newPlot('myDiv', data);
                                            }
                                           else {
                                                console.log("Data is null");
                                            }
                                        },
                                        //Options to tell jQuery not to process data or worry about content-type.
                                        cache: false,
                                        contentType: false,
                                        processData: false
                                });

                        });
                </script>
        </section>

@endsection

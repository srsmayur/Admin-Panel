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

                    <form class="form-group" id="formoid" method="POST" >
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
                        <button type="submit" id="submit" class="btn btn-primary">
                            {{ __('Search') }}
                        </button>
                    </div>
                    </form>
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

                    <div id="myDiv"></div>

                </section>

                <script>

                        $(document).ready(function(){

                            $("#formoid").submit(function(event) {

                                event.preventDefault();
                                var $form = $(this),
                                        from_date = $form.find('input[name="date_from"]').val(),
                                        to_date = $form.find('input[name="date_to"]').val(),
                                        url = $form.attr('action');

                                var url = 'http://localhost/Admin-panel/public/chart/readdata';
                                $.ajax({

                                    url: url,  //Server script to process data
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        from_date: from_date,
                                        to_date: to_date
                                    },
                                    success: function (response) {

                                        console.log(response);
                                        var array = response.data;
                                        if(array.length >= 0){

                                            var var1 = new Array();
                                            var var2 = new Array();
                                            var var3 = new Array();
                                           for (var i = 0; i < array.length; i++) {

                                                var1.push(array[i].datetime);
                                                var2.push(array[i].MWCT_BR_001_ACT);
                                                var3.push(array[i].MWCT_BR_002_ACT);
                                            }
                                            var trace1 = {
                                                x: var1,
                                                y: var2,
                                                mode: 'lines+markers',
                                                name: 'MWCT_BR_001_ACT',
                                                marker: {
                                                    color: 'rgb(128, 0, 128)',
                                                    size: 8
                                                },
                                                line: {
                                                    color: 'rgb(128, 0, 128)',
                                                    width: 1
                                                }
                                            };
                                            var trace2 = {
                                                x: var1,
                                                y: var3,
                                                mode: 'lines+markers',
                                                name: 'MWCT_BR_002_ACT'
                                            };

                                            var data = [trace1,trace2];

                                            var layout = {
                                                title: 'Chart',
                                                xaxis: {
                                                    title: 'Date-Time',
                                                    showgrid: false,
                                                    zeroline: false
                                                },
                                                yaxis: {
                                                    title: '',
                                                    showline: false
                                                }
                                            };

                                            Plotly.newPlot('myDiv', data, layout);

                                        }
                                        else {
                                            console.log("Data is null");
                                        }
                                    }
                                });
                            });

                        });
                </script>
        </section>

@endsection

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
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Charts</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="{{URL::to('dashboard')}}">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Charts</li>
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
            <div id="chartdiv"></div>
        </section>
        <!-- Chart code -->
        <script>
            $(document).ready(function(){

                $("#formoid").submit(function(event) {
                    event.preventDefault();
                    var $form = $(this),
                            from_date = $form.find('input[name="date_from"]').val(),
                            to_date = $form.find('input[name="date_to"]').val(),
                            url = $form.attr('action');
                    var url = 'http://localhost/Admin-panel/public/charts/readdata';
                    $.ajax({

                        url: url,  //Server script to process data
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            from_date: from_date,
                            to_date: to_date
                        },
                        success: function (response) {
                            var chartdata = response.data;

                            var chart = AmCharts.makeChart("chartdiv", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "position": "left",
                                    "title": ""
                                }],
                                "graphs": [{
                                    "id": "g1",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_BR_001_ACT",
                                    "balloonText": "<div style='margin:5px; font-size:19px;'>MWCT_BR_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g2",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_BR_002_ACT",
                                    "balloonText": "<div style='margin:5px; font-size:19px;'>MWCT_BR_002_ACT:<b>[[value]]</b></div>"
                                }],
                                "chartScrollbar": {
                                    "graph": "g1",
                                    "scrollbarHeight": 80,
                                    "backgroundAlpha": 0,
                                    "selectedBackgroundAlpha": 0.1,
                                    "selectedBackgroundColor": "#888888",
                                    "graphFillAlpha": 0,
                                    "graphLineAlpha": 0.5,
                                    "selectedGraphFillAlpha": 0,
                                    "selectedGraphLineAlpha": 1,
                                    "autoGridCount": true,
                                    "color": "#AAAAAA"
                                },
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "Date & Time",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,
                                    "dateFormat": "YYYY-MM-DD HH:NN:SS"
                                }
                            });

                            chart.addListener("dataUpdated", zoomChart);
                            zoomChart();
                            function zoomChart() {
                                chart.zoomToIndexes(chartData.length - 250, chartData.length - 100);
                            }
                        }
                    });
                });
            });
        </script>
    </section>

@endsection
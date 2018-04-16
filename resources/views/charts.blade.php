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
            <div class="row">
                <div class="col-sm-4" id="MWCT_BR_001_ACT"></div>
                <div class="col-sm-4" id="MWCT_BR_002_ACT"></div>
                <div class="col-sm-4" id="MWCT_BR_003_ACT"></div>
                <div class="col-sm-4" id="MWCT_PR_001_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_001_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_002_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_003_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_004_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_005_ACT"></div>
                <div class="col-sm-4" id="MWCT_DS_006_ACT"></div>
            </div>

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
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_BR_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g2",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_BR_002_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_BR_002_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g3",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_BR_003_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_BR_003_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g4",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_PR_001_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_PR_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g5",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_001_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_001_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g6",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_002_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_002_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g7",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_003_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_003_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g8",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_004_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_004_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g9",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_005_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_005_ACT:<b>[[value]]</b></div>"
                                },{
                                    "id": "g10",
                                    "fillAlphas": 0.4,
                                    "valueField": "MWCT_DS_006_ACT",
                                    "balloonText": "<div style='margin:1px; font-size:10px;'>MWCT_DS_006_ACT:<b>[[value]]</b></div>"
                                }],
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

                                }
                            });
                            chart.addListener("dataUpdated", zoomChart);
            //Chart -1
                            var chart1 = AmCharts.makeChart("MWCT_BR_001_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_BR_001_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_BR_001_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart1.addListener("rendered", zoomChart);
            //Chart -2
                            var chart2 = AmCharts.makeChart("MWCT_BR_002_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_BR_002_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_BR_002_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart2.addListener("rendered", zoomChart);
            //Chart -3
                            var chart3 = AmCharts.makeChart("MWCT_BR_003_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_BR_003_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_BR_003_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart3.addListener("rendered", zoomChart);
            //Chart -4
                            var chart4 = AmCharts.makeChart("MWCT_PR_001_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_PR_001_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_PR_001_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart4.addListener("rendered", zoomChart);
            //Chart -5
                            var chart5 = AmCharts.makeChart("MWCT_DS_001_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_001_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_001_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart5.addListener("rendered", zoomChart);
            //Chart -6
                            var chart6 = AmCharts.makeChart("MWCT_DS_002_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_002_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_002_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart6.addListener("rendered", zoomChart);
            //Chart -7
                            var chart7 = AmCharts.makeChart("MWCT_DS_003_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_003_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_003_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart7.addListener("rendered", zoomChart);
            //Chart -8
                            var chart8 = AmCharts.makeChart("MWCT_DS_004_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_004_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_004_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart8.addListener("rendered", zoomChart);
            //Chart -9
                            var chart9 = AmCharts.makeChart("MWCT_DS_005_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_005_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_005_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart9.addListener("rendered", zoomChart);
            //Chart -10
                            var chart10 = AmCharts.makeChart("MWCT_DS_006_ACT", {
                                "type": "serial",
                                "theme": "light",
                                "marginRight": 80,
                                "autoMarginOffset": 20,
                                "marginTop": 7,
                                "dataProvider": chartdata,
                                "valueAxes": [{
                                    "axisAlpha": 0.2,
                                    "dashLength": 1,
                                    "position": "left"
                                }],
                                "mouseWheelZoomEnabled": true,
                                "graphs": [{
                                    "id": "g1",
                                    "balloonText": "[[value]]",
                                    "bullet": "round",
                                    "bulletBorderAlpha": 1,
                                    "bulletColor": "#FFFFFF",
                                    "hideBulletsCount": 50,
                                    "title": "red line",
                                    "valueField": "MWCT_DS_006_ACT",
                                    "useLineColorForBulletBorder": true,
                                    "balloon":{
                                        "drop":true
                                    }
                                }],
                                "chartCursor": {
                                    "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
                                    "cursorPosition": "mouse"
                                },
                                "categoryField": "datetime",
                                "categoryAxis": {
                                    "minPeriod": "mm",
                                    "title": "MWCT_DS_006_ACT",
                                    "parseDates": true
                                },
                                "export": {
                                    "enabled": true,

                                }
                            });

                            chart10.addListener("rendered", zoomChart);

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
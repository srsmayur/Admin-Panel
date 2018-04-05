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


                                                var trace = {
                                                        x: [1, 2, 3, 4, 5, 6, 7, 8],
                                                        y: [10, 15, null, 17, 14, 12, 10, null, 15],
                                                        mode: 'lines+markers',
                                                        connectgaps: true
                                                };

                                                var data = [trace];

                                                var layout = {
                                                        title: 'Title of the Graph',
                                                        xaxis: {
                                                                title: 'x-axis title'
                                                        },
                                                        yaxis: {
                                                                title: 'y-axis title'
                                                        }
                                                };

                                                Plotly.newPlot('myDiv', data, layout);
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="{{URL::to('/')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap theme -->
    <link href="{{URL::to('/')}}/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{URL::to('/')}}/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{URL::to('/')}}/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{URL::to('/')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{URL::to('/')}}/css/owl.carousel.css" type="text/css">
    <link href="{{URL::to('/')}}/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{URL::to('/')}}/css/fullcalendar.css">
    <link href="{{URL::to('/')}}/css/widgets.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::to('/')}}/css/style-responsive.css" rel="stylesheet" />
    <link href="{{URL::to('/')}}/css/xcharts.min.css" rel=" stylesheet">
    <link href="{{URL::to('/')}}/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>
<body>

    <section id="container" class="">
        @include('layouts.header')
        @include('layouts.sidebar')
        @include('layouts.section')
    </section>

    <script src="{{URL::to('/')}}/js/jquery.js"></script>
    <script src="{{URL::to('/')}}/js/jquery-ui-1.10.4.min.js"></script>
    <script src="{{URL::to('/')}}/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="{{URL::to('/')}}/js/jquery.scrollTo.min.js"></script>
    <script src="{{URL::to('/')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{URL::to('/')}}/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="{{URL::to('/')}}/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="{{URL::to('/')}}/js/owl.carousel.js"></script>
    <!-- jQuery full calendar -->
    <<script src="{{URL::to('/')}}/js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{URL::to('/')}}/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="{{URL::to('/')}}/js/calendar-custom.js"></script>
    <script src="{{URL::to('/')}}/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="{{URL::to('/')}}/js/jquery.customSelect.min.js"></script>
    <script src="{{URL::to('/')}}/assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="{{URL::to('/')}}/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="{{URL::to('/')}}/js/sparkline-chart.js"></script>
    <script src="{{URL::to('/')}}/js/easy-pie-chart.js"></script>
    <script src="{{URL::to('/')}}/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{URL::to('/')}}/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{URL::to('/')}}/js/xcharts.min.js"></script>
    <script src="{{URL::to('/')}}/js/jquery.autosize.min.js"></script>
    <script src="{{URL::to('/')}}/js/jquery.placeholder.min.js"></script>
    <script src="{{URL::to('/')}}/js/gdp-data.js"></script>
    <script src="{{URL::to('/')}}/js/morris.min.js"></script>
    <script src="{{URL::to('/')}}/js/sparklines.js"></script>

</body>
</html>

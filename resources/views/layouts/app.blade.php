<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{asset('../css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<main class="py-4">
    @yield('content')
</main>


<script src="{{asset('../js/main.js')}}" type="text/javascript"></script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>{{config('app.name', 'TBZ-SM')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script type='application/javascript' src='{{asset('js/app.js')}}'></script>
</head>
<body>
<!-- nav -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href='{{$index}}'>
                <img src="media/logo.png" class="img-fluid" width="40" height="40" alt="TBZ-SM">
            </a>
            <a class="nav-item text-white text-decoration-none" href=''>{{$about}}</a>
        </div>
    </div>
</nav>
<!-- ./nav -->

<!-- main -->
<main class="container">
    @yield('content')
</main>
<!-- ./main -->

<!-- footer -->
<footer class="container text-center">
    <ul class="nav nav-pills pull-right">
        <li>{{$credits}}</li>
    </ul>
</footer>
<!-- ./footer -->
</body>
</html>
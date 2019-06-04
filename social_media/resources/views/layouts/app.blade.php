<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name', 'TBZ-SM')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

    @include('inc.navbar')

<!-- main -->
<main class="container">
    @yield('content')
</main>
<!-- ./main -->

    <!-- <script type='application/javascript' src='{{asset('js/app.js')}}'></script> -->
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
<!-- footer -->
<footer class="container text-center">
    <ul class="nav nav-pills pull-right">
        <li>Ⓒ TBZ-SM by Chris O'Connor & Umut Savas</li>
    </ul>
</footer>
<!-- ./footer -->
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TBZ-SM') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
@include('inc.navbar')
<!-- main -->
    <main class="container">
        @yield('content')
    </main>
    <!-- ./main -->
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";

    $('#search').typeahead({
        dataType: 'json',
        source: function (query, process) {
            return $.get(path, {query: query}, function (data) {
                return process(data);
            });
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function likePost(id) {

        $.ajax({
            type: 'POST',
            url: '/likePost',
            data: {id: id},
            success: function (data) {
            }
        });
        if ($('#thumbs' + id).hasClass('fas')) {
            $('#thumbs' + id).removeClass('fas').addClass('far');
        } else {
            $('#thumbs' + id).removeClass('far').addClass('fas');
        }
        location.reload();
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<!-- Scripts -->
</body>
<!-- footer -->
<footer class="page-footer font-small blue pt-4">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-4">© 2019 Copyright:
        <a href="#"> TBZ-SM </a>by Chris O'Connor & Umut Savas
    </div>
    <!-- Copyright -->
</footer>
<!-- ./footer -->
</html>

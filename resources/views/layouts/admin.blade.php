<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>SalamDakwah | Admin Panel</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/fa/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/admin.css" rel="stylesheet">
    </head>

    <body>

        @include('layouts.adminnav')

		@yield('breadcrumbs')

        <div class="container">

            @yield('content')

        </div>

        <script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>

		@yield('script')

    </body>
</html>

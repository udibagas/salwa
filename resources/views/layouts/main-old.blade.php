<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/images/logo.png">
        <title>SalamDakwah |@yield('title')</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/fa/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/carousel.css" rel="stylesheet">
        <link href="/css/breadcrumb.css" rel="stylesheet">
		<link href="/css/gallery.css" rel="stylesheet">
		<link href="/css/comment.css" rel="stylesheet">
		<link href="/css/app.css" rel="stylesheet">
		@yield('css')
    </head>

    <body>

        @include('layouts.nav')

		<div class="hidden-xs">
			@yield('breadcrumbs')
		</div>

		@yield('slider')

        <div class="container-fluid">

            @yield('content')

            @include('layouts.footer')

        </div>

        <script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/carousel.js"></script>

		@yield('script')

    </body>
</html>
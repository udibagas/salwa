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
        <title>SalamDakwah | @yield('title')</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/fa/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/breadcrumb.css" rel="stylesheet">
		<link href="/summernote/summernote.css" rel="stylesheet">

		@if ($isMobile)
		<link href="/css/appMobile.css" rel="stylesheet">
		@else
		<link href="/css/app.css" rel="stylesheet">
		@endif

		<link href="/css/gallery.css" rel="stylesheet">
		<link href="/css/comment.css" rel="stylesheet">
		<link href="/sidr/dist/stylesheets/jquery.sidr.bare.css" rel="stylesheet">

		@stack('css')

		<script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/summernote/summernote.min.js"></script>
		<script type="text/javascript" src="/jwplayer/jwplayer.js"></script>
		@if ($isMobile)
		<script type="text/javascript" src="/sidr/dist/jquery.sidr.min.js"></script>
		<script type="text/javascript" src="/js/jquery.touchSwipe.min.js"></script>
		@endif
		<script type="text/javascript">jwplayer.key="Po/UoGBXOficWhpXsaov0bySptHn7pVD5NSbKQ==";</script>
    </head>

    <body>

		@if ($isMobile)
	        @include('layouts.navMobile')
		@else
			@include('layouts.nav')
		@endif

		@yield('breadcrumbs')

		@yield('slider')

        <div class="container-fluid">

            @yield('content')

            @yield('footer')

			<div class="row text-center" style="margin-top:0;background-color:#297FB9;color:#fff;padding:5px;">
				<small>&copy; {{date('Y')}} - Www.SalamDakwah.Com</small>
			</div>

        </div>

		@if ($isMobile)
			@include('layouts.menu')
		@endif

		<script type="text/javascript">

			@if ($isMobile)

				$('body').swipe( {
					swipeLeft: function () {$.sidr('close', 'sidr-main');},
					swipeRight: function () {$.sidr('open', 'sidr-main');},
					threshold: 30
				});

				$('#menu').sidr({name:'sidr-main',timing:'ease-in-out',speed:300});
				$('#menu-right').sidr({name:'sidr-right',timing:'ease-in-out',speed:300,side:'right'});

			@endif

			@if ($isMobile)
				$('.summernote').summernote({
					height: 200,
					toolbar: [
						['style', ['bold', 'italic', 'underline',]],
						['fontsize', ['fontsize', 'color']],
						['para', ['ul', 'ol', 'paragraph']],
						['insert', ['picture', 'video', 'link']],
					]
				});
			@else
				$('.summernote').summernote({
					height: 200,
					toolbar: [
						// [groupName, [list of button]]
						['style', ['bold', 'italic', 'underline', 'clear']],
						// ['font', ['strikethrough', 'superscript', 'subscript']],
						['fontsize', ['fontsize', 'color']],
						// ['color', ['color']],
						['para', ['ul', 'ol', 'paragraph']],
						['insert', ['picture', 'video', 'link', 'hr', 'table']],
						['misc', ['undo', 'redo', 'fullscreen']],
						// ['height', ['height']]
					]
				});
			@endif

			$('.delete').click(function() {
				return confirm('Anda yakin?');
			});

		</script>

		@stack('script')

    </body>
</html>

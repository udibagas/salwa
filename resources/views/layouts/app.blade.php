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
		<link href="/css/breadcrumb.css" rel="stylesheet">
		<link href="/summernote/summernote.css" rel="stylesheet">
		<link href="/css/app.css" rel="stylesheet">
		@stack('css')

		<script type="text/javascript" src="/js/jwplayer.js"></script>
		<script type="text/javascript">jwplayer.key="Po/UoGBXOficWhpXsaov0bySptHn7pVD5NSbKQ==";</script>

    </head>

    <body>

        @include('layouts.nav')

		<div class="hidden-xs">
			@yield('breadcrumbs')
		</div>

		@yield('slider')

        <div class="container-fluid">

            @yield('content')

            @yield('footer')

			<div class="row text-center" style="margin-top:0;background-color:#297FB9;color:#fff;padding:5px;">
				<small>&copy; {{date('Y')}} - Www.SalamDakwah.Com</small>
			</div>

        </div>

        <script src="/js/jquery.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/summernote/summernote.min.js"></script>
		@stack('script')

		<script type="text/javascript">
			$('.summernote').summernote({
				height: 200,
				toolbar: [
					// [groupName, [list of button]]
					['style', ['bold', 'italic', 'underline', 'clear']],
					// ['font', ['strikethrough', 'superscript', 'subscript']],
					['fontsize', ['fontsize']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['insert', ['picture', 'video', 'link', 'hr', 'table']],
					['misc', ['codeview', 'fullscreen']]
					// ['height', ['height']]
				]
			});
		</script>

    </body>
</html>

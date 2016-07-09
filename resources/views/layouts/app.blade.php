<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta property="og:title" content="SalamDakwah | @yield('title')" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:image" content="@yield('image')" />

		<link rel="image_src" href="@yield('image')" />

		<meta name="author" content="Salamdakwah" />
		<meta name="description" content="video kajian, audio kajian, forum islami, jadwal kajian dan artikel, yang berdasarkan Al-Quran dan As-Sunnah sebagaimana pemahaman para sahabat Rosululloh Shallallahu Alaihi Wasallam" />
		<meta name="keyword" content="video kajian,audio kajian,forum islami,jadwal kajian,artikel,Al-Quran,Sunnah,sahabat,Rosululloh,islam,muslim,muhammad" />
		<meta name="copyright" content="Copyrright {{ date('Y') }} by SalamDakwah.Com" />
		<meta name="language" content="id" />
		<meta name="distribution" content="Global" />
		<meta name="rating" content="General" />
		<meta name="robots" content="index,follow" />
		<meta name="googlebot" content="index,follow" />

		<meta name="revisit-after" content="1 days" />
		<meta name="expires" content="never" />
		<meta name="dc.title" content="SalamDakwah.Com" />
		<meta name="dc.creator.e-mail" content="udibagas@gmail.com" />
		<meta name="dc.creator.name" content="SalamDakwah" />
		<meta name="dc.creator.website" content="http://www.salamdakwah.com" />
		<meta name="tgn.name" content="Jakarta" />
		<meta name="tgn.nation" content="Indonesia" />

        <link rel="icon" href="/images/logo.png">
        <title>SalamDakwah | @yield('title')</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/fa/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/breadcrumb.css" rel="stylesheet">

		@if ($isMobile)
		<link href="/css/appMobile.css" rel="stylesheet">
		@else
		<link href="/css/app.css" rel="stylesheet">
		@endif

		<link href="/css/gallery.css" rel="stylesheet">
		<link href="/sidr/dist/stylesheets/jquery.sidr.bare.css" rel="stylesheet">

		@stack('css')

		<script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/tinymce/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="/jwplayer/jwplayer.js"></script>
		<script type="text/javascript" src="/jwplayer/jwplayer.html5.js"></script>
		<script type="text/javascript">jwplayer.key="Po/UoGBXOficWhpXsaov0bySptHn7pVD5NSbKQ==";</script>
		<script type="text/javascript" src="/initialjs/dist/initial.min.js"></script>
		@if ($isMobile)
		<script type="text/javascript" src="/sidr/dist/jquery.sidr.min.js"></script>
		<script type="text/javascript" src="/js/jquery.touchSwipe.min.js"></script>
		@endif

		<script type="text/javascript">
		// Prevent Bootstrap dialog from blocking focusin
			$(document).on('focusin', function(e) {
				if ($(e.target).closest(".mce-window").length) {
				e.stopImmediatePropagation();
				}
			});
			tinymce.init({
				selector: '.summernote',
				// file_browser_callback: function(field_name, url, type, win) {
					// win.document.getElementById(field_name).value = 'my browser value';
				// },
				height: 250,
				plugins: [
					'advlist autolink lists link image charmap print preview anchor',
					'searchreplace visualblocks code fullscreen',
					'insertdatetime media table contextmenu paste code'
				],
				toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
				content_css: [
					'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
					'//www.tinymce.com/css/codepen.min.css'
				]
			});
		</script>
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

			$('#popup').modal('show')

			@if ($isMobile)

				// $('body').swipe( {
				// 	swipeLeft: function () {$.sidr('close', 'sidr-main');},
				// 	swipeRight: function () {$.sidr('open', 'sidr-main');},
				// 	threshold: 75
				// });

				$('#menu').sidr({
					name:'sidr-main',timing:'ease-in-out',speed:200,
					onOpen: function() {
						$('.mobile-nav').css('left', '275px');
					},
					onClose: function() {
						$('.mobile-nav').css('left', '0');
					}
				});

				if ($('#sidr-right').length) {
					$('#menu-right').removeClass('hidden').sidr({
						name:'sidr-right',timing:'ease-in-out',speed:200,side:'right',
						onOpen: function() {
							$('.mobile-nav').css('left', '-275px');
							$('.mobile-nav').css('right', '275px');
						},
						onClose: function() {
							$('.mobile-nav').css('right', '0');
							$('.mobile-nav').css('left', '0');
						}
					});
				}


			@endif

			$('.profile').initial({charCount:1, height:50, width:50,fontSize:25});

			$('.delete').click(function() {
				return confirm('Anda yakin?');
			});

			var search = '{{ request("search") }}';
			var group_id = '{{ request("group_id") }}';
			var user_id = '{{ request("user_id") }}';

		</script>

		@stack('script')

		<script type="text/javascript" src="/js/pager.js"></script>

    </body>
</html>

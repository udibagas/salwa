<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="SalamDakwah" />
		<meta name="description" content="video kajian, audio kajian, forum islami, jadwal kajian dan artikel, yang berdasarkan Al-Quran dan As-Sunnah sebagaimana pemahaman para sahabat Rosululloh Shallallahu Alaihi Wasallam" />
		<meta name="keyword" content="video kajian,audio kajian,forum islami,jadwal kajian,artikel,Al-Quran,Sunnah,sahabat,Rosululloh,islam,muslim,muhammad" />
		<meta name="copyright" content="Copyright {{ date('Y') }} by SalamDakwah.Com" />
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
        <title>SalamDakwah | Situs Da'wah Ahlussunnah wal Jama'ah dengan Pemahaman Para Salaful Ummah</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/fa/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/gallery.css" rel="stylesheet">
		<link href="/css/timeline.css" rel="stylesheet">
		<link href="/sidr/dist/stylesheets/jquery.sidr.bare.css" rel="stylesheet">
		<script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/initialjs/dist/initial.min.js"></script>
		<script type="text/javascript" src="/sidr/dist/jquery.sidr.min.js"></script>

    </head>

    <body>

		<div class="top">
			@include('timeline._form')
		</div>

        <div class="container">

            @yield('content')

			<div class="row text-center" style="padding:5px;background-color:#032876;color:#fff;">
				<small>&copy; {{date('Y')}} - <a href="http://www.salamdakwah.com" style="color:#fff;">Www.SalamDakwah.Com</a></small>
			</div>

			@include('timeline._menu')

        </div>

		<script type="text/javascript">

			$('#menu').sidr({ name:'sidr',timing:'ease-in-out',speed:200,side:'right',
				onOpen: function() { $('.top').css('left', '-275px'); $('.top').css('right', '275px'); },
				onClose: function() { $('.top').css('right', '0'); $('.top').css('left', '0'); }
			});

		</script>

		@stack('script')

    </body>
</html>

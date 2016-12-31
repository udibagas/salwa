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
        <title>Salwa.id</title>
        <link rel="stylesheet" href="/css/app.css">
        
        @if ($isMobile)
        <link rel="stylesheet" href="/css/mobile.css">
        @else
        <link rel="stylesheet" href="/css/all.css">
        @endif

		@stack('css')

    </head>

    <body>

        <div class="container">

            @yield('content')

			<div class="row text-center" style="padding:10px;">
				<small>&copy; {{date('Y')}} - <a href="http://www.salamdakwah.com">Www.SalamDakwah.Com</a></small>
			</div>

        </div>

		<script type="text/javascript">
			var search = '{{ request("search") }}';
			var group_id = '{{ request("group_id") }}';
			var user_id = '{{ request("user_id") }}';
			var q = '{{ request("q") }}';
		</script>

		@stack('script')

		<script type="text/javascript" src="/js/app.js"></script>
		<script type="text/javascript" src="/js/all.js"></script>

    </body>
</html>

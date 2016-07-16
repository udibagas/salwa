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

			<a href="#" class="back-to-top">
				<img class="profile img-circle" data-name="&uarr;" style="position:fixed;bottom:65px;right:20px;" data-font-size="17" />
			</a>

			<a href="#">
				<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="28" />
			</a>

        </div>

		<script type="text/javascript">

			var url 		= '{{ $posts->nextPageUrl() }}';
			var type 		= '{{ request("type") }}';
			var q 			= '{{ request("q") }}';
			var lastPage 	= false;
			var nextBtn 	= $('.next-page');

			nextBtn.on('click', function(e) { e.preventDefault(); loadMore(); });

			var loadMore = function() {
				$.ajax({
					url: url, data: {type: type, q: q}, dataType: 'json',
					beforeSend: function() { nextBtn.hide(); $('.loading').removeClass('hidden'); },
					success: function(json) {
						$('.loading').addClass('hidden');
						$('#post-list').append(json.html);

						if (json.currentPage < json.lastPage) { nextBtn.show(); } else { lastPage = true; nextBtn.parent().html('<br />-&bull; END &bull;-<br /><br />'); }

						$('.profile').initial({charCount:1, height:40, width:40,fontSize:17});
						if (q.length > 0) { $('#post-list h4, #post-list p, #post-list .terjemahan').each(function(index, element) { text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>'); $(this).html(text); }); }
						url = json.nextPageUrl;
					}
				});
			};

			$('#menu').sidr({ name:'sidr',timing:'ease-in-out',speed:200,side:'right', onOpen: function() { $('.top').css('left', '-275px'); $('.top').css('right', '275px'); }, onClose: function() { $('.top').css('right', '0'); $('.top').css('left', '0'); } });

			$('.profile').initial({charCount:1, height:40, width:40,fontSize:17});

			$(window).scroll(function() { if($(window).scrollTop() + $(window).height() == $(document).height() && lastPage == false && url != '') { loadMore(); } });

			$('body').on("click", ".back-to-top", function(e) { e.preventDefault(); $("html, body").animate({scrollTop: 0}, 700); });

			$('#post-list h4, #post-list p').each(function(index, element) { text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>'); $(this).html(text); });

		</script>

		@stack('script')

    </body>
</html>

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
        <title>SalamDakwah | Al Quran Online</title>
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/sidr/dist/stylesheets/jquery.sidr.bare.css" rel="stylesheet">
		<link href="/css/quran-image.css" rel="stylesheet">
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" src="/sidr/dist/jquery.sidr.min.js"></script>
    </head>

    <body>
		<!-- <div class="top">
			include('quran.mobile._nav')
		</div> -->

		<div id="post-list">
			@include('quran.mobile._image', ['page' => $page])
		</div>
        <div class="container">
        </div>

		<!-- include('quran.mobile._image-nav')
		include('quran.mobile._surah') -->

		<script type="text/javascript">

			$('img').css('height', screen.height);

			var nextPage = {{ request('page', 1) + 1 }};
			var prevPage = nextPage - 2;
			$("body").swipe({
				swipeRight:function(event, direction, distance, duration, fingerCount) {
					if (nextPage == 605) { return; }
					$.ajax({
						type: 'GET',
						data: {page : nextPage},
						dataType: 'json',
						success: function(j) {
							$('#post-list').html(j.html);
							$('img').css('height', screen.height);
							nextPage += 1;
							prevPage += 1;
						}
					});
				},
				swipeLeft:function(event, direction, distance, duration, fingerCount) {
					if (prevPage == 0) { return; }
					$.ajax({
						type: 'GET',
						data: {page : prevPage},
						dataType: 'json',
						success: function(j) {
							$('#post-list').html(j.html);
							$('img').css('height', screen.height);
							nextPage -= 1;
							prevPage -= 1;
						}
					});
				},
				threshold:75
			});

			$('#menu').sidr({
				name: 'sidr', timing: 'ease-in-out', speed: 200, side: 'right',
				onOpen: function() {
					$('.top').css('left', '-275px');
					$('.top').css('right', '275px');
				},
				onClose: function() {
					$('.top').css('right', '0');
					$('.top').css('left', '0');
				}
			});

		</script>
    </body>
</html>

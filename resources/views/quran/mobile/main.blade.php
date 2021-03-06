<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SalamDakwah | Al Quran Online</title>

		<meta property="og:url" content="{{ url()->full() }}" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Al Quran Online" />
		<meta property="og:site_name" content="SalamDakwah" />
		<meta property="og:description" content="Al Quran Online Beserta Audio dan Tafsir" />
		<meta property="og:image" content="" />

		<!-- for Twitter -->
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="Al Quran Online" />
		<meta name="twitter:description" content="" />
		<meta name="twitter:image" content="" />

		<meta name="author" content="SalamDakwah" />
		<meta name="description" content="Al Quran Online Beserta Audio dan Tafsir" />
		<meta name="keyword" content="al quran, quran, audio quran, murottal, murotal, tafsir, tafsir quran, tafsir al quran, mp3 quran" />

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
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/quran-mobile.css" rel="stylesheet">
    </head>

    <body>
		<div class="top">
			@include('quran.mobile._nav')
		</div>

        <div class="container">
			<div id="post-list">
				@each('quran.mobile._ayat', $ayats, 'a')
			</div>

			@if ($ayats->lastPage() > 1)
				<div class="text-center text-bold">
					<br /><img src="/images/loading.png" alt="" class="loading hidden" />
					<a href="{{ $ayats->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
				</div>
			@endif
        </div>

		@include('quran.mobile._player')
		@include('quran.mobile._surah')

        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="/js/all.js"></script>

		<script type="text/javascript">

			var url = '{{ $ayats->nextPageUrl() }}';
			var q = '{{ request("q") }}';
			var lastPage = false;
			var nextBtn = $('.next-page');

			nextBtn.on('click', function(e) {
				e.preventDefault();
				loadMore();
			});

			var stopAudio = function() {
				audio.pause();
				$('.pause').hide();
				$('.play').show();
			};

			var playAudio = function(a, e) {
				$('.track').removeClass('warning');
				if (e.length) { $(e).addClass('warning'); }
				a.play();
				$('.play').hide();
				$('.pause').show();
				$('html, body').animate({ scrollTop: $(".track.warning").offset().top - 50 }, 700);
				a.addEventListener('timeupdate', function() { if (a.ended) { stopAudio(); } });
				track = $('.track.warning').attr('audiourl');
			};

			var loadMore = function() {
				$.ajax({
					url: url, data: { q: q }, dataType: 'json',
					beforeSend: function() { nextBtn.hide(); $('.loading').removeClass('hidden'); },
					success: function(json) {

						$('.loading').addClass('hidden');
						$('#post-list').append(json.html);

						if (json.currentPage < json.lastPage) {
							nextBtn.show();
						} else {
							lastPage = true;
							nextBtn.parent().html('<br /><a href="#" class="back-to-top">UP</a><br /><br />');
						}

						if (q.length > 0) {
							$('#post-list h4, #post-list p, #post-list .terjemahan').each(function(index, element) {
								text = $(this).html().replace(RegExp(q, "gi"), '<b>' + q + '</b>');
								$(this).html(text);
							});
						}

						url = json.nextPageUrl;
					}
				});
			};

			$('.pause').hide();
			$('.track').first().addClass('warning');

			var qari = $('[name="qari"]').val();
			var audioDir = '/quran_audio/'+qari;
			var track = $('.track').first().attr('audiourl');

			$('[name="qari"]').on('change', function() {
				var q = $(this).val();
				audioDir = '/quran_audio/'+q;
				stopAudio();
				audio = initAudio(track);
			});

			var initAudio = function(t) {
				return new Audio(audioDir+t);
			}

			var audio = initAudio(track);

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

			$(window).scroll(function() {
				if ($(window).scrollTop() + $(window).height() == $(document).height() && lastPage == false && url != '') {
					loadMore();
				}
			});

			$('body').on("click", ".back-to-top", function(e) {
				e.preventDefault();
				$("html, body").animate({ scrollTop: 0 }, 700);
			});

			if (q.length > 0) {
				$('#post-list .terjemahan').each(function(index, element) {
					text = $(this).html().replace(RegExp(q, "gi"), '<b>' + q + '</b>');
					$(this).html(text);
				});
			}

			$('.play').click(function(e) {
				e.preventDefault();
				audio.pause();
				playAudio(audio, $('.track.warning'));
			});

			$(document).on('click', '.track', function() {
				audio.pause();
				audio = initAudio($(this).attr('audiourl'));
				playAudio(audio, $(this));
			});

			$('.next').click(function(e) {
				e.preventDefault();
				var next = $('.track.warning').next();
				if (next.length == 0) { return; }
				audio.pause();
				audio = initAudio($(next).attr('audiourl'));
				playAudio(audio, next);
			});

			$('.prev').click(function(e) {
				e.preventDefault();
				var prev = $('.track.warning').prev('.track');
				if (prev.length == 0) { return; }
				audio.pause();
				audio = initAudio($(prev).attr('audiourl'));
				playAudio(audio, prev);
			});

			$('.pause').click(function(e) {
				e.preventDefault();
				stopAudio();
			});

			@if (app()->environment('production'))
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-78820743-1', 'auto');
			ga('send', 'pageview');

			@endif

		</script>

    </body>
</html>

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
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/fa/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/quran-desktop.css" rel="stylesheet">
		<script type="text/javascript" src="/js/jquery.min.js"></script>
        <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>

    </head>

    <body>

		@include('quran._nav')

        <div class="container-fluid">

            @yield('content')

			<div class="row text-center" style="margin-top:0;background-color:#297FB9;color:#fff;padding:5px;">
				<small>&copy; {{date('Y')}} - Www.SalamDakwah.Com</small>
			</div>
        </div>

		<script type="text/javascript">
			$('.pause').hide();

			var audio = new Audio('@if ($ayats->count()) /quran_audio/misyari/{{ str_pad($ayats->first()->surat_id, 3, '0', STR_PAD_LEFT) }}/{{ str_pad($ayats->first()->ayat_id, 3, '0', STR_PAD_LEFT) }}.mp3 @endif');

			$('.track').first().addClass('warning');

			$('.play').click(function(e) {
				e.preventDefault();
				audio.pause();
				playAudio(audio, $('.track.warning'));
			});

			$('.track').click(function() {
				audio.pause();
				audio = new Audio($(this).attr('audiourl'));
				playAudio(audio, $(this));
			});

			$('.next').click(function(e) {
				e.preventDefault();
				var next = $('.track.warning').next();

				if (next.length == 0) {
					return;
				}

				audio.pause();
				audio = new Audio($(next).attr('audiourl'));
				playAudio(audio, next);
			});

			$('.prev').click(function(e) {
				e.preventDefault();
				var prev = $('.track.warning').prev('.track');

				if (prev.length == 0) {
					return;
				}

				audio.pause();
				audio = new Audio($(prev).attr('audiourl'));
				playAudio(audio, prev);
			});

			$('.pause').click(function(e) {
				e.preventDefault();
				stopAudio();
			});

			var stopAudio = function() {
				audio.pause();
				$('.pause').hide();
				$('.play').show();
				$('.progress-bar').removeClass('active');
			};

			var playAudio = function(a, e) {
				$('.progress-bar').attr('aria-valuemax', a.duration);
				$('.track').removeClass('warning');

				if (e.length) {
					$(e).addClass('warning');
				}

				$('.track-title').html($('.track.warning').attr('audio-title'));
				a.play();

				var duration = 0;

				a.addEventListener('loadedmetadata', function() {
					duration = parseInt(a.duration, 10);

				});

				a.addEventListener('timeupdate',function (){
					var progress = parseInt(a.currentTime, 10)/duration*100;
					$('.progress-bar').css('width', progress+"%").attr('aria-valuenow', progress);
					if (a.ended) {
						stopAudio();
					}
				});

				$('.play').hide();
				$('.pause').show();
			};

			var q = '{{ request("q") }}';

			if (q.length > 0) {
				$('.list-group .terjemahan').each(function(index, element) {
					text = $(this).html().replace(RegExp(q, "gi"),'<b><i>'+q+'</i></b>');
					$(this).html(text);
				});
			}

		</script>

    </body>
</html>

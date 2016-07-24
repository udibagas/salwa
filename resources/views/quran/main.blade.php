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

			<!-- <div class="row text-center" style="margin-top:0;padding:5px;">
				<small>&copy; {{date('Y')}} - Www.SalamDakwah.Com</small>
			</div> -->
        </div>

		<script type="text/javascript">

			var q = '{{ request("q") }}';

			if (q.length > 0) {
				$('.terjemahan').each(function(index, element) {
					text = $(this).html().replace(RegExp(q, "gi"),'<span style="background-color:yellow;">'+q+'</span>');
					$(this).html(text);
				});
			}

			/*
			    Copy text from any appropriate field to the clipboard
			  By Craig Buckler, @craigbuckler
			  use it, abuse it, do whatever you like with it!
			*/
			(function() {

			    'use strict';

			  // click events
			  document.body.addEventListener('click', copy, true);

			    // event handler
			    function copy(e) {

			    // find target element
			    var
			      t = e.target,
			      c = t.dataset.copytarget,
			      inp = (c ? document.querySelector(c) : null);

			    // is element selectable?
			    if (inp && inp.select) {

			      // select text
			      inp.select();

			      try {
			        // copy text
			        document.execCommand('copy');
			        inp.blur();

			        // copied animation
			        t.classList.add('copied');
			        setTimeout(function() { t.classList.remove('copied'); }, 1500);
			      }
			      catch (err) {
			        alert('please press Ctrl/Cmd+C to copy');
			      }

			    }

			    }

			})();

		</script>

		@stack('script')

    </body>
</html>

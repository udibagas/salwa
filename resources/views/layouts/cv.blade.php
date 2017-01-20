<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CV</title>
		<link rel="image_src" href="@yield('image')" />
		<meta property="og:url" content="{{ url()->full() }}" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:site_name" content="CV" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:image" content="@yield('image')" />
		<!-- for Twitter -->
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:title" content="@yield('title')" />
		<meta name="twitter:description" content="@yield('description')" />
		<meta name="twitter:image" content="@yield('imageSquare')" />
		<meta name="author" content="SalamDakwah" />
		<meta name="description" content="@yield('description')" />
		<meta name="keyword" content="cv" />
		<meta name="copyright" content="Copyright {{ date('Y') }} udibagas" />
		<meta name="language" content="id" />
		<meta name="distribution" content="Global" />
		<meta name="rating" content="General" />
		<meta name="robots" content="index,follow" />
		<meta name="googlebot" content="index,follow" />
		<meta name="revisit-after" content="1 days" />
		<meta name="expires" content="never" />
		<meta name="dc.title" content="Udibagas.Com" />
		<meta name="dc.creator.e-mail" content="udibagas@gmail.com" />
		<meta name="dc.creator.name" content="Udibagas" />
		<meta name="dc.creator.website" content="http://www.udibagas.com" />
		<meta name="tgn.name" content="Jakarta" />
		<meta name="tgn.nation" content="Indonesia" />
        <link rel="icon" href="/images/logo.png">
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>

    <body>
        <div class="container" id="app">
            @yield('content')
        </div>
    </body>
</html>

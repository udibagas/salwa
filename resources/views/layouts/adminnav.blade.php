<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">SALWA ADMIN PANEL</a>
		</div>

    	<div id="navbar" class="navbar-collapse collapse">

			<form class="navbar-form navbar-right" method="GET" action="/home/search">
				<div class="form-group">
					<input type="text" name="q" placeholder="Cari" class="form-control">
				</div>
				<div class="form-group">
					<select class="form-control" name="field">
						<option value="">-- Pilih Field --</option>
						<option value="artikel">-- Aktual --</option>
						<option value="tanya">-- Tanya Ustaz --</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
			</form>

			<ul class="nav navbar-nav navbar-right">
				<!-- <li class=""><a href="/"><span class="fa fa-home text-orange"></span></a></li> -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">POST <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/post/halaman">Halaman</a></li>
						<li><a href="/post/aktual">Aktual</a></li>
						<li><a href="/post/info">Salwa Info</a></li>
						<li><a href="/post/peduli">Salwa Peduli</a></li>
						<li><a href="/post/tanya">Tanya Ustadz</a></li>
						<li><a href="/post/kitab">Kitab & Terjemahan</a></li>
						<li><a href="/post/forum">Forum</a></li>
						<li><a href="/post/promo">Salwa Promo</a></li>
						<li><a href="/post/doa">Do'a</a></li>
						<li><a href="/post/dzikir">Dzikir</a></li>
						<li><a href="/post/hadits">Hadits</a></li>
						<li><a href="/post/video">Video</a></li>
						<li><a href="/post/audio">Audio</a></li>
						<li><a href="/post/murottal">Murottal Qur'an</a></li>
						<li><a href="/post/image">Salwa Image</a></li>
					</ul>
		        </li>
			</ul>
    	</div><!--/.navbar-collapse -->
	</div>
</nav>

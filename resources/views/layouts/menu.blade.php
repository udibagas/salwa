<div id="sidr-main">
	<div class="list-group">
		<span class="list-group-item">
			<audio controls="controls" preload="none" style="width:100%" autoplay="autoplay"><source src="http://119.82.232.83:1111/;stream.mp3" type="application/ogg"></source></audio>
		</span>
		<span class="list-group-item">
			{!! Form::open(['url' => '/search', 'method' => 'GET']) !!}
				<input type="text" name="q" value="{{ request('q') }}" placeholder="Search" class="form-control search-field">
			{!! Form::close() !!}
		</span>
		<a class="list-group-item" href="/">
			<i class="fa fa-home"></i> HOME
		</a>
		<a class="list-group-item" href="/quran">
			<i class="fa fa-book"></i> AL QURAN <sup>BETA</sup>
		</a>
		<a class="list-group-item" href="/video">
			<i class="fa fa-video-camera"></i> SALWA VIDEO
		</a>
		<!-- <a class="list-group-item" href="/radio">
			<i class="fa fa-microphone"></i> SALWA RADIO
		</a> -->
		<a class="list-group-item" href="/artikel">
			<i class="fa fa-file-text"></i> SALWA AKTUAL
		</a>
		<a class="list-group-item" href="/pertanyaan">
			<i class="fa fa-question-circle"></i> TANYA USTADZ
		</a>
		<a class="list-group-item" href="/forum">
			<i class="fa fa-comments-o"></i> SALWA FORUM
		</a>
		<a class="list-group-item" href="/produk">
			<i class="fa fa-shopping-cart"></i> SALWA MARKET
		</a>
		<a class="list-group-item" href="/peduli">
			<i class="fa fa-heart-o"></i> SALWA PEDULI
		</a>
		<a class="list-group-item" href="/kajian">
			<i class="fa fa-edit"></i> KAJIAN
		</a>
		<a class="list-group-item" href="/kitab">
			<i class="fa fa-book"></i> KITAB & TERJEMAHAN
		</a>
		<a class="list-group-item" href="/doa">
			<i class="fa fa-heartbeat"></i> DO'A
		</a>
		<a class="list-group-item" href="/dzikir">
			<i class="fa fa-hand-stop-o"></i> DZIKIR
		</a>
		<a class="list-group-item" href="/hadist">
			<i class="fa fa-list-alt"></i> HADITS
		</a>
		<a class="list-group-item" href="/audio">
			<i class="fa fa-music"></i> SALWA AUDIO
		</a>
		<a class="list-group-item" href="/murottal">
			<i class="fa fa-microphone"></i> MUROTTAL AL QURAN
		</a>
		<a class="list-group-item" href="/image">
			<i class="fa fa-image"></i> SALWA IMAGE
		</a>
		<a class="list-group-item" href="informasi">
			<i class="fa fa-newspaper-o"></i> SALWA INFO
		</a>
		<!-- <a class="list-group-item" href="/promo">
			<i class="fa fa-tags"></i> SALWA PROMO
		</a> -->
	</div>
</div>

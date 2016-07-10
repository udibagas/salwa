<div id="sidr-main">
	<div class="list-group">
		<span class="list-group-item info active" style="border-radius:0;">
			{!! Form::open(['url' => '/search', 'method' => 'GET']) !!}
				<input type="text" name="q" value="{{ request('q') }}" placeholder="Search" class="form-control search-field">
			{!! Form::close() !!}
		</span>
		<a class="list-group-item info active" href="/">
			<i class="fa fa-home"></i> HOME
		</a>
		<a class="list-group-item info active" href="/video">
			<i class="fa fa-video-camera"></i> SALWA VIDEO
		</a>
		<a class="list-group-item info active" href="/radio">
			<i class="fa fa-microphone"></i> SALWA RADIO
		</a>
		<a class="list-group-item info active" href="/artikel">
			<i class="fa fa-file-text"></i> SALWA AKTUAL
		</a>
		<a class="list-group-item info active" href="/pertanyaan">
			<i class="fa fa-question-circle"></i> TANYA USTADZ
		</a>
		<a class="list-group-item info active" href="/forum">
			<i class="fa fa-comments-o"></i> SALWA FORUM
		</a>
		<a class="list-group-item info active" href="/produk">
			<i class="fa fa-shopping-cart"></i> SALWA MARKET
		</a>
		<a class="list-group-item info active" href="/peduli">
			<i class="fa fa-heart-o"></i> SALWA PEDULI
		</a>
		<a class="list-group-item info active" href="/kajian">
			<i class="fa fa-edit"></i> KAJIAN
		</a>
		<a class="list-group-item info active" href="/kitab">
			<i class="fa fa-book"></i> KITAB & TERJEMAHAN
		</a>
		<a class="list-group-item info active" href="/doa">
			<i class="fa fa-heartbeat"></i> DO'A
		</a>
		<a class="list-group-item info active" href="/dzikir">
			<i class="fa fa-hand-stop-o"></i> DZIKIR
		</a>
		<a class="list-group-item info active" href="/hadist">
			<i class="fa fa-list-alt"></i> HADITS
		</a>
		<a class="list-group-item info active" href="/audio">
			<i class="fa fa-music"></i> SALWA AUDIO
		</a>
		<a class="list-group-item info active" href="/murottal">
			<i class="fa fa-microphone"></i> MUROTTAL AL QURAN
		</a>
		<a class="list-group-item info active" href="/image">
			<i class="fa fa-image"></i> SALWA IMAGE
		</a>
		<a class="list-group-item info active" href="/informasi" style="border-radius:0;">
			<i class="fa fa-newspaper-o"></i> SALWA INFO
		</a>
		<!-- <a class="list-group-item info active" href="/promo" style="border-radius:0;">
			<i class="fa fa-tags"></i> SALWA PROMO
		</a> -->
	</div>
</div>

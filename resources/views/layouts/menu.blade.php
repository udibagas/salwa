<div id="sidr-main">
	<div class="list-group">
		@if (auth()->guest())
		<a class="list-group-item info active" href="/login" style="border-radius:0;">
			<i class="fa fa-sign-in"></i> LOGIN
		</a>
		<a class="list-group-item info active" href="/register">
			<i class="fa fa-edit"></i> REGISTER
		</a>
		@else
		<a class="list-group-item info active" href="/me" style="border-radius:0;">
			<i class="fa fa-user"></i> PROFILE
		</a>
		<a class="list-group-item info active" href="/logout">
			<i class="fa fa-sign-out"></i> LOGOUT
		</a>
		@endif
		<span class="list-group-item info active">
			{!! Form::open(['url' => '/home', 'method' => 'GET']) !!}
				<input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="form-control search-field">
			{!! Form::close() !!}
		</span>
		<a class="list-group-item info active" href="/">
			<i class="fa fa-home"></i> HOME
		</a>
		<a class="list-group-item info active" href="/video">
			<i class="fa fa-video-camera"></i> Salwa Video
		</a>
		<a class="list-group-item info active" href="/artikel">
			<i class="fa fa-file-text"></i> Salwa Aktual
		</a>
		<a class="list-group-item info active" href="/pertanyaan">
			<i class="fa fa-question-circle"></i> Tanya Ustadz
		</a>
		<a class="list-group-item info active" href="/forum">
			<i class="fa fa-comments-o"></i> Salwa Forum
		</a>
		<a class="list-group-item info active" href="/produk">
			<i class="fa fa-shopping-cart"></i> Salwa Market
		</a>
		<a class="list-group-item info active" href="/peduli">
			<i class="fa fa-heart-o"></i> Salwa Peduli
		</a>
		<a class="list-group-item info active" href="/kajian">
			<i class="fa fa-edit"></i> Kajian
		</a>
		<a class="list-group-item info active" href="/kitab">
			<i class="fa fa-book"></i> Kitab & Terjemahan
		</a>
		<a class="list-group-item info active" href="/doa">
			<i class="fa fa-heartbeat"></i> Do'a
		</a>
		<a class="list-group-item info active" href="/dzikir">
			<i class="fa fa-hand-stop-o"></i> Dzikir
		</a>
		<a class="list-group-item info active" href="/hadist">
			<i class="fa fa-list-alt"></i> Hadits
		</a>
		<a class="list-group-item info active" href="/audio">
			<i class="fa fa-music"></i> Salwa Audio
		</a>
		<a class="list-group-item info active" href="/murottal">
			<i class="fa fa-microphone"></i> Murottal Al Quran
		</a>
		<a class="list-group-item info active" href="/image">
			<i class="fa fa-image"></i> Salwa Image
		</a>
		<a class="list-group-item info active" href="/informasi" style="border-radius:0;">
			<i class="fa fa-newspaper-o"></i> Salwa Info
		</a>
		<!-- <a class="list-group-item info active" href="/promo" style="border-radius:0;">
			<i class="fa fa-tags"></i> Salwa Promo
		</a> -->
	</div>
</div>

<div class="col-md-6">
	<h4 class="title"><i class="fa fa-video-camera"></i> Video</h4>
	<ul class="list-group">
		@foreach($videos as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/video/{{ $v->video_id }}-{{ str_slug($v->title) }}">{{ $v->title }}</a></strong>
			<br />
			{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($videos))
			<b><a href="/video?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>
</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-file-text-o"></i> Artikel</h4>
	<ul class="list-group">
		@foreach($artikels as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/artikel/{{ $v->artikel_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($artikels))
			<b><a href="/artikel?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-newspaper-o"></i> Informasi</h4>

	<ul class="list-group">
		@foreach($informasis as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/informasi/{{ $v->informasi_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			{{ $v->updated->diffForHumans() }}
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($informasis))
			<b><a href="/informasi?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-heart-o"></i> Peduli</h4>

	<ul class="list-group">
		@foreach($pedulis as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/peduli/{{ $v->peduli_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($pedulis))
			<b><a href="/peduli?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-comments-o"></i> Forum</h4>
	<ul class="list-group">
		@foreach($forums as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/forum/{{ $v->forum_id }}-{{ str_slug($v->title) }}">{{ $v->title }}</a></strong>
			<br />
			{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($forums))
			<b><a href="/forum?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-comments-o"></i> Komentar Forum</h4>
	<ul class="list-group">
		@foreach($posts as $v)

		<li class="list-group-item" style="padding:5px">
			<a href="/forum/{{ $v->forum->forum_id }}-{{ str_slug($v->forum->title) }}">{{ str_limit($v->description, 150) }}</a>
			<br />
			{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($posts))
			<b><a href="/forum?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-question"></i> Tanya Ustadz</h4>
	<ul class="list-group">
		@foreach($pertanyaan as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/pertanyaan/{{ $v->pertanyaan_id }}-{{ str_slug($v->judul_pertanyaan) }}">{{ $v->judul_pertanyaan }}</a></strong>
			<br />
			{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($pertanyaan))
			<b><a href="/pertanyaan?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-book"></i> Kitab</h4>
	<ul class="list-group">
		@foreach($buku as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/kitab/{{ $v->buku_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			{{ $v->penulis }}
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($buku))
			<b><a href="/kitab?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-heartbeat"></i> Doa</h4>
	<ul class="list-group">
		@foreach($doa as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/doa/{{ $v->hadist_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($doa))
			<b><a href="/doa?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-hand-stop-o"></i> Dzikir</h4>
	<ul class="list-group">
		@foreach($dzikir as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/doa/{{ $v->hadist_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($dzikir))
			<b><a href="/doa?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-list-alt"></i> Hadist</h4>
	<ul class="list-group">
		@foreach($hadist as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/doa/{{ $v->hadist_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($hadist))
			<b><a href="/doa?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-music"></i> Audio</h4>
	<ul class="list-group">
		@foreach($audios as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/mp3/{{ $v->mp3_download_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			{{ $v->updated->diffForHumans() }}
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($audios))
			<b><a href="/mp3?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-image"></i> Images</h4>
	<ul class="list-group">
		@foreach($images as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/image/{{ $v->id_salwaimages }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($images))
			<b><a href="/image?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title"><i class="fa fa-shopping-cart"></i> Market</h4>
	<ul class="list-group">
		@foreach($produks as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/produk/{{ $v->id_produk }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			RP {{ number_format($v->harga) }}
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($produks))
			<b><a href="/produk?search={{ request('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>

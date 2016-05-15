<div class="col-md-6">
	<h4 class="title">Video</h4>

	<ul class="list-group">
		@foreach($videos as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/video/{{ $v->video_id }}-{{ str_slug($v->title) }}">{{ $v->title }}</a></strong>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($videos))
			<b><a href="/video?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Artikel</h4>
	<ul class="list-group">
		@foreach($artikels as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/artikel/{{ $v->artikel_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($artikels))
			<b><a href="/artikel?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Informasi</h4>

	<ul class="list-group">
		@foreach($informasis as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/informasi/{{ $v->informasi_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($informasis))
			<b><a href="/informasi?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Peduli</h4>

	<ul class="list-group">
		@foreach($pedulis as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/peduli/{{ $v->peduli_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($pedulis))
			<b><a href="/peduli?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Forum</h4>
	<ul class="list-group">
		@foreach($forums as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/forum/{{ $v->forum_id }}-{{ str_slug($v->title) }}">{{ $v->title }}</a></strong>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($forums))
			<b><a href="/forum?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Komentar Forum</h4>
	<ul class="list-group">
		@foreach($posts as $v)

		<li class="list-group-item" style="padding:5px">
			<a href="/forum/{{ $v->forum->forum_id }}-{{ str_slug($v->forum->title) }}">{{ $v->description }}</a>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($posts))
			<b><a href="/post?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Tanya Ustadz</h4>
	<ul class="list-group">
		@foreach($pertanyaan as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/pertanyaan/{{ $v->pertanyaan_id }}-{{ str_slug($v->judul_pertanyaan) }}">{{ $v->judul_pertanyaan }}</a></strong>
			<br />
			<em>{{ $v->user ? $v->user->name : '' }} | {{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach
		<li class="list-group-item text-center">
			@if (count($pertanyaan))
			<b><a href="/pertanyaan?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Kitab</h4>
	<ul class="list-group">
		@foreach($buku as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/kitab/{{ $v->buku_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			<em>{{ $v->penulis }}</em>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($buku))
			<b><a href="/kitab?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Doa</h4>
	<ul class="list-group">
		@foreach($doa as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/doa/{{ $v->hadist_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($doa))
			<b><a href="/doa?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Dzikir</h4>
	<ul class="list-group">
		@foreach($dzikir as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/doa/{{ $v->hadist_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($dzikir))
			<b><a href="/doa?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Hadist</h4>
	<ul class="list-group">
		@foreach($hadist as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/doa/{{ $v->hadist_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($hadist))
			<b><a href="/doa?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>
	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Audio</h4>
	<ul class="list-group">
		@foreach($audios as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/mp3/{{ $v->mp3_download_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			<em>{{ $v->updated->diffForHumans() }}</em>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($audios))
			<b><a href="/mp3?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Images</h4>
	<ul class="list-group">
		@foreach($images as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/image/{{ $v->id_salwaimages }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($images))
			<b><a href="/image?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>
<div class="col-md-6">
	<h4 class="title">Market</h4>
	<ul class="list-group">
		@foreach($produks as $v)

		<li class="list-group-item" style="padding:5px">
			<strong><a href="/produk/{{ $v->id_produk }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
			<br />
			<em>RP {{ number_format($v->harga) }}</em>
		</li>

		@endforeach

		<li class="list-group-item text-center">
			@if (count($produks))
			<b><a href="/produk?search={{ Request::get('search') }}">More Results...</a></b>
			@else
			<b>No Result</b>
			@endif
		</li>

	</ul>

</div>

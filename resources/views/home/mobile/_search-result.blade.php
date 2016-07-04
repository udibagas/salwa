<h4 class="title">VIDEO</h4>
@each('video.mobile._list', $videos, 'a')

<div class="row-post text-center">
	@if (count($videos))
	<b><a href="/video?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>

<h4 class="title">ARTIKEL</h4>

	@each('artikel.mobile._list', $artikels, 'a')

	<div class="row-post text-center">
		@if (count($artikels))
		<b><a href="/artikel?search={{ request('search') }}">More Results...</a></b>
		@else
		<b>No Result</b>
		@endif
	</div>

<h4 class="title">INFORMASI</h4>
@each('informasi.mobile._list', $informasis, 'a')
<div class="row-post text-center">
	@if (count($informasis))
	<b><a href="/informasi?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>


<h4 class="title">PEDULI</h4>
@each('peduli.mobile._list', $pedulis, 'a')
<div class="row-post text-center">
	@if (count($pedulis))
	<b><a href="/peduli?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>

<h4 class="title">FORUM</h4>
@each('forum.mobile._list', $forums, 'a')
<div class="row-post text-center">
	@if (count($forums))
	<b><a href="/forum?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>


<!-- <h4 class="title"><i class="fa fa-comments-o"></i> Komentar Forum</h4>
each('post.mobile._list', $posts, 'p')
<div class="row-post text-center">
	@if (count($posts))
	<b><a href="/forum?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div> -->

<h4 class="title">TANYA USTADZ</h4>
@each('pertanyaan.mobile._list', $pertanyaan, 'a')
<div class="row-post text-center">
	@if (count($pertanyaan))
	<b><a href="/pertanyaan?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>


<h4 class="title">KITAB</h4>

@foreach($buku as $v)

<div class="row-post">
	<strong><a href="/kitab/{{ $v->buku_id }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
	<br />
	{{ $v->penulis }}
</div>

@endforeach

<div class="row-post text-center">
	@if (count($buku))
	<b><a href="/kitab?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>



<h4 class="title">DO'A</h4>
@each('hadist.mobile._list', $doa, 'a')

<div class="row-post text-center">
	@if (count($doa))
	<b><a href="/doa?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>


<h4 class="title">DZIKIR</h4>
@each('hadist.mobile._list', $dzikir, 'a')

<div class="row-post text-center">
	@if (count($dzikir))
	<b><a href="/doa?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>


<h4 class="title">HADIST</h4>
@each('hadist.mobile._list', $hadist, 'a')

<div class="row-post text-center">
	@if (count($hadist))
	<b><a href="/doa?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>


<h4 class="title">AUDIO</h4>
@each('audio.mobile._list', $audios, 'a')

<div class="row-post text-center">
	@if (count($audios))
	<b><a href="/mp3?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>

<h4 class="title">IMAGES</h4>

@foreach($images as $v)

<div class="row-post">
	<strong><a href="/image/{{ $v->id_salwaimages }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
</div>

@endforeach

<div class="row-post text-center">
	@if (count($images))
	<b><a href="/image?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>

<h4 class="title">PRODUK</h4>

@foreach($produks as $v)

<div class="row-post">
	<strong><a href="/produk/{{ $v->id_produk }}-{{ str_slug($v->judul) }}">{{ $v->judul }}</a></strong>
	<br />
	RP {{ number_format($v->harga) }}
</div>

@endforeach

<div class="row-post text-center">
	@if (count($produks))
	<b><a href="/produk?search={{ request('search') }}">More Results...</a></b>
	@else
	<b>No Result</b>
	@endif
</div>

<h4 class="title">KITAB & TERJEMAHAN</h4>
<div class="row">
	@foreach ($buku as $b)
	<div class="col-md-3">
		<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">
			<img class="media-object" src="http://www.salamdakwah.com/{{ $b->img_buku }}" style="width:100px;">
		</a>
	</div>
	@endforeach
</div>

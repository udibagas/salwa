<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>
<div class="row no-gutter">
	@foreach ($buku as $b)
	<div class="col-md-2">
		<div class="thumbnail">
			<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">
				<img src="http://www.salamdakwah.com/{{ $b->img_buku }}" class="img-responsive" style="width:100%;height:270px;">
			</a>
		</div>
	</div>
	@endforeach
</div>

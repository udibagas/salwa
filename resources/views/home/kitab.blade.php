<h4 class="title">KITAB & TERJEMAHAN</h4>
<div class="row">
	@foreach ($buku as $b)
	<div class="col-md-6">
		<div class="media box-shadow" style="height:170px;">
			<div class="media-left">
				<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">
					<img class="media-object" src="http://www.salamdakwah.com/{{ $b->img_buku }}" style="width:100px;">
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading"><a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">{{ $b->judul }}</a></h4>
				<b>{{ $b->penulis }}</b>
				<br />
				<br />
				<a href="http://www.salamdakwah.com/{{ $b->file_pdf }}" class="btn btn-orange"><span class="fa fa-download"></span> Download ({{ $b->didownload }}x)</a>
			</div>
		</div>
	</div>
	@endforeach
</div>

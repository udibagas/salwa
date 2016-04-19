<div class="col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/informasi/{{ $informasi->informasi_id }}-{{ str_slug($informasi->judul) }}"><img src="http://www.salamdakwah.com/{{ $informasi->img_gambar }}" style="width:100%;height:120px;" alt=""></a>
		<div class="caption">
			<h4><a href="/informasi/{{ $informasi->informasi_id }}-{{ str_slug($informasi->judul) }}">{{ $informasi->judul }}</a></h4>
			<em>{{ $informasi->updated->diffForHumans() }}</em>
		</div>
	</div>
</div>

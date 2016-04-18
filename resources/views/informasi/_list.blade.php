<div class="col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/informasi/{{ $informasi->informasi_id }}"><img src="http://www.salamdakwah.com/{{ $informasi->img_informasi }}" style="width:100%;height:120px;" alt=""></a>
		<div class="caption">
			<h4><a href="/informasi/{{ $informasi->informasi_id }}">{{ $informasi->judul }}</a></h4>
			<b>{{ $informasi->user ? $informasi->user->name : '' }}</b><br />
			<em>{{ $informasi->updated->diffForHumans() }}</em>
		</div>
	</div>
</div>

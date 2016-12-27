<div class="col-sm-3 col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="{{ $artikel->url }}">
			<img src="/{{ $artikel->img_artikel }}" alt="{{ $artikel->judul }}">
			<div class="thumbnail-block"></div>
			<div class="caption">
				<h4>{{ $artikel->judul }}</h4>
				{{ $artikel->user ? $artikel->user->name : '' }}<br />
				<em>{{ $artikel->updated->diffForHumans() }}</em>
			</div>
		</a>
	</div>
</div>

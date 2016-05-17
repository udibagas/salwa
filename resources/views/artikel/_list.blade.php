<div class="col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/artikel/{{ $artikel->artikel_id }}-{{ str_slug($artikel->judul) }}">
			<img src="/{{ $artikel->img_artikel }}" style="width:100%;height:200px;" alt="">
			<div class="thumbnail-block">
				<div class="caption">
					<h4>{{ $artikel->judul }}</h4>
					{{ $artikel->user ? $artikel->user->name : '' }}<br />
					<em>{{ $artikel->updated->diffForHumans() }}</em>
				</div>
			</div>
		</a>
	</div>
</div>

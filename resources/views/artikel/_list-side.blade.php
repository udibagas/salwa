<div class="media">
	<div class="media-left">
		<div style="width:60px;height:60px;">
			<img class="media-object cover" src="/{{ $artikel->img_artikel }}" alt="{{ $artikel->judul }}">
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="{{ $artikel->url }}">
				{{ $artikel->judul }}
			</a>
		</strong>
		<div class="text-muted">
			{{ $artikel->user ? $artikel->user->name.' - ' : '' }}
			{{ $artikel->created->diffForHumans() }}
		</div>
	</div>
</div>

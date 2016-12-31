<div class="media">
	<div class="media-left">
		<div style="width:60px;height:60px;">
			<img class="media-object cover" src="/{{ $peduli->img_artikel }}" alt="{{ $peduli->judul }}">
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="{{ $peduli->url }}">
				{{ $peduli->judul }}
			</a>
		</strong>
		<div class="text-muted">
			{{ $peduli->user ? $peduli->user->name.' - ' : '' }}
			{{ $peduli->updated->diffForHumans() }}
		</div>
	</div>
</div>

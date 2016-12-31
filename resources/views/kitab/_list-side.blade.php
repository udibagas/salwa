<div class="media">
	<div class="media-left">
		<div style="width:70px;height:90px;">
			<img class="media-object cover" src="/{{ $b->img_buku }}" alt="{{ $b->judul }}">
		</div>
	</div>
	<div class="media-body">
		<strong>
			<a href="{{ $b->url }}">
				{{ $b->judul }}
			</a>
		</strong><br>
		{{ $b->penulis }}
	</div>
</div>

<div class="col-md-4">
	<div class="thumbnail">
		<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">


			<img src="/{{ $b->img_buku }}" class="img-responsive" style="width:100%;height:350px;">

			<div class="thumbnail-block">
				<div class="caption">
					<h3>{{ $b->judul }}</h3>
					{{ $b->penulis }}
				</div>
			</div>
		</a>
	</div>
</div>

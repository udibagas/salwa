<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div style="width:100px;height:120px;">
				@if ($a->img_buku)
				<img class="media-object cover" src="/{{ $a->img_buku }}" alt="">
				@else
				<img class="media-object profile" data-name="{{ $a->judul }}" data-width="100" data-height="120">
				@endif
			</div>
		</div>
		<div class="media-body">
			<strong><a href="/kitab/{{ $a->buku_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></strong>
			<br />
			{{ $a->penulis }}

			<!-- <a href="/kitab/{{ $a->buku_id }}/download" class="btn btn-info"><span class="fa fa-download"></span> Download</a> -->

		</div>
	</div>
</div>

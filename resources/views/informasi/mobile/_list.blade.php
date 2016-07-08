<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="initial-container">
				@if ($a->img_gambar)
				<img class="media-object cover img-circle" src="{{ Image::url($a->img_gambar,50,50,['crop']) }}" alt="{{ $a->judul }}">
				@else
				<img class="media-object profile img-circle" data-name="{{ $a->judul }}" alt="{{ $a->judul }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/informasi/{{ $a->informasi_id }}-{{ $a->kd_judul }}" class="text-bold">{{ $a->judul }}</a>
			<br>
			<small>{{ $a->group ? $a->group->group_name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>

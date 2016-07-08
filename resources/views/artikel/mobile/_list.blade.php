<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="initial-container">
				@if ($a->img_artikel)
				<img class="media-object cover img-circle" src="{{ Image::url($a->img_artikel,50,50,['crop']) }}" alt="{{ $a->judul }}">
				@else
				<img class="media-object profile img-circle" data-name="{{ $a->judul }}" alt="{{ $a->judul }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/artikel/{{ $a->artikel_id }}-{{ $a->kd_judul }}" class="text-bold">{{ $a->judul }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
